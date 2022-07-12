<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Country Name</th>
                <th scope="col">Population</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(country,index) in countries.data" :key="index">
                <th scope="row">{{ index +1 }}</th>
                <td>{{ country.name }}</td>
                <td>{{ country.count }}</td>
            </tr>
            
        </tbody>
    </table>
</template>
<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const countries = ref([]);

onMounted(() => {
    axios.get("/api/country/population").then((response) => {
        countries.value = response.data;
    }).catch((error)=> {
        console.log('error in fetching data')
    });
});
</script>
