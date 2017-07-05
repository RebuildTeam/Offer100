<template>
	<div id="Position">
		<Navbar v-bind:caller="caller"></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<PositionBrief v-bind:positionDetail="positionDetailMsg" v-bind:caller="caller"></PositionBrief>
		<PositionIntro v-bind:positionDetail="positionDetailMsg" v-bind:caller="caller"></PositionIntro>
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
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:"",
				companyName:"",
				positionName:"",
				positionDetailMsg:{},
				caller:"",
			}
		},
		created:function(){
				this.nameMsg=window.localStorage.getItem(this.idMsg);
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
						this.positionDetailMsg=result.data;
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
