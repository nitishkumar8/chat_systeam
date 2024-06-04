import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Import the router configuration
import store from './store';   // Import the store configuration

import 'bootstrap/dist/css/bootstrap.css'; // Import Bootstrap CSS
import 'bootstrap-vue/dist/bootstrap-vue.css'; // Import BootstrapVue CSS
import { BootstrapVue } from 'bootstrap-vue'; // Import BootstrapVue

createApp(App)
  .use(router) // Use the router
  .use(store)  // Use the store
  .use(BootstrapVue)
  .mount('#app');