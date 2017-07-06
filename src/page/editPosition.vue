<template>
	<div id="Position">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'CompanyManagement',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
		<EditPositionPanel v-bind:positionDetail="positionDetailMsg" v-bind:caller="caller"></EditPositionPanel>
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
				positionDetailMsg:{},
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:window.localStorage.getItem(this.idMsg),
				caller:"",
			}
		},
		created:function(){
				this.nameMsg=window.localStorage.getItem(this.idMsg);
				this.initPositionData();
				this.getCaller();
		},
		methods:{
			initPositionData:function(){
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
			},
			getCaller:function(){
				var jsonObj={
					'id':this.idMsg,
				};
				$.ajax({
					url:'./src/api/getCaller',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.caller=result.caller;
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			},
		}
	}
</script>
