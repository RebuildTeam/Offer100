<template>
<div align="center" id="PositionBrief">
	<div align="left" class="PositionBrief">
		<div class="container">
		<div class="left-panel">
			<p>{{positionDetail.companyName}}</p>
			<h3>{{positionDetail.positionName}}</h3>
			<span>{{positionDetail.salary}}</span>
			<span>{{positionDetail.city}}</span>
			<span>{{positionDetail.requiredExperience}}</span>
			<span>{{positionDetail.requiredEducation}}</span>
			<span>{{positionDetail.positionType}}</span>
			<p>{{positionDetail.releaseTime}}</p>
		</div>
		<div class="right-panel" align="center">
			<br>
			<br>
			<button class="send-pr-btn" v-on:click="sendPR()">投个简历</button>
		</div>
		</div>

	</div>
</div>
</template>


<style type="text/css" scoped>
.container{
	padding:0;
}
.PositionBrief{
	font-size: 10pt;
	width: 100%;
	padding: 0.5em;
	overflow: hidden;
	background-color: #eeeeee;
	box-shadow: inset 1px 1px 5px 1px #dfdfdf;
	color: #666;
}
.left-panel{
	float: left;
	width: 60%;
	box-sizing: border-box;
	padding: 20px;
}
.right-panel{
	float: left;
	box-sizing: border-box;
	padding: 20px;
	width: 40%;
	position: relative;
	margin:0;
}
.send-pr-btn{
	width: 8em;
	height: 2.5em;
	font-size: 1.5em;
	border:none;
	border-radius: 5px;
	background-color: #00b38a;
	color: white;
}
</style>
<script type="text/javascript">

export default{
	name:'PositionBrief',
	props:['positionDetail'],
	data(){
		return{
			idMsg:window.localStorage.getItem("id"),
			usernameMsg:window.localStorage.getItem("username"),
		}
	},
	methods:{
		sendPR:function(){
			var jsonObj={
				id:this.idMsg,
				username:this.usernameMsg,
				companyName:this.positionDetail.companyName,
				positionName:this.positionDetail.positionName,
			}
			console.log(jsonObj);
			$.ajax({
				url:'./src/api/sendResume',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					if(result.code==0){
						alert("投递成功")
					}else{
						alert(result.code+" "+result.message);
					}
				},
				error:function(result,msg,error){
					alert("服务器异常")
				}
			})
		}
	}
}
</script>
