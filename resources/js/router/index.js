import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'main',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/main/index.vue')
    },
    {
      path: '/products',
      name: 'products.index',
      component: () => import('../views/product/index.vue')
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import('../views/product/show.vue')
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import('../views/cart/index.vue')
    },
  ]
})

export default router
