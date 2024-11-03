// import { createApp } from 'vue'
// import './style.css'
// import App from './App.vue'
// $axios.defaults.baseURL = 'http://localhost/demo/public/api'; // Replace with your actual API URL

// import router from './router'; // Import the router
// app.use(router); // Use the router in the app
// createApp(App).mount('#app')




import { createApp } from 'vue';
import './style.css';
import App from './App.vue';
import axios from 'axios'; // Import Axios
import router from './router'; // Import the router

// Set the default base URL for Axios
axios.defaults.baseURL = 'http://localhost/demo-project/demo/public/api'; // Replace with your actual API URL
// http://localhost/demo-project/demo/public/api/register
// axios.defaults.baseURL = 'http://localhost/laravel-project/demo/public/api';
const app = createApp(App); // Create the Vue app instance

// Add Axios to the app's global properties
app.config.globalProperties.$axios = axios;

// Use the router in the app
app.use(router);

// Mount the app
app.mount('#app');
