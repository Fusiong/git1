import Vue from 'vue'
import VueRouter from 'vue-router'
import Info from '../components/Info.vue'
import pass from '../components/pass.vue'
import addresses from '../components/addresses.vue'
import myorder from '../components/myorder.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/Info',
    name: "Info",
    component: Info,
  },{
    path:'',
    redirect :'/Info',
  },{
    path: '/pass',
    name: "pass",
    component: pass,
  },{
    path: '/addresses',
    name: "addresses",
    component: addresses,
  },{
    path: '/myorder',
    name: "myorder",
    component: myorder,
  }

]

const router = new VueRouter({
  routes
})

export default router
