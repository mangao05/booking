/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'
import VueProgressBar from 'vue-progressbar'
import Multiselect from 'vue-multiselect'
import { VLazyImagePlugin } from "v-lazy-image";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import BootstrapVue from 'bootstrap-vue'
import AOS from 'aos';
import VueNumber from 'vue-number-animation'
import VueApexCharts from 'vue-apexcharts'
import VueMomentsAgo from 'vue-moments-ago'
import FullCalendar from 'vue-full-calendar'
import {Circle8} from 'vue-loading-spinner'

Vue.use(FullCalendar)
Vue.use(VueApexCharts)
Vue.component('apexchart', VueApexCharts)
Vue.component('vue-moments-ago',VueMomentsAgo)
Vue.component('Circle8', Circle8);
Vue.use(VLazyImagePlugin);
Vue.use(require('vue-moment'));
Vue.use(BootstrapVue)
Vue.use(VueNumber)

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('multiselect', Multiselect)
Vue.component( 'vueDropzone',vue2Dropzone);

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '2px'
})
Vue.use(VueRouter)
window.AOS = AOS;
let routes = [
    { path: '/dashboard', component: require('./components/dashboard.vue').default },
    { path: '/home', component: require('./components/dashboard.vue').default },
    { path: '/rooms', component: require('./components/rooms.vue').default },
    { path: '/user', component: require('./components/user.vue').default },
    { path: '/amenities', component: require('./components/Amenities.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/editProfile', component: require('./components/EditProfile.vue').default },
    { path: '/report', component: require('./components/report/Report.vue').default },
    { path: '/reserved', component: require('./components/reservation/Reservation.vue').default },
    { path: '/contactMe', component: require('./components/Contact/ContactUs.vue').default },
    { path: '/activity', component: require('./components/activityLog/ActivityLog.vue').default },
  ]
const router = new VueRouter({
    mode:'history',
    routes 
  })

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Toast = Toast;
window.Form = Form;
window.Swal = Swal;
window.Fire = new Vue();

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('show-report', require('./components/report/showReportComponent.vue').default);
Vue.component('show-reserved', require('./components/report/showReportComponent.vue').default);
Vue.component('show-message', require('./components/Contact/ContactComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});



