/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue'
import VueMask from 'v-mask'
Vue.use(VueMask)
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
Vue.component('randevu-component', require('./components/RandevuComponent.vue').default);
Vue.component('bugun-component', require('./components/bugunComponent.vue').default);
Vue.component('gelecek-component', require('./components/gelecekComponent.vue').default);
Vue.component('gecmis-component', require('./components/gecmisComponent.vue').default);
Vue.component('iptal-component', require('./components/iptalComponent.vue').default);
Vue.component('onay-component', require('./components/onayComponent.vue').default);
Vue.component('mesai-component', require('./components/mesaiComponent.vue').default);
Vue.component('mesaiitem-component', require('./components/mesaiitemComponent.vue').default);
Vue.component('test-component', require('./components/testComponent.vue').default);
Vue.component('testitem-component', require('./components/testitemComponent.vue').default);
Vue.component('randevudetay-component', require('./components/RandevuDetayComponent.vue').default);
Vue.component('randevusorgu-component', require('./components/randevusorgulamaComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
