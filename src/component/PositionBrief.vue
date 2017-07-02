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
			<button class="send-pr-btn">投个简历</button>
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
	background-color: #dfdfdf;
	border:1px solid #dfdfdf;
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
</style>
<script type="text/javascript">

export default{
	name:'PositionBrief',
	props:['positionDetail'],
	data(){
		return{
			
		}
	},
}
</script>
