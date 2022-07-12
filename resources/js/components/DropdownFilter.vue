<template>
    <div class="row">
        <div class="col-md-4">
            <label for="country">Country</label>
            <select class="form-control" v-model="country" @change="getCity">
                <option value="0">
                    Select Country
                    <span
                        v-for="(count, index) in countries.population"
                        :key="index"
                        >({{ count }})</span
                    >
                </option>
                <option
                    v-for="(country, index) in countries.data"
                    :key="index"
                    :value="country.id"
                >
                    {{ country.name }} ({{ country.total }})
                </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="country">City</label>
            <select
                class="form-control"
                v-model="city"
                @change="getGenderBasedOnCountryAndCity"
            >
                <option value="0">Select City</option>
                <option
                    v-for="(city, index) in cities"
                    :key="index"
                    :value="city.id"
                >
                    {{ city.name }} ({{ city.total }})
                </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="country">Gender</label>
            <select
                class="form-control"
                v-model="gendertype"
                @change="ageBasedCategory"
            >
                <option
                    v-for="(person, index) in population"
                    :key="index"
                    :value="person.gender"
                >
                    {{ person.gender }} ({{ person.total }})
                </option>
            </select>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Number</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(person, index) in populationCategory"
                    :key="index"
                    :value="person.id">
                <span v-if="person.age < 19">
                    <th scope="row">Child</th>
                <td
                  {{ person.length }}
                ></td>
                </span>    
                
            </tr>
            <tr>
                <th scope="row">Young</th>
                <td>4</td>
            </tr>
            <tr>
                <th scope="row">Child</th>
                <td>55</td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const country = ref(0);
const countries = ref([]);
const city = ref(0);
const cities = ref([]);
const gender = ref([]);
const population = ref([]);
const gendertype = ref('');
const populationCategory = ref([]);

onMounted(() => {
    getCountries(), getGender();
});

const getCountries = () => {
    axios.get("/api/countries").then((response) => {
        countries.value = response.data;
    }).catch((error)=> {
        //
    });
};

const getCity = () => {
    axios
        .get("/api/country/cities", { params: { country_id: country.value } })
        .then((response) => {
            cities.value = response.data.data;
        });
};

const getGender = () => {
    axios.get("/api/gender").then((response) => {
        gender.value = response.data;
    });
};

const getGenderBasedOnCountryAndCity = () => {
    axios
        .get("/api/country/city/gender", {
            params: { country_id: country.value, city_id: city.value },
        })
        .then((response) => {
            population.value = response.data;
        });
};

const ageBasedCategory = () => {
    axios
        .get("/api/country/city/genderbased/category", {
            params: {
                country_id: country.value,
                city_id: city.value,
                gender: gendertype.value,
            },
        })
        .then((response) => {
            populationCategory.value = response.data.data;
        }).catch((error)=>{
           //
        });
};
</script>
