import Vue from './js/vue'
import VueRouter from 'vue-router'
import Login from './component/Login.vue'
import App from './component/index-php.vue'

Vue.use(VueRouter)

var app=new Vue({
	el:'#App',
	render:h=>h(App)
})