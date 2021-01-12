import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../components/Home.vue'
import detail from '../components/detail.vue'

Vue.use(VueRouter)

const routes = [
 {
    path:'/home',
    components:{
      default:Home,
      top:Home,
    }
  },{
    path:'/',
    redirect:'/home'
  },{
    path:'/detail',
    component:detail,
    name:'detail'
  }
]

const router = new VueRouter({
  routes
})

export default router
