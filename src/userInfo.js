import Vue from 'vue'
import userInfo from './userInfo.vue'
import router from './router/userInfo.js'
import './plugins/element.js'
import './assets/css/global.css'
import axios from 'axios'

Vue.prototype.$axios=axios
Vue.prototype.$http=axios

new Vue({
  router,
  render: h => h(userInfo)
}).$mount('#userInfo')



