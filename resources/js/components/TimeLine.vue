<template>
<PostTweeet @posted="posted">
</PostTweeet>

    <div v-for="(tweet,index) in tweets" :key="index">
         <p><b style="color:#000;">{{ tweet.user.name }}</b>: {{ tweet.body }}</p>
    </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios'
import PostTweeet from './PostTweet.vue'

const tweets = ref([]);

onMounted (() => {
     axios.get('/tweets').then((response)=>{

          tweets.value = response.data

     })
})

const posted = (tweet) => {
     tweets.value.unshift(tweet);
}


</script>