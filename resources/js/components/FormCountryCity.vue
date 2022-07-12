<template>
   
        <div class="col-md-4">
            <label for="country">Country</label>
            <select class="form-control" v-model="country" @change="getCity" name="country_id">
                <option value="0">
                    Select Country
                    <span
                        v-for="(count, index) in countries.population"
                        :key="index"
                        ></span
                    >
                </option>
                <option
                    v-for="(country, index) in countries.data"
                    :key="index"
                    :value="country.id"
                >
                    {{ country.name }} 
                </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="country">City</label>
            <select
                class="form-control"
                v-model="city"
                name="city_id"
                @change="getGenderBasedOnCountryAndCity"
            >
                <option value="0">Select City</option>
                <option
                    v-for="(city, index) in cities"
                    :key="index"
                    :value="city.id"
                >
                    {{ city.name }} 
                </option>
            </select>
        </div>

</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const country = ref(0);
const countries = ref([]);
const city = ref(0);
const cities = ref([]);


onMounted(() => {
    getCountries(), getGender();
});

const getCountries = () => {
    axios.get("/api/countries").then((response) => {
        countries.value = response.data;
    }).catch((error)=> {
    });
};

const getCity = () => {
    axios
        .get("/api/country/cities", { params: { country_id: country.value } })
        .then((response) => {
            cities.value = response.data.data;
        });
};

</script>
