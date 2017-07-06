<template>
<div  id="PostCard">
	
	<div v-for="item in PostCardList">
	 	<div id="ResumeBriefCard">
					<div v-if="caller=='applicant'" class="CompanyLogo" v-bind:style="{backgroundImage:'url(./src/img/'+item.logo+')'}">
					</div>
					<div v-if="caller=='hr'" class="CompanyLogo" v-bind:style="{backgroundImage:'url(./src/img/'+item.resume.photo+')'}">
					</div>
				<div class="ResumeBriefPanel" align="left">
		 			<div v-if="caller=='hr'">
						<router-link :to="{name:'ApplicantResume',query:{ id:idMsg , username:item.username }}">
							<p class="companyName">{{item.resume.applicantName}}</p>
						</router-link>
						<p class="companyInfoBrief">投递岗位:{{item.positionName}}
							<span v-if="item.resume.gender">,{{item.resume.gender}}</span>
							<span v-if="item.resume.gender">,{{item.resume.age}}岁</span>
							<span v-if="item.resume.education">{{item.resume.education}}</span>
						</p>
					</div>
					<div v-if="caller=='applicant'" >
						<p class="companyName">{{item.sendToCompany}}</p>
						<p class="companyInfoBrief">{{item.sendToPosition}}</p>
					</div>

					<div >
						<div class="resumeInfoItem" v-if="caller=='hr'" align="center">
							<div>{{item.resume.telephone}}</div>
							<div>联系电话</div>
						</div>
						<div class="resumeInfoItem" v-if="caller=='hr'" align="center">
							<div>{{item.resume.email}}</div>
							<div>个人邮箱</div>
						</div>
						<span v-if="item.status!='通过'&&item.status!='未通过'">
							<div class="resumeInfoItem"  v-if="caller=='hr'" align="center">
								<button class="reply-btn btn-green" v-on:click="replyPR(item.username,item.positionName,'0')">通过</button>
							</div>
							<div class="resumeInfoItem"  v-if="caller=='hr'" align="center">
								<button class="reply-btn btn-red" v-on:click="replyPR(item.username,item.positionName,'-1')">不合适</button>
							</div>
						</span>
						<div class="resumeInfoItem" v-if="caller=='applicant'" align="center">
							<div>{{item.status}}</div>
							<div>简历状态</div>
						</div>
						<div class="resumeInfoItem" v-if="caller=='applicant'" align="center">
							<div>{{'暂无'}}</div>
							<div>hr意见</div>
						</div>
					</div> 
				</div>
			</div>
			<br>
	 </div>
</div>	

</template>
</template>
<style type="text/css" scoped>
.reply-btn{
	width: 6em;
	height: 3em;
	border-radius: 10px;
	border: none;
	transition:all 0.6s;
}

.btn-green{
	background-color: inherit;
	color:orange;
}
.btn-green:hover{
	background-color: orange;
	color:white;
}
.btn-red{
	background-color: inherit;
	color: #ff6666
}
.btn-red:hover{
	background-color: #ff6666;
	color:white;
}
#ResumeBriefCard{
	height: 10em;
	width: 90%;
	box-sizing: border-box;
	overflow: hidden;
	position: relative;
	box-shadow: 1px 1px 5px 1px #dfdfdf;
}
.CompanyLogo{
	background-color: gray;
	height: 10em;
	width: 10em;
	float:left;
	background-size: 100% 100%;
}
.ResumeBriefPanel{
	position: relative;
	margin-left: 10em;
	height: 100%;
}
.ResumeBriefPanel>div:nth-child(1){
	height: 6em;
	background-color: white;
	padding: 10px;
	box-sizing: border-box;
}
.ResumeBriefPanel>div:nth-child(2){
	height: 4em;
	background-color: #ffffee;
	padding: 10px;
	box-sizing: border-box;
}
.companyName{
	font-size: 16pt;
	margin: 10px;
}
.companyInfoBrief{
	font-size: 12pt;
	margin: 10px;
}
.resumeInfoItem{
	border-left: 1px solid #dfdfdf;
	float: left;
	width: 10em;
	height: 100%;
	margin-left: 5px;
	margin-right: 5px;
	color: #666;
	box-sizing: border-box;
}
.resumeInfoItem:nth-child(1){
	border-left: none;
}
#PostCard
{
	font-size: 14px;
}
.PostCard-info
{
	margin-bottom: 0.5em;
	height: 3em;
	width: 100%;
   	background-color:#f1f4f6;
   	padding: 1em;
   	box-sizing: border-box;
}
</style>
<script type="text/javascript">
export default{
	name:'PostCard',
	props:['PostCardList','caller'],
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
		}
	},
	methods:{
		replyPR:function(usn,pst,val){
			var jsonObj={
				id:this.idMsg,
				companyName:this.nameMsg,
				username:usn,
				positionName:pst,
				reply:val,
				comment:"暂无处理意见",
			}
			$.ajax({
					url:'./src/api/replyResume',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						if(result.code==0){
							alert("反馈成功");
							window.location.reload();
						}else{
							alert("反馈失败");
						}
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	},


}
</script>