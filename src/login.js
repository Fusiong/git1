import Vue from 'vue'
import login from './login.vue'
import router from './router/homes.js'
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'

Vue.prototype.$axios=axios

new Vue({
  router,
  render: h => h(login)
}).$mount('#home')


