<template>
	<div id="ResumeBox">
		<HRNavbar></HRNavbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<div class="container">
			<ResumeFilter ></ResumeFilter>
		</div>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import ResumeFilter from '../component/ResumeFilter.vue'
	export default{
		name:'ResumeBox',
		components:{
			HRNavbar,
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
