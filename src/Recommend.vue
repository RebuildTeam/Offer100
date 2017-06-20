<template>
<div align="center" id="Recommend">
	<div>
	<div v-for="item in recommendList">

		<div class="Recommend-info">
			<img v-bind:src="''+item.imgurl" />        
			<span>{{item.label}}</span>
		</div>

		<div class="Recommend-detail">
			<div>
			<span>{{item.intro}}</span>
			</div>
			<button>Enter</button>
		</div>

	</div>
	</div>
</div>
</template>

<style type="text/css" scoped>
{
	transition: all 0.5s;/*0.5s的时间内变化*/
}
h1    /*标题属性，暂且就设置了一个颜色，大小为h1*/
{
	color:white;
}
*{
		transition: 0.5s all;
}
#Recommend/*recommend这个最大的块的属性*/
{
	background-color: #33bb93;
	width: 100%;
	height: 20em;
	max-width: 300em;
	overflow-x: auto;
	overflow-y: hidden;
}
#Recommend > div/*几个小机器人放在一个盒子里面，这个盒子的属性*/
{
	background-color: #33bb93;
	min-width: 1080px;
}
#Recommend > div >div/*几个小机器人的模块属性*/
{
	background-color: #ccffee;
	display: inline-block;
	vertical-align:top;
	margin:1.6em;
	width: 9em;
	height: 13em;
	padding:0.5em;
	overflow: hidden;
}
.Recommend-info{
	overflow: hidden;
	max-height: 100%;
}
.Recommend-detail{
	overflow: hidden;
	max-height: 0%;
}
#Recommend > div > div:hover > .Recommend-info{
	overflow: hidden;
	max-height: 0;
	/*background-color: black;*/
}
#Recommend > div > div:hover > .Recommend-detail{
	max-height: 100%;
}
#Recommend > div > div:hover/*鼠标放在机器人上面显示出的盒子的块属性*/
{
	background-color: white;
	width: 9.6em;
	height: 13.6em;
	margin: 1em;
}
#Recommend img/*小机器人图片属性，一个模块框框放进去图片，padding也就是图片和框框的边距*/
{
	width: 9em;
	height: 9em;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	background-position: center;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
#Recommend button/*按钮属性*/
{
	position: relative;
	height: 3em;
	width: 6em;
	border: none;
	background-color: #33bb93;
}
#Recommend span/*span块内字体大小*/
{
	font-size: 10pt;
}
.Recommend-detail > div/*小机器人后面的盒子的属性*/
{
	width: 9em;
	height: 7.5em;
	padding-top: 3em;
}
</style>
<script type="text/javascript">
export default{
	name:'Recommend',
	data(){
		return{
			recommendList:[
				{label:"To Manage health data more convenient",imgurl:"./src/droid.png",intro:"Focus on BigData field, devoted to product the health device and software",hover:false},
				{label:"Mobile internet video platform",imgurl:"./src/droid.png",intro:"Established on 2012, try to take the best experence for global users",hover:false},
				{label:"Make people more healthy and happy",imgurl:"./src/droid.png",intro:"Change the world. Make the money",hover:false},
				{label:"Help Chinese cartoonists",imgurl:"./src/droid.png",intro:"Located on GuangZhou",hover:false},
				{label:"Record life like movie",imgurl:"./src/droid.png",intro:"An application for sharing pictures and videos",hover:false}]
		}
	}
}
</script>