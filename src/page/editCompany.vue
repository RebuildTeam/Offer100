<template>
	<div id="EditCompany">
		<HRNavbar></HRNavbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<EditCompanyPanel v-bind:companyDetail="companyDetailMsg"></EditCompanyPanel>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import EditCompanyPanel from '../component/EditCompanyPanel.vue'
	export default{
		name:'EditCompany',
		components:{
			HRNavbar,
			EditCompanyPanel,
		},
		data(){
			return{
				idMsg:window.localStorage.getItem("id"),
				companyNameMsg:window.localStorage.getItem("companyName"),
			}
		},
		created:function(){

		},
	}
</script>
