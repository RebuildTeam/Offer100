<template>
	<div id="CompanyManagement">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		{{nameMsg}}
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<CompanyBrief v-bind:companyDetail="companyDetailMsg" v-bind:caller="caller"></CompanyBrief>
		<CompanyIntro v-bind:companyDetail="companyDetailMsg" v-bind:caller="caller"></CompanyIntro>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import CompanyBrief from '../component/CompanyBrief.vue'
import CompanyIntro from '../component/CompanyIntro.vue'
	export default{
		name:'CompanyManagement',
		components:{
			HRNavbar,
			CompanyBrief,
			CompanyIntro
		},
		data(){
			return{
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:window.localStorage.getItem(this.idMsg),
				companyDetailMsg:{},
				caller:"",
			}
		},
		created:function(){
				this.nameMsg=window.localStorage.getItem(this.idMsg);
				this.initCompanyData();
		},
		methods:{
			initCompanyData:function(){
				var jsonObj={
					'id':this.idMsg,
					'companyName':this.nameMsg,
				};
				console.log("idMsg:"+this.idMsg+"  nameMsg:"+this.nameMsg);
				$.ajax({
					url:'./src/api/getCompanyDetail',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.companyDetailMsg=result.data;
						this.caller=result.caller;
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		}
	}
</script>
