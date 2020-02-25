/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './views/App'
import Vuetify from 'vuetify';
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
Vue.use(Vuetify);

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.loggedIn) {
        next({
          name: 'login',
        })
      } else {
        next()
      }
    } else {
      next() // make sure to always call next()!
    }
  })
  Vue.component('app', require('./views/App.vue').default);
const app = new Vue({
    el: '#app',
   // components: { 'app':App },
    router,
    store,
    vuetify: new Vuetify(),
});