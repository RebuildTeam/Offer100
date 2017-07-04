<template>
<nav align="right" id="Navbar">
	<span v-for="item in navList"><router-link :to="{name:item.url,params:{id:id,username:username}}">{{item.label}}</router-link></span>
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
	name:'Navbar',
	props:['id','username'],
	data(){
		return{
			navList:[
				{label:"消息",url:"#"},
				{label:"我的简历",url:"PersonalResume"},
				{label:"投递箱",url:"#"}]
		}
	}
}
</script>
