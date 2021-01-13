import Vue from 'vue'
import router from './router/shoppage.js'
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'

Vue.prototype.$axios=axios
Vue.prototype.$http=axios

new Vue({
  router,
})

