import Vue from 'vue'
import VueRouter from 'vue-router'
import shoppage from '../components/shoppage.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/shoppage',
    name: "shoppage",
    component: shoppage,
  },{
    path:'',
    redirect :'/shoppage',
  },

]

const router = new VueRouter({
  routes
})

export default router
