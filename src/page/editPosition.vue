<template>
	<div id="Position">
		<HRNavbar></HRNavbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<EditPositionPanel v-bind:positionDetail="positionDetailMsg"></EditPositionPanel>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import EditPositionPanel from '../component/EditPositionPanel.vue'
	export default{
		name:'EditPosition',
		components:{
			HRNavbar,
			EditPositionPanel,
		},
		data(){
			return{
				companyName:"",
				positionName:"",
				positionDetailMsg:{},
				idMsg:window.localStorage.getItem("id"),
				companyNameMsg:window.localStorage.getItem("companyName"),
			}
		},
		created:function(){
				this.positionName=this.$router.currentRoute.query.positionName;
				this.initPositionData();
		},
		methods:{
			initPositionData:function(){
				if(this.positionName==''||this.positionName==null){
					this.positionDetailMsg={
						"positionName": "",
						"salary": "",
						"city": "",
						"requiredEducation": "",
						"requiredExperience": "",
						"positionType": "",
						"positionTag": "",
						"releaseTime": ''+(new Date("yyyy-mm-dd")),
						"introduction": "",
						"responsibility": "",
						"requiredSkill": "",
						"priority": "",
						"officeHour": "",
						"welfare": "",
						"others": "",
						"applicant": []
					}
					this.positionDetailMsg=JSON.stringify(this.positionDetailMsg);
					console.log(this.positionDetailMsg);
				}else{
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
	}
</script>
