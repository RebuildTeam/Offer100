<template>
<div align="center" id="PR">
	<div align="left" class="PR">
		<div class="container">
		<div class="left-panel" align="center">
			<div class="PR-head"></div>
			<div class="PR-photo"></div>
			<div class="PR-content">
				<br><br><br>
				<h3>{{PRDetail.applicantName}}</h3>
				<h4>{{PRDetail.introduce}}</h4>
				<div v-for="item in PRDetail.educationExperience">
					<p class="secondary-info">{{item.major}}{{item.experience}}-{{item.college}}</p>
				</div>
				<p class="secondary-info">{{PRDetail.gender}},{{PRDetail.province}}省／直辖市,{{PRDetail.city}}市</p>
				<p class="secondary-info">{{PRDetail.telephone}},{{PRDetail.email}}</p>
				<hr>
				<h3>教育经历</h3>
				<div v-for="item in PRDetail.educationExperience" align="left">
					<h4 class="primary-info">{{item.college}}</h4>
					<p>
						<span class="secondary-info">{{item.experience}},{{item.major}}</span>
						<span class="secondary-info">{{item.startTime}}~{{item.endTime}}</span>
					</p>
					<br>
				</div>
				<hr>
				<h3>实习经历</h3>
				<div v-for="item in PRDetail.internshipExperience" align="left">
					<h4>{{item.companyName}}</h4>
					<p class="primary-info">{{item.position}}</p>
					<p>
						<span class="secondary-info">{{item.startTime}}~{{item.endTime}}</span>
					</p>
					<p class="secondary-info">{{item.mainWork}}</p>
					<br>
				</div>
				<hr>
				<h3>项目经历</h3>
				<div v-for="item in PRDetail.projectExperience" align="left">
					<h4>{{item.projectName}}</h4>
					<p class="primary-info">{{item.responsibility}}</p>
					<p>
						<span class="secondary-info">{{item.startTime}}~{{item.endTime}}</span>
					</p>
					<p class="secondary-info">{{item.projectDescribe}}</p>
					<br>
				</div>
				<hr>
				<h3>个人期望</h3>
				<p class="primary-info">
					<span>{{PRDetail.expectPosition}}</span>&nbsp;&nbsp;<span>{{PRDetail.expectCity}}</span>&nbsp;&nbsp;<span>{{PRDetail.expectSalary}}</span>
				</p>
				<hr>
				<h3>技能评价</h3>
				<p v-for="item in PRDetail.skillExperience" align="left" class="secondary-info">
					<span>{{item.skill}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{item.mastery}}</span>
				</p>
				<hr>
				<button v-if="caller=='applicant'">编辑</button>
			</div>
		</div>
		<div class="right-panel" align="left">
			<div class="panel-1">
				<button>投递箱</button>
				<button>消息</button>
			</div>
			<div class="panel-2 PR-quick-label" align="center">
				<h3>基本资料</h3> 
				<h3>教育经历</h3> 
				<h3>实习经历</h3> 
				<h3>项目经历</h3> 
				<h3>个人期望</h3> 
				<h3>技能评价</h3> 
			</div>
		</div>
		</div>

	</div>
</div>
</template>


<style type="text/css" scoped>
.primary-info{
	font-size: 16px;
	color:#333;
}
.secondary-info{
	font-size: 14px;
	color: #999;
}
.container{
	padding:0;
}
.PR{
	font-size: 10pt;
	width: 100%;
	background-color: #fff;
	padding: 0.5em;
	overflow: hidden;
}
.left-panel{
	float: left;
	width: 70%;
	/*box-shadow: 1px 1px 5px 1px #dfdfdf;*/
	padding: 20px;
	padding-top: 0;
	box-sizing: border-box;
}
.PR-head{
	background-color: #00b38a;
	height: 10em;
}
.PR-photo{
	border-radius: 50%;
	width: 8em;
	height: 8em;
	background-color: white;
	margin-top: -4em;
	margin-bottom: -4em;
	position: relative;
	z-index: 99;
	box-shadow: 1px 1px 5px 1px #dfdfdf;
}
.PR-content{
	background-color: #f6f6f6;
	padding: 20px;
	box-sizing: border-box;
}
.PR-quick-label>h3{
	transition:all 0.6s;
}
.PR-quick-label>h3:hover{
	background-color:#666;
	color:white;
}
.right-panel{
	float: left;
	width: 26%;
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
			// PRDetail:this.PRDetail,
			idMsg:window.localStorage.getItem("id"),
			usernameMsg:window.localStorage.getItem("username"),
		}
	},
	methods:{
		setPRData:function(){
			var jsonObj={
				id:idMsg,
				username,usernameMsg
			}
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
	mounted:function(){
		// this.PRDetail=JSON.parse(JSON.stringify(this.PRDetail));
		// console.log("Detail:",JSON.stringify(this.PRDetail));
		// console.log("Info:",JSON.stringify(this.PRDetail));
	}
}
</script>
