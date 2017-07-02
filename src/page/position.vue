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
				companyName:"欧德蒙",
				positionName:"java工程师",
				positionDetailMsg:{}
			}
		},
		methods:{
			initPositionData:function(){
				var jsonObj={
					'id':"",
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
		},
		created:function(){
			this.initPositionData();
		}
	}
</script>
