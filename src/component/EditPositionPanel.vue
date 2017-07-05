<template>
<div  align="center" id="EditPositionPanel">
	<div class=".container" align="center">
			<p>{{positionInfo.releaseTime}}</p>
			<input placeholder="职位名称" v-model="positionInfo.positionName" >
			<p v-if="positionInfo.positionName==''||positionInfo.positionName==null">请输入有效的职位名称</p>
			<input placeholder="薪资水平,如:5k~8k"  v-model="positionInfo.salary" >
			<p v-if="positionInfo.salary==''||positionInfo.salary==null">请输入有效的薪资</p>
			<input placeholder="工作城市"  v-model="positionInfo.city">
			<p v-if="positionInfo.city==''||positionInfo.city==null">请输入有效的工作职位</p>
			<input placeholder="学历要求,如大专及以上"  v-model="positionInfo.requiredEducation">
			<input placeholder="工作经验,如1~3年"  v-model="positionInfo.requiredExperience">
			<input placeholder="职位类型,如全职，实习，兼职"  v-model="positionInfo.positionType" >
			<p v-if="positionInfo.positionType==''||positionInfo.positionType==null">请输入有效的职位类型</p>
			<input placeholder="职位标签,用半角逗号隔开,如'假期长,福利好,节日礼品'"  v-model="positionInfo.positionTag">
			<textarea placeholder="职位介绍"  v-model="positionInfo.introduction" rows="5"></textarea> 
			<textarea placeholder="工作职责"  v-model="positionInfo.responsibility" rows="5"></textarea>
			<textarea placeholder="技术要求"  v-model="positionInfo.requiredSkill" rows="5"></textarea> 
			<textarea placeholder="优先招聘条件"  v-model="positionInfo.priority" rows="5"></textarea>
			<input placeholder="工作时间,如:周一到周五 9:00am ~ 18:00pm"  v-model="positionInfo.officeHour">
			<input placeholder="职位诱惑"  v-model="positionInfo.welfare">
			<textarea placeholder="其他" v-model="positionInfo.others"></textarea>
			<div align="center">
				<button 
					class="btn-green submit-btn"
					 v-if="positionInfo.positionName&&positionInfo.salary&&positionInfo.city&&positionInfo.positionType"
					 v-on:click="setPositionData()">提交</button>
			</div>
	</div>
</div>
</template>


<style type="text/css" scoped>
.container{
	background-color: #f6f6f6;
}
input{
	border-radius: 10px;
	height: 2em;
	width: 80%;
	max-width: 800px;
	border: none;
	box-shadow:inset 1px 1px 5px 1px #dfdfdf;
	padding: 10px;
	box-sizing: border-box;
	margin-bottom: 10px;
}
textarea{
	border-radius: 10px;
	width: 80%;
	max-width: 800px;
	border: none;
	box-shadow:inset 1px 1px 5px 1px #dfdfdf;
	resize: none;
	padding:10px;
	box-sizing: border-box;
	margin-bottom: 10px;
}
.submit-btn{
	width: 8em;
	height: 3em;
	border: none;
	border-radius: 10px;
}
.btn-green{
	background-color: inherit;
	color: #00b38a;
	transition:all 0.6s;
}
.btn-green:hover{
	background-color: #00b38a;
	color: white;
}
</style>
<script type="text/javascript">
export default{
	name:'EditPositionPanel',
	props:['caller'],
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			positionInfo:{
						"positionName": "",
						"salary": "",
						"city": "",
						"requiredEducation": "",
						"requiredExperience": "",
						"positionType": "",
						"positionTag": "",
						"releaseTime": "",
						"introduction": "",
						"responsibility": "",
						"requiredSkill": "",
						"priority": "",
						"officeHour": "",
						"welfare": "",
						"others": "",
						"applicant": []
					}
		}
	},
	methods:{
		setPositionData:function(){
			var d=new Date();
			this.positionInfo.releaseTime=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
			var jsonObj={
				'id':this.idMsg,
				'companyName':this.nameMsg,
				'data':this.positionInfo,
			}
			$.ajax({
				url:'./src/api/setPosition',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					if(result.code==0){
						alert("添加成功");
					}else{
						alert("添加失败，因为"+result.message);
					}
				},
				error:function(result,msg,error){
					console.log("error>>>>>>",result,msg,error);
				}
			})
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>
