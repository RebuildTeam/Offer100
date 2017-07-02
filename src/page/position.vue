<template>
	<div id="Position">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<PositionBrief v-bind:positionDetail="positionDetailMsg"></PositionBrief>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import PositionBrief from '../component/PositionBrief.vue'
	export default{
		name:'Position',
		components:{
			Navbar,
			PositionBrief
		},
		data(){
			return{
				companyName:"DataHunter",
				positionName:"web前端工程师",
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
					url:'./src/api/getPosition',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.positionDetailMsg=result.data;
						console.log(JSON.stringify(this.positionDetailMs));
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
