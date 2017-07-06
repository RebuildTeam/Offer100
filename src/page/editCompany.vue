<template>
	<div id="EditCompany">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'CompanyManagement',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
		<EditCompanyPanel v-bind:companyDetail="companyDetailMsg" v-bind:caller="caller"></EditCompanyPanel>
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
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:window.localStorage.getItem(this.idMsg),
				caller:"",
			}
		},
		methods:{
			getCaller:function(){
				var jsonObj={
					'id':this.idMsg,
				};
				$.ajax({
					url:'./src/api/getCaller',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.caller=result.caller;
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		},
		created:function(){
			this.nameMsg=window.localStorage.getItem(this.idMsg);
			this.getCaller();
		},
	}
</script>
