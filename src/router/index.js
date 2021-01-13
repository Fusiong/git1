import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../components/Home.vue'
import detail from '../components/detail.vue'
import detailpage from '../components/detailpage.vue'
import goshopping from '../components/goshopping.vue'

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
  },{
    path:'/detailpage',
    component:detailpage,
    name:'detailpage'
  },{
    path:'/goshopping',
    component:goshopping,
    name:'goshopping'
  }
]

const router = new VueRouter({
  routes
})

export default router
