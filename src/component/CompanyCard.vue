<template>
<div  id="CompanyCard">
	    <div  v-for="item in CompanyCardList">
		<router-link :to="{name:'Company',query:{companyName:item.companyName}}">

	        <div class="CompanyCard-info">
			    <div style="overflow: hidden;">
                    <!-- 这是上层div -->
                    <div >
                   	<!-- 这是图片div -->
                   	   <img v-bind:src="'./src/img/'+item.logo" >

                    </div>
                    <div ><!-- 这图片右边的div -->
                        <div><!-- 这是公司标题div -->
                        	<h3>{{item.companyName}}</h3>

                        </div>
                        <div><!-- 这是三行字div -->
                        	<p>{{item.evaluateNum}}&nbsp;&nbsp;条面试评价</p>
                        	<p>{{item.positionNum}}&nbsp;&nbsp;个在招职位</p>
                        	<p>{{item.dealingRate}}&nbsp;&nbsp;简历处理率</p>
                        </div>
                    </div>
			    </div>
			    <div><!-- 这是下层div -->
			    	    <div><!-- 下层div的介绍 -->

			    	    	<p class="intro">{{item.companyInfoBrief}}</p>
			    	    </div>
			    	    <div class="btn-group"><!-- 三个按钮那一层 -->
			    	    	<button>
			    	    		<img v-bind:src="'./src/img/menu.png'">&nbsp;{{item.type}}
			    	    	</button>
			    	    	<button>
			    	    		<img v-bind:src="'./src/img/tongji.png'">&nbsp;{{item.financing}}
			    	    	</button>
			    	    	<button>
			    	    		<img v-bind:src="'./src/img/address.png'">&nbsp;{{item.province}}
			    	    	</button>
			    	    </div>
			    </div>
		    </div>
		</router-link></div>
    
</div>	

</template>

<style type="text/css" scoped>
#CompanyCard
{
	color: #666;
	margin: 0 auto ;
	position: absolute;
	left: 0;
	right: 0;
	overflow: hidden;
	width: 70em;
	font-size: 14px;
}
.CompanyCard-info
{
	width: 34em;
	height: 21em;
	font-size: 14px;
	border:1px solid #eeeeee;
	float: left;
	margin: 0.5em;
	box-sizing: border-box;
}
.CompanyCard-info:hover
{
	border: 1px solid #33bb93;
}
.CompanyCard-info>div:nth-child(1)
{
	height: 60%;
	position: relative;
	
}
.CompanyCard-info>div:nth-child(2)
{
	height: 40%;
	position: relative;
	
}
.CompanyCard-info>div:nth-child(1)>div:nth-child(1)
{
	width: 12.6em;
	
	float: left;
}
.CompanyCard-info>div:nth-child(1)>div:nth-child(2)
{
	margin-left: 12.6em;
	text-align: left;
}
h3{
	font-size: 24px;
}
.CompanyCard-info>div:nth-child(1)>div:nth-child(1)>img
{
	margin: 1.5em;
	width: 9.6em;
	height: 9.6em;
}
.CompanyCard-info>div:nth-child(2)>div:nth-child(1)
{
    
    margin-left:1.5em;
	margin-right:1.5em;
}
p{
	font-size: 16px;
	font-weight: bold;
	line-height: 0.7;
}
p.intro{

	font-size: 14px;
	font-weight: lighter;
	line-height: 1.2;
	height:3.5em;
	text-align: left;
}
button
{
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
#CompanyCard >div >div >div >div >div >p:hover
{
 color: green;
}
.btn-group{
	position: absolute;
	width: 100%;
	bottom: 0;
	left: 0;
}
</style>
<script type="text/javascript">
export default{
	name:'CompanyCard',
	props:['CompanyCardList'],
	data(){
		return{
			
			
		}
	}
}
</script>
