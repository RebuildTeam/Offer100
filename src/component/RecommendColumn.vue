<template>
<div align="center" id="RecommendColumn">
	<div>
	<div v-for="item in recommendList">

		<div class="RecommendColumn-info">
			<img v-bind:src="''+item.imgurl" />        
			<span>{{item.label}}</span>
		</div>

		<div class="RecommendColumn-detail">
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
#RecommendColumn/*recommend这个最大的块的属性*/
{
	/*background-color: #33bb93;*/
	background-color: orange;
	width: 100%;
	box-sizing: border-box;
	border: 1px solid orange;
	overflow-x: hidden;
	overflow-y: auto;
}
#RecommendColumn > div/*几个小机器人放在一个盒子里面，这个盒子的属性*/
{
	/*background-color: #33bb93;*/
	background-color: orange;
}
#RecommendColumn > div >div/*几个小机器人的模块属性*/
{
	/*background-color: #ccffee;*/
	background-color: #ffddbb;
	vertical-align:top;
	margin:1.6em;
	width: 9em;
	height: 13em;
	padding:0.5em;
	overflow: hidden;
}
.RecommendColumn-info{
	overflow: hidden;
	max-height: 100%;
}
.RecommendColumn-detail{
	overflow: hidden;
	max-height: 0%;
}
#RecommendColumn > div > div:hover > .RecommendColumn-info{
	overflow: hidden;
	max-height: 0;
	/*background-color: black;*/
}
#RecommendColumn > div > div:hover > .RecommendColumn-detail{
	max-height: 100%;
}
#RecommendColumn > div > div:hover/*鼠标放在机器人上面显示出的盒子的块属性*/
{
	background-color: white;
	width: 9.6em;
	height: 13.6em;
	margin: 1em;
}
#RecommendColumn img/*小机器人图片属性，一个模块框框放进去图片，padding也就是图片和框框的边距*/
{
	width: 9em;
	height: 9em;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	background-position: center;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
#RecommendColumn button/*按钮属性*/
{
	position: relative;
	height: 3em;
	width: 6em;
	border: none;
	background-color: #33bb93;
}
#RecommendColumn span/*span块内字体大小*/
{
	font-size: 10pt;
}
.RecommendColumn-detail > div/*小机器人后面的盒子的属性*/
{
	width: 9em;
	height: 7.5em;
	padding-top: 3em;
}
</style>
<script type="text/javascript">
export default{
	name:'RecommendColumn',
	props:['caller'],
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			recommendList:[
				{label:"To Manage health data more convenient",imgurl:"./src/img/droid.png",intro:"Focus on BigData field, devoted to product the health device and software",hover:false},
				{label:"Mobile internet video platform",imgurl:"./src/img/droid.png",intro:"Established on 2012, try to take the best experence for global users",hover:false},
				{label:"Make people more healthy and happy",imgurl:"./src/img/droid.png",intro:"Change the world. Make the money",hover:false},
				{label:"Help Chinese cartoonists",imgurl:"./src/img/droid.png",intro:"Located on GuangZhou",hover:false},
				{label:"Record life like movie",imgurl:"./src/img/droid.png",intro:"An application for sharing pictures and videos",hover:false}]
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>