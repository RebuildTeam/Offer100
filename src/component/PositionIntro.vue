<template>
<div align="center" id="PositionIntro">
	<div align="left" class="PositionIntro">
		<div class="container">
		<div class="left-panel">
			<h3>职位诱惑</h3>
			<p>{{positionDetail.welfare}}</p><br>
			<h3>职位描述</h3>
			<p>{{positionDetail.responsibility}}</p><br>
			<h3>任职要求</h3>
			<p>{{positionDetail.requiredSkill}}</p><br>
			<h3>工作地址</h3>
			<p>{{positionDetail.city}}</p><br>
		</div>
		<div class="right-panel" align="left">
			<div class="panel-1">
				<router-link :to="{ name: 'Company', query: { companyName: positionDetail.companyName}}"><h3>	{{positionDetail.companyName}}</h3></router-link>
				<div class="companyInfoItem">
					<img class="icon" v-bind:src="'./src/img/menu.png'"/>
					{{companyDetail.type}}
				</div>
				<div class="companyInfoItem">
					<img class="icon" v-bind:src="'./src/img/tongji.png'"/>
					{{companyDetail.financing}}
				</div>
				<div class="companyInfoItem">
					<img class="icon" v-bind:src="'./src/img/address.png'"/>
					{{companyDetail.province}}
				</div>
			</div>
			<div class="panel-2">
				<h3>公司标签</h3>
				<button class="companyTag" v-for="tag in companyDetail.companyTag.split(',')">{{tag}}</button>
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
	name:'PositionIntro',
	props:['positionDetail'],
	data(){
		return{
			idMsg:window.localStorage.getItem("id"),
			usernameMsg:window.localStorage.getItem("username"),
			companyDetail:{},
			companyName:""
		}
	},
	methods:{
		initCompanyData:function(){
			var jsonObj={
				'id':this.idMsg,
				'companyName':this.companyName,
				'companyDetail':{}
			}
			console.log(this.companyName);
			$.ajax({
				url:'./src/api/getCompanyDetail',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					this.companyDetail=result.data;
					console.log(JSON.stringify(this.companyDetail));
				},
				error:function(result,msg,error){
					console.log("error>>>>>>",result,msg,error);
				}
			})
		}
	},
	created:function(){
		this.companyName=this.$router.currentRoute.query.companyName;
		this.initCompanyData();
	}
}
</script>
