import './bootstrap';
import { createApp } from 'vue';
import AppComponent from './components/App.vue';


// Read user from the data attribute in Blade
const el = document.getElementById('app');
const user = JSON.parse(el.dataset.user);
createApp(AppComponent, { user }).mount('#app');
