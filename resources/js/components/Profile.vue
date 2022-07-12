<template>
<div>
    <form action="#" @submit.prevent="submitForm" >
    <div>
        <label for="image">Image</label>
       
        <input type="file" name="image" @change="fileChange" class="form-control">
    </div>
    <div>
        Profile picture:{{avatar}}
        <img :src="avatar">
        <input type="text" :value="id">
    </div>
     <div>
        <label for="image">Name</label>
        <input type="text" class="form-control" :value="authName"   @input="getName">
    </div>
    <div>
        <button class="btn btn-primary" >Save</button>
    </div>
    </form>
</div>
</template>

<script setup>
import axios from "axios";
import { ref } from 'vue';

const props = defineProps({
    currentAvatar: { 
        type: String 
      },
      authName: { 
        type: String 
      },
      id: { 
        
      },
})

const avatar = ref(props.currentAvatar);
const id = ref(props.id);
const name = ref(props.authName)

const fileChange = (e) => {
    let fileData = new FormData()
    fileData.append('image', e.target.files[0]);
    axios.post('/profile/store',fileData).then((response)=> {
       avatar.value = response.data.data.path 
       id.value = response.data.data.id 
    });
}

const getName = (event) => {
    name.value = event.target.value;
}

const submitForm = () => {
axios.post('/profile/store/otherdetails',{name:name.value, userId: id.value}).then((response)=> {
 
});

}

</script>