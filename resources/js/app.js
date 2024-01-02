import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios  from "axios";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import store from './store';
import Vue3TouchEvents from 'vue3-touch-events';

const app = createApp(App);

app.use(router);
app.use(store);
app.use(Vue3TouchEvents);

app.mount('#app');
