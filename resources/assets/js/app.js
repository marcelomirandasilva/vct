
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('gentelella');


echarts = require('echarts');

require('./config');

require('./bootstrap-notify.min');


Inputmask = require('inputmask');

require('jquery-mask-plugin');

window.swal = require('sweetalert2');

window.icheck = require('icheck-bootstrap');

require('./funcoes');
require('./scripts');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Vue.component('example-component', require('./components/ExampleComponent.vue')); */

Vue.component('notificacoes', require('./components/notificacoes/Notificacoes.vue')); 
Vue.component('caixa', require('./components/dashboard/caixa.vue')); 


const app = new Vue({
    el: '#app'
});

