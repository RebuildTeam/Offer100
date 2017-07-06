<template>
<div align="center" id="RecommendRow">
	<div>
	<div v-for="item in recommendList">

		<div class="RecommendRow-info">
			<img v-bind:src="''+item.imgurl" />        
			<span>{{item.label}}</span>
		</div>

		<div class="RecommendRow-detail">
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
#RecommendRow/*recommend这个最大的块的属性*/
{
	background-color: #ccffcc;
	width: 100%;
	height: 20em;
	max-width: 300em;
	overflow-x: auto;
	overflow-y: hidden;
}
#RecommendRow > div/*几个小机器人放在一个盒子里面，这个盒子的属性*/
{
	background-color: #ccffcc;
	min-width: 1080px;
}
#RecommendRow > div >div/*几个小机器人的模块属性*/
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
.RecommendRow-info{
	overflow: hidden;
	max-height: 100%;
}
.RecommendRow-detail{
	overflow: hidden;
	max-height: 0%;
}
#RecommendRow > div > div:hover > .RecommendRow-info{
	overflow: hidden;
	max-height: 0;
	/*background-color: black;*/
}
#RecommendRow > div > div:hover > .RecommendRow-detail{
	max-height: 100%;
}
#RecommendRow > div > div:hover/*鼠标放在机器人上面显示出的盒子的块属性*/
{
	background-color: white;
	width: 9.6em;
	height: 13.6em;
	margin: 1em;
}
#RecommendRow img/*小机器人图片属性，一个模块框框放进去图片，padding也就是图片和框框的边距*/
{
	width: 9em;
	height: 9em;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
	background-position: center;
	background-size: 100% 100%;
	background-repeat: no-repeat;
}
#RecommendRow button/*按钮属性*/
{
	position: relative;
	height: 3em;
	width: 6em;
	border: none;
	background-color: #33bb93;
}
#RecommendRow span/*span块内字体大小*/
{
	font-size: 10pt;
}
.RecommendRow-detail > div/*小机器人后面的盒子的属性*/
{
	width: 9em;
	height: 7.5em;
	padding-top: 3em;
}
</style>
<script type="text/javascript">
export default{
	name:'RecommendRow',
	props:['caller'],
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			recommendList:[
				{label:"书链（“教育图书+互联网”行业解决方案，bookln.cn）",imgurl:"./src/img/云梯科技.png",intro:"正式创建于2016年2月，为杭州云梯科技有限公司旗下产品",hover:false,companyName:"云梯科技"},
				{label:"国内首款运动健身减肥App",imgurl:"./src/img/咕咚.png",intro:"全国首款GPS运动社交手机软件，追踪运动路线，邂逅运动好友，发现运动资讯与趣闻",hover:false,companyName:"咕咚"},
				{label:"网络媒体平台，拥有海盗电台、摇滚客、头文字 B等节目",imgurl:"./src/img/果酱音乐.png",intro:"果酱音乐是中国领先的音乐新媒体,为您提供最新音乐资讯、演出视频、摇滚、民谣、流行音乐、电音、HipHop等资讯",hover:false,companyName:"果酱音乐"},
				{label:"致力于深耕海外目的地",imgurl:"./src/img/奇遇旅行.png",intro:"现已覆盖泰国、菲律宾、马来西亚、印度尼西亚、新加坡等东南亚国家的旅游胜地",hover:false,companyName:"奇遇旅行"},
				{label:"专业优质的国际租车网站",imgurl:"./src/img/惠租车.png",intro:"为适应国人出境自驾需求而打造的全球租车垂直搜索比价网站",hover:false,companyName:"惠租车"}]
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>