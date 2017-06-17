import Vue from 'vue'
import Navbar from './Navbar.vue'
import Recommend from './Recommend.vue'
import Filter from './Filter.vue'
import Card from './Card.vue'
import Test from './test.vue'


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
var card=new Vue({
	el:'#Card',
	render:h=>h(Card)
})
/*var test=new Vue({
	el:'#test',
	render:h=>h(Test)
})*/