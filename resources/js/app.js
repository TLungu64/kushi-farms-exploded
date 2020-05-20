
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment'
import { Form, HasError} from 'vform'

window.Form = Form;
Vue.component(HasError.name,HasError)


import Swal from 'sweetalert2'
window.Swal = Swal;


 
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast=Toast;



import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143,255,199',
  failedColor: 'red',
  height:'3px'
  
});


let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue') },
    { path: '/profile', component: require('./components/Profile.vue') },
    { path: '/users', component: require('./components/Users.vue') }
  ]

  const router = new VueRouter({
      mode:'history',
    routes // short for `routes: routes`
  })

  Vue.filter('upText',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
  });

  Vue.filter('myDate',function(created){
    return moment().format('MMMM Do YYYY');
  });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({ 
    el: '#app',
    router
});
function newFunction() {
  window.toast = toast;
}

