<template>
	<div id="Index">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<h1  id="recommend-label" align="center">Recommend</h1>
		<RecommendRow></RecommendRow>
		<br><br>
		<CompanyFilter></CompanyFilter>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import RecommendRow from '../component/RecommendRow.vue'
import CompanyFilter from '../component/CompanyFilter.vue'
	export default{
		name:'Index',
		components:{
			Navbar,
			CompanyFilter,
			RecommendRow
		},
	}
</script>