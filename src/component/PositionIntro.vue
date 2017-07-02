<template>
<div align="center" id="PositionIntro">
	<div align="left" class="PositionIntro">
		<div class="container">
		<div class="left-panel">
			<h3>职位诱惑</h3>
			<p>{{positionDetail.welfare}}</p><br>
			<h3>职位描述</h3>
			<p>{{positionDetail.introduction}}</p><br>
			<h3>任职要求</h3>
			<p>{{positionDetail.requiredSkill}}</p><br>
			<h3>工作地址</h3>
			<p>{{positionDetail.city}}</p><br>
		</div>
		<div class="right-panel" align="center">
			<h3>{{positionDetail.companyName}}</h3>
			<div>
				<img class="icon" v-bind:src="'./src/img/menu.png'"/>
				{{companyDetail.type}}
			</div>
			<div>
				<img class="icon" v-bind:src="'./src/img/tongji.png'"/>
				{{companyDetail.financing}}
			</div>
			<div>
				<img class="icon" v-bind:src="'./src/img/address.png'"/>
				{{companyDetail.province}}
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
}
.right-panel{
	float: left;
	width: 40%;
	position: relative;
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
.icon
{
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: text-top;
    margin-top: -1px;
}
</style>
<script type="text/javascript">

export default{
	name:'PositionIntro',
	props:['positionDetail'],
	data(){
		return{
			companyDetail:{}
		}
	},
	methods:{
		initCompanyData:function(){
			var jsonObj={
				'id':"",
				'companyName':this.companyName,
				'companyDetail':{}
			}
			alert(this.searchContent);
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
					console.log(result,msg,error);
				}
			})
		}
	},
	created:function(){
		this.initCompanyData();
	}
}
</script>
