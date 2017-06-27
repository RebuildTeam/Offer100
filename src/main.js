import Vue from 'vue'
import Navbar from './Navbar.vue'
import Recommend from './Recommend.vue'
import Filter from './Filter.vue'
import CompanyCard from './CompanyCard.vue'
import Test from './test.vue'
import PositionCard from './PositionCard.vue'
import Login from './Login.vue'
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

/*var companyCard=new Vue({
	el:'#CompanyCard',
	render:h=>h(CompanyCard)
})*/
/*var positionCard=new Vue({
	el:'#PositionCard',
	render:h=>h(PositionCard)
})*/
var login=new Vue({
	el:'#Login',
	render:h=>h(Login)
})