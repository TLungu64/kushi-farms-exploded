
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import{Form,HasError,AlertError} from 'vform'
window.Vue = require('admin-lte');

import Gate from "./Gate"; 
Vue.prototype.$gate = new Gate(window.user);

import moment from 'moment'
window.Form = Form;  
Vue.component(HasError.name,HasError)
Vue.component(AlertError.name,AlertError)

// sweetalert
import Swal from 'sweetalert2';

window.Swal = Swal;


// sign in alert specifications
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

window.Fire  = new Vue();
window.Toast  = Toast;
window.Refresh =  new Vue();

Vue.component('pagination', require('laravel-vue-pagination'));

// vue
import Vue from 'vue'
// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// vue progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143,255,199',
  failedColor: 'red',
  height:'3px'
  
}); 

// vue routes
let routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue') },
  { path: '/inventory', component: require('./components/Inventory.vue') },
  { path: '/stock', component: require('./components/Stock.vue') },
  { path: '/developer', component: require('./components/Developer.vue') },
  { path: '/profile', component: require('./components/Profile.vue') },
    { path: '/users', component: require('./components/Users.vue') }, 
    { path: '*', component: require('./components/NotFound.vue') }
  ]

  // router has normal url 
  const router = new VueRouter({
      mode:'history',
    routes // short for `routes: routes`
  })

  // filter to set the first letter to uppercase
  Vue.filter('upText',function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
  });

  // filter to change the date format using moment
  Vue.filter('myDate',function(created){
    return moment().format('MMMM Do YYYY');
  });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
  'not-found',
  require('./components/NotFound.vue')
);


Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({ 
    el: '#app',
    router ,
    data: {
      search: ''
    },
    methods:{
      searchit: _.debounce(()=>{
        
        Fire.$emit('searching');
      },1000)
        // console.log("searching...")
        
      
    }
});
