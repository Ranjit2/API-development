<template>
    <div>
        <form action="#" @submit.prevent="post">
            <textarea class="form-control" cols="30" rows="2" v-model="body"></textarea><br>
            <button class="btn btn-primary float-end" type="submit"> {{ saving ? 'saving...': 'Save' }}</button>
            <div v-for="(errorArray, index) in error" :key="index">
            <span class="text-danger" v-if="error">
              
                <p v-for="(err,i) in errorArray.body">
                    {{ err }} 
                </p>
            </span>
</div>
        </form>
     
    </div>  <hr>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios'

const body = ref('')
const emit = defineEmits(['posted'])
const saving = ref(false)
const error = ref(false)

const post = () => {
    saving.value = true
    axios.post('/tweets',{
        body: body.value
    }).then((response)=> {
        emit('posted', response.data)
        saving.value = false
        body.value = null
    }).catch((err)=>{
        error.value = err.response.data
        saving.value = false
    })
}



</script>