import Vue from './js/vue'
import Navbar from './component/Navbar.vue'
import Recommend from './component/Recommend.vue'
import Filter from './component/Filter.vue'
import CompanyCard from './component/CompanyCard.vue'
import PositionCard from './component/PositionCard.vue'
import Login from './component/Login.vue'
var navbar=new Vue({
	el:'#Navbar',
	render:h=>h(Navbar)
})
var recommend=new Vue({
	el:'#Recommend',
	render:h=>h(Recommend)
})
var filter=new Vue({
	el:'#Filter',
	render:h=>h(Filter)
})

/*var positionCard=new Vue({
	el:'#PositionCard',
	render:h=>h(PositionCard)
})*/
// var login=new Vue({
// 	el:'#Login',
// 	render:h=>h(Login)
// })