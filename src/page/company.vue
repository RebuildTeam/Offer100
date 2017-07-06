<template>
	<div id="Company">
		<Navbar v-bind:caller="caller"></Navbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'Index',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
		<CompanyBrief v-bind:companyDetail="companyDetailMsg" v-bind:caller="caller"></CompanyBrief>
		<CompanyIntro v-bind:companyDetail="companyDetailMsg" v-bind:caller="caller"></CompanyIntro>
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
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:window.localStorage.getItem(this.idMsg),
				companyName:this.$router.currentRoute.query.companyName,
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
					'companyName':this.companyName,
				};
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
