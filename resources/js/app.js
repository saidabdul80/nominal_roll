/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Swal from 'sweetalert2'
import plugin from './plugin.js'
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-select-rank', require('./components/selectRank.vue').default);
Vue.component('v-select-state', require('./components/selectState.vue').default);
Vue.component('v-form', require('./components/formRegister.vue').default);
Vue.component('v-data-list', require('./components/dataList.vue').default);
Vue.component('v-death', require('./components/death.vue').default);
Vue.component('v-dismissal', require('./components/dismissal.vue').default);
Vue.component('vlist', require('./components/listing.vue').default);
Vue.component('v-phone', require('./components/phonebook.vue').default);
Vue.component('v-transfer', require('./components/transfer.vue').default); 
Vue.component('v-area-command', require('./components/area_commad.vue').default);
window.eventBus = new Vue({});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(plugin);
const app = new Vue({
    el: '#app',
    Swal,
});
