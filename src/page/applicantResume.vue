<template>
	<div id="ApplicantResume">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'CompanyManagement',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
		<div class="container">
			<PR v-bind:PRDetail="PRDetailMsg" v-bind:caller="caller"></PR>
		</div>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import PR from '../component/PR.vue'
	export default{
		name:'ApplicantResume',
		components:{
			HRNavbar,
			PR,
		},
		data(){
			return{
				idMsg:this.$router.currentRoute.query.id,
				username:this.$router.currentRoute.query.username,
				nameMsg:"",
				caller:"",
				PRDetailMsg:{}
			}
		},
		created:function(){
				this.nameMsg=window.localStorage.getItem(this.idMsg);
				this.initPRData();
		},
		methods:{
			initPRData:function(){
				var jsonObj={
					'id':this.idMsg,
					'username':this.username,
				};
				$.ajax({
					url:'./src/api/getResume',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.PRDetailMsg=result.data;
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
