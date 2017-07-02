<template>
<div  id="PostCard">
	    
	        <div><!-- 这是上面那个div，就是投递成功那个 -->
	            <div>
	        	    <span>全部</span>
	        	</div>
	        	<div>
	        	    <span>投递成功</span>
	        	</div>
	        	<div>
	        		<span>被查看</span>
	        	</div>
	        	<div>
	        		<span>通知面试</span>
	        	</div>
	        	<div>
	        		<span>不合适</span>
	        	</div>
	        </div>
	        <div v-for="item in PostCardList"><!-- 这是下面那个div，存放所有的简历投递情况的块 -->
	        	<div class="PostCard-info"><!-- 这是单个需要设置扩展的基准div -->
	        		<div>
	        			<span>{{item.title}}</span>
	        		</div>
	        		<div>
	        			<span>{{item.CompanyName}}-{{item.address}}</span>
	        		</div>
	        		<div>
	        			<span>使用简历：{{item.resumeName}}</span>
	        		</div>
	        		<div>
	        			<span>{{item.PostStatus}}</span>
	        		</div>
	        	</div>
	        </div>
		
    
</div>	

</template>
<style type="text/css" scoped>
#PostCard
{
	width: 50em;
	height: 50em;

	font-size: 14px;
}
#PostCard >div:nth-child(1)
{
	width: 100%;
	height: 4%;
	background-color: #f1f4f6;
	font-size: 18px;
}
#PostCard >div:nth-child(1) >div:nth-child(1)
{
     margin-left: 3em;
     width: 3em;
     text-align: center;
}
#PostCard >div:nth-child(1) >div:hover
{
	background-color: #02a0e9;
}
#PostCard >div:nth-child(1) >div:nth-child(2)
{
     width: 5em;
     text-align: center;
}
#PostCard >div:nth-child(1) >div:nth-child(3)
{
     width: 4em;
     text-align: center;
}
#PostCard >div:nth-child(1) >div:nth-child(4)
{
     width: 5em;
     text-align: center;
}
#PostCard >div:nth-child(1) >div:nth-child(5)
{
     width: 4em;
     text-align: center;
}
#PostCard >div:nth-child(1) >div
{
	float: left;
	margin-left: 1em;
	margin-top: 0.5em;
	font-size: 14px;
    border-radius: 5px;
    font-family:'方正兰亭超细黑简体'; 
}
.PostCard-info
{
	margin-top: 0.5em;

	height: 5em;
	width: 100%;
   background-color:#f1f4f6;

}
.PostCard-info >div
{
}
.PostCard-info >div:nth-child(1)
{
	font-size: 20px;
	text-align: left;
	padding-left: 2.5em;
	padding-top: 0.2em;
	font-family:'方正兰亭超细黑简体';

}
.PostCard-info >div:nth-child(2)
{
	text-align: left;
	padding-left: 4em;
	font-size: 11px;
}
.PostCard-info >div:nth-child(3)
{
	text-align: left;
	padding-left: 4em;
	font-size: 11px;
    padding-bottom: 0.5em;
}
.PostCard-info >div:nth-child(4)
{
	float: right;
	margin-top: -3em;
	font-size: 14px;
	margin-right: 2em;
	color: #02a0e9;
}
</style>
<script type="text/javascript">
export default{
	name:'PostCard',
	data(){
		return{
			PostCardList:[
			/*{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"产品经理",salary:"17-35万",hiringJob:"3",CompanyName:"北京北大公学有限公司"，duty:"教育/培训/学术/科研"dealingRate:"99%",hover:false},*/
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false},
			{title:"产品经理",salary:"17-35万",CompanyName:"北京北大公学有限公司",duty:"教育/培训/学术/科研",address:"北京",resumeName:"前端开发实习生",PostStatus:"被查看",hover:false}]
		}
	}

}
</script>