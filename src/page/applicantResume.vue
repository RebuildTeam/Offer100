<template>
	<div id="ApplicantResume">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
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
				applicantName:this.$router.currentRoute.query.applicantName,
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
					'username':this.applicantName,
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
