window._ = require('lodash');
window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import router from './router';

const app = Vue.createApp({
    el: '#app',
    components: {
        'App': { template: '<router-view></router-view>' },
    }
})

app.use(router);
app.mount('#app');
