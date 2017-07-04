<template>
<div align="center" id="PositionIntro">
	<div align="left" class="PositionIntro">
		<div class="container">
		<div class="left-panel" align="center">
			<h3>{{PRDetail.applicantName}}</h3>
			<h6>{{PRDetail.introduce}}</h6>
			<p>{{PRDetail.educationExperience.major}}-{{PRDetail.educationExperience.college}}</p>
			<p>{{PRDetail.gender}},{{PRDetail.province}},{{PRDetail.city}}</p>
			<p>{{PRDetail.telephone}},{{PRDetail.email}}</p>
			<p>{{positionDetail.requiredSkill}}</p>
			<h3>工作地址</h3>
			<p>{{positionDetail.city}}</p><br>
			<hr>
			<h3>教育经历</h3>
			<p>{{PRDetail.college}}</p>
			<p>{{PRDetail.experience}},{{PRDetail.major}}</p>
			<p>{{PRDetail.startTime}}~{{PRDetail.endTime}}</p>
			<button v-if="caller=='applicant"></button>
		</div>
		<div class="right-panel" align="left">
			<div class="panel-1">
				<button>投递箱</button>
				<button>消息</button>
			</div>
			<div class="panel-2">
				<ul>
					<li>教育经历</li>
				</ul>
			</div>
		</div>
		</div>

	</div>
</div>
</template>


<style type="text/css" scoped>
.container{
	padding:0;
}
.PositionIntro{
	font-size: 10pt;
	width: 100%;
	background-color: #fff;
	padding: 0.5em;
	overflow: hidden;
}
.left-panel{
	float: left;
	width: 60%;
	/*box-shadow: 1px 1px 5px 1px #dfdfdf;*/
	padding: 20px;
	box-sizing: border-box;
}
.right-panel{
	float: left;
	width: 36%;
	margin-left: 4%;
	position: relative;
	
}
.panel-1{
	width: 100%;
	box-shadow: 1px 1px 5px 1px #dfdfdf;
	padding: 20px;
	box-sizing: border-box;
	font-size: 16px;
}
.panel-2{
	margin-top: 20px;
	width: 100%;
	box-shadow: 1px 1px 5px 1px #dfdfdf;
	padding: 20px;
	box-sizing: border-box;
	font-size: 16px;
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
h3{
	margin:0;
	color: #666;
}
.icon
{
    width: 16px;
    height: 16px;
    display: inline-block;
}
.companyInfoItem{
	margin-top: 20px;
	margin-bottom: 20px;
	color: #666;
}
.companyTag{
	margin:6px;
	width: 6em;
	box-sizing: border-box;
	background-color: inherit;
	border: 1px solid #bfbfbf;
	border-radius: 10px;
	color:#bfbfbf;
}
</style>
<script type="text/javascript">

export default{
	name:'PR',
	props:['PRDetail','caller'],
	data(){
		return{

		}
	},
	methods:{
		setPRData:function(){
			var jsonObj={
				
			}
			console.log(this.companyName);
			$.ajax({
				url:'./src/api/sendResume',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					alert("更新成功")
				},
				error:function(result,msg,error){
					alert("更新失败")
				}
			})
		}
	},
	created:function(){

	}
}
</script>
