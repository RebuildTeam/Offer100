<template>
	<div id="Position">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<PositionBrief v-bind:positionDetail="positionDetailMsg"></PositionBrief>
		<PositionIntro v-bind:positionDetail="positionDetailMsg"></PositionIntro>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import PositionBrief from '../component/PositionBrief.vue'
import PositionIntro from '../component/PositionIntro.vue'
	export default{
		name:'Position',
		components:{
			Navbar,
			PositionBrief,
			PositionIntro
		},
		data(){
			return{
				companyName:"",
				positionName:"",
				positionDetailMsg:{},
				idMsg:window.localStorage.getItem("id"),
				usernameMsg:window.localStorage.getItem("username"),
			}
		},
		created:function(){
				this.companyName=this.$router.currentRoute.query.companyName;
				this.positionName=this.$router.currentRoute.query.positionName;
				this.initPositionData();
		},
		methods:{
			initPositionData:function(){
				var jsonObj={
					'id':this.idMsg,
					'companyName':this.companyName,
					'positionName':this.positionName
				};
				$.ajax({
					url:'./src/api/getPositionDetail',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						console.log(result);
						this.positionDetailMsg=result.data;
						console.log(this.positionDetailMs);
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		}
	}
</script>
