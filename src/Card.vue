<template>
<div  id="Card">
    
	    <div v-for="item in cardList">
	        <div class="Card-info">
			    <div style="overflow: hidden;">
                    <!-- 这是上层div -->
                    <div >
                   	<!-- 这是图片div -->
                   	   <img v-bind:src="''+item.imgurl" >

                    </div>
                    <div ><!-- 这图片右边的div -->
                        <div><!-- 这是公司标题div -->
                        	<h3>{{item.title}}</h3>

                        </div>
                        <div><!-- 这是三行字div -->
                        	<p>{{item.evaluate}}&nbsp;&nbsp;条面试评价</p>
                        	<p>{{item.hiringJob}}&nbsp;&nbsp;个在招职位</p>
                        	<p>{{item.dealingRate}}&nbsp;&nbsp;简历处理率</p>
                        </div>
                    </div>
			    </div>
			    <div><!-- 这是下层div -->
			    	    <div><!-- 下层div的介绍 -->
			    	    <br>
			    	    	<p class="intro">{{item.label}}</p>
			    	    </div>
			    	    <div class="btn-group"><!-- 三个按钮那一层 -->
			    	    	<button>
			    	    		<img v-bind:src="'./src/menu.png'">&nbsp;移动互联网
			    	    	</button>
			    	    	<button>
			    	    		<img v-bind:src="'./src/tongji.png'">&nbsp;成长型(b)轮
			    	    	</button>
			    	    	<button>
			    	    		<img v-bind:src="'./src/address.png'">&nbsp;深圳
			    	    	</button>
			    	    </div>
			    </div>
		    </div>

		</div>
    
</div>	

</template>

<style type="text/css" scoped>
*{
	transition: 0.5s all;
}
#Card
{
	margin: 0 auto ;
	position: absolute;
	left: 0;
	right: 0;
	overflow: hidden;
	width: 70em;
	font-size: 14px;
}
.Card-info
{
	width: 34em;
	height: 21em;
	font-size: 14px;
	/*border:1px solid rgba(0,0,0,0);*/
	float: left;
	margin: 0.5em;
	box-shadow: 1px 1px 2px 1px #efefef;
	box-sizing: border-box;
}
.Card-info:hover
{
	/*border: 1px solid #33bb93;*/
	box-shadow: 1px 1px 15px 1px #33bb93;
}
.Card-info>div:nth-child(1)
{
	height: 60%;
	
}
.Card-info>div:nth-child(2)
{
	height: 40%;
	
}
.Card-info>div:nth-child(1)>div:nth-child(1)
{
	width: 12.6em;
	
	float: left;
}
.Card-info>div:nth-child(1)>div:nth-child(2)
{
	
	
	margin-left: 12.6em;
	text-align: left;
}
h3{
	font-size: 24px;
}
.Card-info>div:nth-child(1)>div:nth-child(1)>img
{
	margin: 1.5em;
	margin-bottom: 0;
	width: 9.6em;
	height: 9.6em;
}
.Card-info>div:nth-child(2)>div:nth-child(1)
{
    
    margin:1.5em;
    margin-top:0;
}
p{
	font-size: 16px;
	font-weight: bold;
	line-height: 0.7;
}
p.intro
{
	font-size: 14px;
	font-weight: lighter;
	line-height: 1.2;
	text-align: left;
}
.btn-group{
	height: 100%;
	overflow:hidden;
}
button
{
	height: 100%;
	width: 33.3%;
	float: left;
	height: 3em;
	border:0;
	background-color: #fffffa;
}
button>img
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
	name:'Card',
	data(){
		return{
			cardList:[
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
			{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false}]
		}
	}
}
</script>