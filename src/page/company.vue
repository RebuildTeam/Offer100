<template>
	<div id="Company">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<CompanyBrief v-bind:companyDetail="companyDetailMsg"></CompanyBrief>
		<CompanyIntro v-bind:companyDetail="companyDetailMsg"></CompanyIntro>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import CompanyBrief from '../component/CompanyBrief.vue'
import CompanyIntro from '../component/CompanyIntro.vue'
	export default{
		name:'Company',
		components:{
			Navbar,
			CompanyBrief,
			CompanyIntro
		},
		data(){
			return{
				idMsg:window.localStorage.getItem("id"),
				usernameMsg:window.localStorage.getItem("username"),
				companyName:"",
				companyDetailMsg:{}
			}
		},
		created:function(){
				this.companyName=this.$router.currentRoute.query.companyName;
				this.initCompanyData();
		},
		methods:{
			initCompanyData:function(){
				var jsonObj={
					'id':this.idMsg,
					'companyName':this.companyName,
					'CompanyName':this.CompanyName
				};
				$.ajax({
					url:'./src/api/getCompanyDetail',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						console.log(result);
						this.companyDetailMsg=result.data;
						console.log(this.companyDetailMsg);
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		}
	}
</script>
