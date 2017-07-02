<template>
	<div id="App">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<div class="container">
			<div class="row">
				<div class="left-content">
					<Searcher></Searcher>
				</div>
				<div class="right-panel">	
					<h1  id="recommend-label" align="center">Recommend</h1>
					<RecommendColumn></RecommendColumn>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
import Navbar from './Navbar.vue'
import Searcher from './Searcher.vue'
import RecommendColumn from './RecommendColumn.vue'

	export default{
		name:'App',
		components:{
			Navbar,
			Searcher,
			RecommendColumn
		},
	}
</script>