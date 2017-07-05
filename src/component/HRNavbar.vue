<template>
<nav align="right" id="HRNavbar">
	<span v-for="item in navList"><router-link :to="{name:item.url,params:{id:id,username:username,companyName:companyName}}">{{item.label}}</router-link></span>
</nav>
</template>

<style type="text/css" scoped>
nav{
	width: 100%;
	background-color: #333;
	height: 1.8em;
	line-height: 1.8em;
	color:white;
}
nav > span{
	color:#aaa;
	font-size: 10pt;
	padding-right: 0.5em;
	padding-left: 0.5em;
	border-right: 1px solid #aaa;
}
nav > span:last-child{
	border: none;
}
a{
	color: #aaa;
	text-decoration: none;
}
</style>
<script type="text/javascript">
export default{
	name:'HRNavbar',
	props:['id','username','companyName'],
	data(){
		return{
			navList:[
				{label:"公司主页",url:"CompanyManagement"},
				{label:"信息管理",url:"EditCompany"},
				{label:"简历箱",url:"ResumeBox"}]
		}
	}
}
</script>
