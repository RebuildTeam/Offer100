<template>
	<div id="Position">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<PositionBrief></PositionBrief>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import PositionBrief from '../component/PositionBrief.vue'
	export default{
		name:'Position',
		components:{
			Navbar,
			PositionBrief
		},
	}
</script>