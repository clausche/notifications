require('./bootstrap');

window.Vue = require('vue');

import Router from 'vue-router'
Vue.use(Router)

import Vuetify from 'vuetify'
Vue.use(Vuetify)
import MenuIcon from "vue-material-design-icons/Menu.vue"
 
Vue.component("menu-icon", MenuIcon)

Vue.component('notifications', require('./components/Notifications.vue').default);
Vue.component('lista', require('./components/Lista.vue').default);
Vue.component('tareatodo', require('./components/TareaTodo.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('pruebavuetify', require('./components/Pruebavuetify.vue').default);
Vue.component('tareas-vue', require('./components/Tareas-vue.vue').default);
Vue.component('mycrud', require('./components/Mycrud.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);
Vue.component('postshow', require('./components/Postshow.vue').default);


const app = new Vue({
    el: '#app',
});
