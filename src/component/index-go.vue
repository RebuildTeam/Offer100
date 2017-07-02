<template>
	<div id="App">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<h1  id="recommend-label" align="center">Recommend</h1>
		<RecommendRow></RecommendRow>
		<br><br>
		<CompanyFilter></CompanyFilter>
	</div>
</template>
<script type="text/javascript">
import Navbar from './Navbar.vue'
import RecommendRow from './RecommendRow.vue'
import CompanyFilter from './CompanyFilter.vue'
	export default{
		name:'App',
		components:{
			Navbar,
			CompanyFilter,
			RecommendRow
		},
	}
</script>