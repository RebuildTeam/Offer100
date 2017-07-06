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
			<router-link :to="{name:'Company',query:{id:idMsg,companyName:item.companyName}}"><button>Enter</button></router-link>
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
	border-radius: 10px;
	background-color: orange;
	width: 100%;
	box-sizing: border-box;
	/*border: 1px solid orange;*/
	box-shadow: 1px 1px 5px 1px #dfdfdf;
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
				{label:"欧德蒙",imgurl:"./src/img/1.png",intro:"致力于打造最先进的智慧健康医疗设备和人工智能软件",hover:false,companyName:"欧德蒙"},
				{label:"洺信科技",imgurl:"./src/img/4.png",intro:"让二次元音乐爱好者通过音乐互相交流，分享快乐",hover:false,companyName:"洺信科技"},
				{label:"斗象科技",imgurl:"./src/img/6.png",intro:"最具性价比的互联网安全专家服务",hover:false,companyName:"斗象科技"},
				{label:"梅卡曼德",imgurl:"./src/img/9.png",intro:"将智能赋予工业机器人",hover:false,companyName:"梅卡曼德"},
				{label:"数族融合",imgurl:"./src/img/10.png",intro:"让天下没有复杂难做的互联网生意",hover:false,companyName:"数族融合"}]
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>
