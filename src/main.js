import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

import '@/assets/css/style.css';

document.addEventListener('DOMContentLoaded', () => {
    new Vue({
        render: h => h(App)
    }).$mount('#app');
});
