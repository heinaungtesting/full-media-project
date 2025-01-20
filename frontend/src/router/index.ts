import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'


const routes: Array<RouteRecordRaw> = [

  {
    path: '/',
    name: 'home',
    component: () => import( '../views/HomePage.vue')
  },
 
  {
    path: '/homePage',
    name: 'homePage',
    component: () => import( '../views/HomePage.vue')
  },
  {
    path:'/details',
    name:'details',
    component: () => import( '../views/NewsDetails.vue')
  },
  {
    path:'/login',
    name:'login',
    component: () => import( '../views/LoginPage.vue')
  },
  {
    path:'/register',
    name:'register',
    component: () => import( '../views/RegisterPage.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
