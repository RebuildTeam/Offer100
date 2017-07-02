<template>
<div  id="PositionCard">
	    <div v-for="item in positionCardList">
	        <div class="PositionCard-info" align="left">
			    <div><!-- 这是左层div -->
			    	<div><!-- 这是最上层div，那个标题 -->
			    		<h6>{{item.positionName
}}</h6>
			    	</div>
			    	<div><!-- 这是左侧中层div -->
			    		<div ><!-- 薪水div -->
			    			<span class ="Noborder">{{item.salary}}</span>
			    			<span>&nbsp;&nbsp;{{item.city}}</span>
			    			<span>&nbsp;&nbsp;{{item.requiredEducation
}}</span>
			    			<span>&nbsp;&nbsp;{{item.requiredExperience
}}</span>
			    		</div>
			    	</div>
			    	<div class="feedback"><!-- 左侧下层div -->
			    		<span class="Noborder1">{{item.releaseTime
}}</span>
			    		<span>&nbsp;&nbsp;{{item.priority
}}</span>

			    	</div>
			    </div>
			    <div v-if="item.CompanyName!=null"><!-- 这是右层div -->
			    	<div><!-- 那个公司名称的div -->
			    		<span class="Noborder2">{{item.CompanyName
}}</span>
			    	</div>
			    	<div align="left">
			    		<span class="Noborder3" >
			    			{{item.responsibility
}}
			    		</span>
			    	</div>
			    </div>
		    </div>

		</div>
    
</div>	

</template>

<style type="text/css" scoped>
#PositionCard
{
	margin: 0 auto;
	overflow: hidden;
	width: 70em;
	height:70em;
	position: absolute;
	left: 0;
	right: 0;
}
.PositionCard-info
{
	margin: 0 auto;
	overflow: hidden;
	width: 44.875em;
	height:7.625em;
	border: 1px solid;
	border-color: #d3d3d3;
}
.PositionCard-info >div:nth-child(1)
{
	width:29.1875em;
	height:7.625em;
	display: inline-block;
}
.PositionCard-info >div:nth-child(2)
{
	width:12.5em;
	height:5.875em;
	display:inline-block;
	border-left: 1px solid;
	margin-bottom:0.875em;
	border-color: #d3d3d3;
}
.PositionCard-info >div:nth-child(1) >div:nth-child(1)
{
	
	float: left;
	width:60%;
	height: 50px;
	color: #4169E1;
	
}
h6
{
	font-size: 21px;
	float: left;

	margin-left:1.25em;
	margin-top: 0.625em;
	font-weight: 300;
}
.PositionCard-info >div:nth-child(1) >div:nth-child(2)
{
	float: left;
	clear: left;
	
}
span
{
	margin-left:1.5em;
	width: 20%;
	border-left: 1px solid;
	border-color: #d3d3d3;
}
.Noborder
{
	border: none;
	color:orange;
}
.Noborder1
{
	border: none;
	text-align: left;
	margin-left: 1.8em;
}
.Noborder2
{
	border: none;
	margin-left: 0px;
	
}
.Noborder3
{
	border: none;
	margin-left: 0px;
	text-align: left;

}
.PositionCard-info >div:nth-child(1) >div:nth-child(3)
{
	float: left;
	clear: left;
	margin-top:0.9375em;
	height:0.875em;

}
.feedback
{
	font-size: 14px;
}
.PositionCard-info >div:nth-child(2) >div:nth-child(1)
{
	width:12.5em;
	height:1.25em;
	float: left;
	margin-left:1em;
	text-align: left;
	margin-top: 0.5em;
}
.PositionCard-info >div:nth-child(2) >div:nth-child(2)
{
	width:12.5em;
	height:1.25em;
	float: left;
	margin-top:1em;
	margin-left:1em;
	text-align: left;
}
</style>
<script type="text/javascript">
export default{
	name:'PositionCard',
	props:['positionCardList'],
	data(){
		return{
			//positionCardList:[
			/*{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"产品经理",salary:"17-35万",hiringJob:"3",CompanyName:"北京北大公学有限公司"，duty:"教育/培训/学术/科研"dealingRate:"99%",hover:false},*/
			//{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",hover:false}]
		}
	}
}
</script>