import Vue from './js/vue'
import VueRouter from 'vue-router'
import Login from './page/login.vue'
import routers from './routers.js'
import Index from './page/index-php.vue'

Vue.use(VueRouter)

const router=new VueRouter({
	mode:'history',
	routers:routers
})

new Vue({
	el:'#MountPoint',
	render:h=>h(Index)
})