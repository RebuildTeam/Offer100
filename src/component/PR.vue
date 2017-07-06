<template>
<div align="center" id="PR">
	<div align="left" class="PR">
		<div class="container">
		<div class="left-panel" align="center">
		<!-- <form action=""> -->
			<div class="PR-head"></div>
			<div class="PR-photo" v-bind:style="{backgroundImage:'url(./src/img/'+PRInfo.photo+')'}"></div>
			<div class="PR-content">
				<br><br><br>
				<h3>{{PRInfo.applicantName}}</h3>
				<h4 v-if="editable==false">{{PRInfo.introduce}}</h4>
				<input class="alignCenter" v-model="PRInfo.introduce" v-if="editable==true" placeholder="一句话介绍自己" />
				<div v-for="item in PRInfo.educationExperience">
					<p class="secondary-info">
						<img class="icon" v-bind:src="'./src/img/school.png'">
						{{item.major}}{{item.experience}}-{{item.college}}
					</p>
				</div>
				<p v-if="editable==false" class="secondary-info">
					<img class="icon" v-bind:src="'./src/img/user.png'">
					{{PRInfo.gender}},{{PRInfo.province}}省／直辖市,{{PRInfo.city}}市</p>
				<input class="alignCenter" v-model="PRInfo.gender" v-if="editable==true" placeholder="性别" />
				<input class="alignCenter" v-model="PRInfo.province" v-if="editable==true" placeholder="省／直辖市" />
				<input class="alignCenter" v-model="PRInfo.city" v-if="editable==true" placeholder="地级市" />

				<p v-if="editable==false" class="secondary-info">
					<img class="icon" v-bind:src="'./src/img/phone.png'">
					{{PRInfo.telephone}}
					<img class="icon" v-bind:src="'./src/img/email.png'">
					{{PRInfo.email}}
				</p>
				<input class="alignCenter" v-model="PRInfo.telephone" v-if="editable==true" placeholder="联系电话" />
				<input class="alignCenter" v-model="PRInfo.email" v-if="editable==true" placeholder="邮箱"/>

				<hr>
				<h3 id="educationExperience">教育经历</h3>
				<div v-for="(item,index) in PRInfo.educationExperience" align="left">
					<h4 v-if="editable==false" class="primary-info">{{item.college}}</h4>
					<input v-model="item.college" v-if="editable==true" placeholder="院校"/>

					<p>
						<span v-if="editable==false" class="secondary-info">{{item.experience}},{{item.major}}</span>

						<span v-if="editable==false" class="secondary-info">{{item.startTime}}~{{item.endTime}}</span>
						<input v-model="item.experience" v-if="editable==true" placeholder="学历"/>
						<input v-model="item.major" v-if="editable==true" placeholder="专业"/>
						<input v-model="item.startTime" v-if="editable==true" placeholder="起始时间"/>
						<input v-model="item.endTime" v-if="editable==true" placeholder="毕业时间" />
					</p>
					<div align="center"><button class="btn-operation btn-red" v-if="editable==true" v-on:click="deleteExperienceByIndex('educationExperience',index)">删除</button></div>
					<br>
				</div>
				<button class="btn-operation btn-blue" v-if="editable==true" v-on:click="addNewExperience('educationExperience')">新增教育经历</button>
				<hr>
				<h3 id="internshipExperience">实习经历</h3>
				<div v-for="(item,index) in PRInfo.internshipExperience" align="left">
					<h4 v-if="editable==false">{{item.companyName}}</h4>
					<input v-model="item.companyName" v-if="editable==true" placeholder="实习单位名称"/>

					<p v-if="editable==false" class="primary-info">{{item.position}}</p>
					<input v-model="item.position" v-if="editable==true" placeholder="职位"/>
					<p>
						<span class="secondary-info" v-if="editable==false">{{item.startTime}}~{{item.endTime}}</span>
						<input v-model="item.startTime" v-if="editable==true" placeholder="起始时间"/>
						<input v-model="item.endTime" v-if="editable==true" placeholder="结束时间"/>
					</p>
					<p v-if="editable==false" class="secondary-info">{{item.mainWork}}</p>
						<textarea v-model="item.mainWork" v-if="editable==true" rows="10" placeholder="实习内容描述"></textarea> 
					<div align="center"><button class="btn-operation btn-red" v-if="editable==true" v-on:click="deleteExperienceByIndex('internshipExperience',index)">删除</button></div>
					<br>
				</div>
				<button class="btn-operation btn-blue" v-if="editable==true" v-on:click="addNewExperience('internshipExperience')">新增实习经历</button>
				<hr>
				<h3 id="projectExperience">项目经历</h3>
				<div v-for="(item,index) in PRInfo.projectExperience" align="left">
					<h4 v-if="editable==false">{{item.projectName}}</h4>
					<input v-model="item.projectName" v-if="editable==true" placeholder="项目名称"/>

					<p v-if="editable==false"  class="primary-info">{{item.responsibility}}</p>
					<input v-model="item.responsibility" v-if="editable==true" placeholder="职责"/>

					<p>
						<span v-if="editable==false" class="secondary-info">{{item.startTime}}~{{item.endTime}}</span>
						<input v-model="item.startTime" v-if="editable==true" placeholder="起始时间"/>
						<input v-model="item.endTime" v-if="editable==true" placeholder="结束时间"/>
					</p>
					<p v-if="editable==false" class="secondary-info">{{item.projectDescribe}}</p>
					<textarea v-model="item.projectDescribe" v-if="editable==true"  rows="10" placeholder="项目内容描述"></textarea> 
					<div align="center"><button class="btn-operation btn-red" v-if="editable==true" v-on:click="deleteExperienceByIndex('projectExperience',index)">删除</button></div>

					<br>
				</div>
				<button class="btn-operation btn-blue" v-if="editable==true" v-on:click="addNewExperience('projectExperience')">新增项目经历</button>
				<hr>
				<h3 id="personalExpectation">个人期望</h3>
				<p class="secondary-info">
					<span v-if="editable==false">
						<span >
							<img class="icon" v-bind:src="'./src/img/tie.png'">
							{{PRInfo.expectPosition}}
						</span>
							&nbsp;&nbsp;
						<span>
							<img class="icon" v-bind:src="'./src/img/position.png'">
							{{PRInfo.expectCity}}
						</span>
							&nbsp;&nbsp;
						<span>
							<img class="icon" v-bind:src="'./src/img/money.png'">
							{{PRInfo.expectSalary}}
							</span>
					</span>
						<input class="alignCenter" v-model="PRInfo.expectPosition" v-if="editable==true" placeholder="期望岗位"/>
						<input class="alignCenter" v-model="PRInfo.expectCity" v-if="editable==true" placeholder="期望城市"/>
						<input class="alignCenter" v-model="PRInfo.expectSalary" v-if="editable==true" placeholder="期望薪资"/>

				</p>
				<hr>
				<h3 id="skillExperience">技能评价</h3>
				<div v-for="(item,index) in PRInfo.skillExperience" align="left" class="secondary-info">
					<span  v-if="editable==false">
						<span>{{item.skill}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{item.mastery}}</span>
					</span>
					<input v-model="item.skill" v-if="editable==true" placeholder="技能名称"/>
					<input v-model="item.mastery" v-if="editable==true" placeholder="自我评价(A,B,C,D 或 精通，掌握，熟悉，了解)"/>
					<div align="center"><button class="btn-operation btn-red" v-if="editable==true" v-on:click="deleteExperienceByIndex('skillExperience',index)">删除</button></div>
				</div>
				<button class="btn-operation btn-blue" v-if="editable==true" v-on:click="addNewExperience('skillExperience')">新增技能评价</button>
				<hr v-if="caller=='applicant'">
				<button v-if="caller=='applicant'" id="edit-btn" v-on:click="editable=!editable">
					<img class="icon" v-bind:src="'./src/img/pencil.png'">
					{{editBtnText}}
				</button>
			</div>
			<!-- </form> -->
		</div>
		<div class="right-panel" id="right-panel" v-bind:style="{top:scrollTop+'px'}" align="left">
			<div class="panel-1">
				<button class="delivery-btn">投递箱</button>
			</div>
			<div class="panel-2 PR-quick-label" align="center">
				<br>
				<br>
				<br>
				<h3 v-on:click="scrollTo('PR')">基本资料</h3> 
				<h3 v-on:click="scrollTo('educationExperience')">教育经历</h3> 
				<h3 v-on:click="scrollTo('internshipExperience')">实习经历</h3> 
				<h3 v-on:click="scrollTo('projectExperience')">项目经历</h3> 
				<h3 v-on:click="scrollTo('personalExpectation')">个人期望</h3> 
				<h3 v-on:click="scrollTo('skillExperience')">技能评价</h3> 
				<br>
				<br>
				<br>

			</div>
		</div>
		</div>
	</div>
