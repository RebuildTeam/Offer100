<template>
	<div id="DeliveryBox">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<div class="container">
			<ResumeFilter ></ResumeFilter>
		</div>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import ResumeFilter from '../component/ResumeFilter.vue'
	export default{
		name:'DeliveryBox',
		components:{
			Navbar,
			ResumeFilter,
		},
		data(){
			return{
				idMsg:window.localStorage.getItem("id"),
				usernameMsg:window.localStorage.getItem("username"),
			}
		},
	}
</script>
