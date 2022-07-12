require('./bootstrap');

import {createApp } from 'vue';


import DropdownFilter from "./components/DropdownFilter.vue";
import Category from './components/Category.vue'
import Summary from './components/Summary.vue'
import FormCountryCity from './components/FormCountryCity.vue'

const app = createApp({});
app.component('DropdownFilter', DropdownFilter);
app.component('Category', Category);
app.component('Summary', Summary);
app.component('FormCountryCity', FormCountryCity);

app.mount('#app');
