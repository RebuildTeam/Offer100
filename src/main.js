import Vue from './js/vue'
import Navbar from './component/Navbar.vue'
import RecommendRow from './component/RecommendRow.vue'
import RecommendColumn from './component/RecommendColumn.vue'
import Filter from './component/Filter.vue'
import CompanyCard from './component/CompanyCard.vue'
import PositionCard from './component/PositionCard.vue'
import Login from './component/Login.vue'
import Searcher from './component/Searcher.vue'

var navbar=new Vue({
	el:'#Navbar',
	render:h=>h(Navbar)
})
// var recommendrow=new Vue({
// 	el:'#RecommendRow',
// 	render:h=>h(RecommendRow)
// })
var recommendcolumn=new Vue({
	el:'#RecommendColumn',
	render:h=>h(RecommendColumn)
})
// var filter=new Vue({
// 	el:'#Filter',
// 	render:h=>h(Filter)
// })

var searcher=new Vue({
	el:'#Searcher',
	render:h=>h(Searcher)
})

/*var positionCard=new Vue({
	el:'#PositionCard',
	render:h=>h(PositionCard)
})*/
// var login=new Vue({
// 	el:'#Login',
// 	render:h=>h(Login)
// })