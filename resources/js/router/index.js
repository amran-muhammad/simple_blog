import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)


import home from '../pages/home.vue'
import about from '../pages/about.vue'
import product from '../pages/product.vue'
import single_category from '../pages/single_category.vue'
import single_tag from '../pages/single_tag.vue'
import add_product from '../pages/add_product.vue'
import edit_product from '../pages/edit_product.vue'
import category from '../pages/category.vue'
import tags from '../pages/tag.vue'
import login from '../pages/login.vue'
import registration from '../pages/registration.vue'
import cart from '../pages/addCard.vue'

let Admin = ['Admin'];


export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: home,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'Home',
      }

    },
    {
      path: '/cart',
      name: 'cart',
      component: cart,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'Cart',
      }

    },
    {
      path: '/add_product',
      name: 'add_product',
      component: add_product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'add_product',
      }

    },
    {
      path: '/login',
      name: 'login',
      component: login,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'login',
      }

    },
    {
      path: '/tags',
      name: 'tags',
      component: tags,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'tags',
      }

    },
    {
      path: '/tags/:id',
      name: 'single_tag',
      component: single_tag,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'single_tag',
      }

    },
    {
      path: '/registration',
      name: 'registration',
      component: registration,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'registration',
      }

    },
    {
      path: '/category',
      name: 'category',
      component: category,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'category',
      }

    },
    {
      path: '/category/:id',
      name: 'single_category',
      component: single_category,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'single_category',
      }

    },
    {
      path: '/product/:id',
      name: 'product',
      component: product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'product',
      }

    },
    {
      path: '/edit_product/:id',
      name: 'edit_product',
      component: edit_product,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'edit_product',
      }

    },
    {
      path: '/about',
      name: 'about',
      component: about,
      meta: {
         // guest: true,
         // allowedUserType: ['All'],
          title: 'About',
      }

    },
  ],

});