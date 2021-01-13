import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login.vue'
import Regsiter from '../components/register.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/login',
    name: "login",
    component: Login,
  },{
    path:'',
    redirect :'/login',
  },
  {    
    path:'/register',
    name:"register",
    component: Regsiter
  }
]

const router = new VueRouter({
  routes
})

export default router
