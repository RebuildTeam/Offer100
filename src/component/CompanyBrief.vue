<template>
<div align="center" id="CompanyBrief">
	<div align="left" class="CompanyBrief">
		<div class="container">
			<br>
			<br>
			<br>
			<div id="CompanyBriefCard">
				<div class="CompanyLogo" v-bind:style="{backgroundImage:'url(./src/img/'+companyDetail.logo+')'}">
				</div><div class="CompanyBriefPanel">
					<div>
						<p class="companyName">{{companyDetail.companyName}}</p>
						<p class="companyInfoBrief">{{companyDetail.companyInfoBrief}}</p>
					</div>
					<div align="center">
						<div class="companyInfoItem">
							<div>{{companyDetail.position.length}}个</div>
							<div>招聘职位</div>
						</div>
						<div class="companyInfoItem">
							<div>{{companyDetail.dealingRate}}</div>
							<div>简历处理率</div>
						</div>
						<div class="companyInfoItem">
							<div>{{companyDetail.evaluateNum}}</div>
							<div>面试评价</div>
						</div>
						<div class="companyInfoItem">
							<div>{{companyDetail.size}}</div>
							<div>公司规模</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
		</div>

	</div>
</div>
</template>


<style type="text/css" scoped>
.container{
	padding:0;
}
.CompanyBrief{
	font-size: 10pt;
	width: 100%;
	box-sizing: border-box;
	background-color: #eeeeee;
	box-shadow: inset 1px 1px 5px 1px #dfdfdf;
	overflow: hidden;
}
#CompanyBriefCard{
	height: 12em;
	width: 100%;
	box-sizing: border-box;
	overflow: hidden;
	position: relative;
	box-shadow: 1px 1px 5px 1px #dfdfdf;
}
.CompanyLogo{
	background-color: gray;
	height: 12em;
	width: 12em;
	float:left;
	background-size: 100% 100%;
}
.CompanyBriefPanel{
	position: relative;
	margin-left: 12em;
	height: 100%;
}
.CompanyBriefPanel>div:nth-child(1){
	height: 7em;
	background-color: white;
	padding: 10px;
	box-sizing: border-box;
}
.CompanyBriefPanel>div:nth-child(2){
	height: 5em;
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
.companyInfoItem{
	border-left: 1px solid #dfdfdf;
	float: left;
	width: 8em;
	height: 100%;
	margin-right: 10px;
	color: #666;
}
.companyInfoItem:nth-child(1){
	border-left: none;
}
</style>
<script type="text/javascript">

export default{
	name:'CompanyBrief',
	props:['companyDetail'],
	data(){
		return{
			
		}
	},
}
</script>
