<template>
  <div class="mt-4">
    <file-pond
      name="image"
      max-files="10"
      ref="pond"
      label-idle="Click to choose image or drag here..."
      @init="filePondInitialized"
      accepted-file-types="image/jpg, image/jpeg, image/png"
      @processfile ="handleProcessedFile"
      max-file-size="1MB"
   
    />
  </div>
  <div class="mt-8 mb-24">
    <h3 class="text-2xl font-medium text-center">
      Image Gallery
    </h3>
    <div class="grid grid-cols-3 gap-2 justify-evenly mt-4">
      <div v-for="(image,index) in images" :key="index">
       
          <img :src="'/storage/images/'+ image">
      </div>
    </div>
  </div>
</template>

<script>
import vueFilePond, {setOptions} from "vue-filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';//npm install --save-dev filepond-plugin-file-validate-size

let serverMessage = {};//this is only for backend error message

setOptions({
  server: {
    process: {
      url:'./upload',
      onerror: (response) => { // this onerror is only for backend error message
        serverMessage = JSON.parse(response);
      },
      headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
      }
    }
  },
  labelFileProcessingError: () => { //this is only for backend error message
    return serverMessage.error
  }
});
const FilePond = vueFilePond(FilePondPluginFileValidateType);

export default {

  components: {
    FilePond,
  },

  data() {

    return {
      images:[]
      
    };
  },
  mounted() {
    axios.get('/images/all')
      .then((response)=>{
        this.images = response.data;
      })
      .catch((error)=>{
        console.log(error);
      })
  },
  methods:{

      filePondInitialized() {
          console.log('ready to upload')
      },

      handleProcessedFile(error, file) {
        if(error) {
          console.log(error);
          return;
        }

        this.images.unshift(file.serverId);
        //push put image last of array
        //unshift push at first of array
        //serverId return name return from controller in console
      }
  }
};
</script>
