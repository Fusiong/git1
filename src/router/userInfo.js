import Vue from 'vue'
import VueRouter from 'vue-router'
import Info from '../components/Info.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/Info',
    name: "Info",
    component: Info,
  },{
    path:'',
    redirect :'/Info',
  },

]

const router = new VueRouter({
  routes
})

export default router