</div>
</template>


<style type="text/css" scoped>
*{
	transition: color,background-color 0.6s;
}
.icon{
	width: 14px;
	height: 14px;
}
input{
	width: 80%;
	margin-left: 10%;
	margin-bottom: 20px;
	height: 2em;
	box-shadow: inset 1px 1px 5px 1px #dfdfdf;
	background-color: rgba(255,255,255,0.4);
	border: none;
	border-right: 10px;
}
.alignCenter{
	margin-left: 0;
}
.btn-operation{
	width: 8em;
	height: 3em;
	border: none;
	border-radius: 10px;
	transition:all 0.6s;
}
.btn-red{
	background-color: inherit;
	color: #ff6666;
}
.btn-red:hover{
	background-color: #ff6666;
	color: white;
}
.btn-blue{
	background-color: inherit;
	color: #00b38a;
}
.btn-blue:hover{
	background-color: #00b38a;
	color: white;
}
textarea{
	resize:none;
	width:80%;
	margin-left: 10%;
	border: none;
	box-shadow: inset 1px 1px 5px 1px #dfdfdf;
	background-color: rgba(255,255,255,0.4);
	border-right: 10px;
}
.delivery-btn{
	width: 100%;
	background-color: #f6f6f6;
	border:1px solid #dfdfdf;
	box-sizing: border-box;
	border: none;
	padding: 20px;
	box-sizing: border-box;
	font-size: 16px;
}
.msg-btn{
	width: 49%;
	background-color: #f6f6f6;
	border:1px solid #dfdfdf;
	box-sizing: border-box;
	margin-left: 2%;
	border: none;
	padding: 20px;
	box-sizing: border-box;
	font-size: 16px;
}
#edit-btn{
	width: 8em;
	background-color: #dfdfdf;
	border:1px solid #dfdfdf;
	color: #999;
	box-sizing: border-box;
	border: none;
	padding: 20px;
	box-sizing: border-box;
	font-size: 16px;
}
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
	width: 75%;
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
	background-size: 100% 100%;
	background-position: center;
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
	border:1px solid #dfdfdf;
	box-sizing: border-box;
	padding: 20px;
	box-sizing: border-box;
}
.PR-quick-label>h3{
	transition:all 0.6s;
	font-weight: lighter;
}
.PR-quick-label>h3:hover{
	background-color:#666;
	font-weight: lighter;
	color:white;
}
.right-panel{
	position: fixed;
	margin-top: 83px;
	width: calc(940px * 0.23);
	right: calc( ( 100% - 940px ) / 2  );
}
.panel-1{
	width: 100%;
	/*box-shadow: 1px 1px 5px 1px #dfdfdf;*/
	/*padding: 20px;*/
	z-index: 98;
	position: relative;
	box-sizing: border-box;
	font-size: 16px;
}
.panel-2{
	border-left: 1px solid #dfdfdf;
	margin-top: 20px;
	z-index: 99;
	position: relative;
	width: 100%;
	background-color: white;
	/*box-shadow: 1px 1px 5px 1px #dfdfdf;*/
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
			scrollTop:document.body.scrollTop,
			editable:false,
			editBtnText:"编辑",
			PRInfo:{},
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
		}
	},
	methods:{
		setPRData:function(){
			var jsonObj={
				id:this.idMsg,
				username:this.nameMsg,
				data:this.PRInfo,
			}
			console.log(jsonObj);
			$.ajax({
				url:'./src/api/setResume',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					if(result.code==0){
						alert("更新成功")
					}else{
						alert(result.code+" "+result.message);
					}
				},
				error:function(result,msg,error){
					alert("更新失败")
				}
			})
		},
		addNewExperience:function(label){
			var jsonObj={};
			if(label=='educationExperience'){
				jsonObj.college="";
				jsonObj.major="";
				jsonObj.experience="";
				jsonObj.startTime="";
				jsonObj.endTime="";
			}else if(label=='internshipExperience'){
				jsonObj.companyName="";
				jsonObj.position="";
				jsonObj.startTime="";
				jsonObj.endTime="";
				jsonObj.mainWork="";
			}else if(label=='projectExperience'){
				jsonObj.projectName="";
				jsonObj.responsibility="";
				jsonObj.startTime="";
				jsonObj.endTime="";
				jsonObj.projectDescribe="";
			}else if(label=='skillExperience'){
				jsonObj.skill="";
				jsonObj.mastery="";
			}
			this.PRInfo[label].push(jsonObj);
		},
		deleteExperienceByIndex(label,i){
			this.PRInfo[label].splice(parseInt(i),1);
		},
		scrollTo:function(id){
			$('html,body').animate({scrollTop: document.getElementById(id).offsetTop+'px'}, 600);
		}
	},
	watch:{
		'PRDetail':{
			handler:function(){
				this.PRInfo=JSON.parse(JSON.stringify(this.PRDetail));
				console.log("changed>>>>>",this.PRInfo)
			},
			deep:true
		},
		'editable':{
			handler:function(){
				if(this.editable==true){
					this.editBtnText="保存";
				}else{
					this.editBtnText="编辑";
					this.setPRData();
				}
			}
		}	
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>
