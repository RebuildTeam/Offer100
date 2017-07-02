import Vue from './js/vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import routes from './routes.js'

Vue.use(VueRouter)

const router=new VueRouter({
	mode:'history',
	routes	
})

new Vue({
	router,
	render:h=>h(App)
}).$mount("#MountPoint")