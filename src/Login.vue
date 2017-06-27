<template>
<div  id="Login">
	    <div v-for="item in LoginList">
	        <div class="Login-info">
	    	    <div  align="center"> <!-- 这是左层div</div> -->
	    		    <div><!-- 这是左边最上面写offer100那个块 -->
	    		    	<div class="paslog" align="center">密码登录
	    		    	    
	                    </div>
	    		    	<div class="validate " align="center">验证码登录
	    		    	</div>
	    		    	<div class="triangle-up"> </div>
	    		    </div>
	    		    <div><!-- 这是左边输入用户名的那一个块 -->
	    		    	<input type="text" name="username" placeholder="请输入用户名" />
	    		    </div>
	    		    <div><!-- 这是左边输入密码的那一个块 -->
	    		    	<input type="password" placeholder="请输入密码" />
	    		    </div>
	    		    <div><!-- 忘记密码那个块 -->
	    		    	<span class="forget">忘记密码？</span>
	    		    </div>
	    		    <div><!-- 登录按钮 -->
	    		    	<button align='center'>登录</button>
	    		    </div>
	            </div>
	            <div><!-- 这是右层div -->
	            	<div>
	            	<span>还没有账号？</span>
	            	</div>
	            	<div>
	            	<span class="sign">立即注册</span>
	            	<img v-bind:src="''+item.imgurl" >
	            	</div>
	            </div>
	            
	    </div>
</div>
</div>
</template>
<style type="text/css" scoped>
#Login
{
	overflow: hidden;
	width: 70em;
	height: 40em;
	font-size: 14px;
	border: 1px solid #d3d3d3;
}
.Login-info
{
	height: 35em;
	width: 66em;
	font-size: 14px;
	margin: 2em;
}
.Login-info >div:nth-child(1)
{
	width: 60%;
	height: 35em;
	background-color: white;
	float: left;
}
span
{
	font-size: 24px;
	float: left;
	font-family: "Hiragino Sans GB";
	
}
.paslog
{
	width: 6em;
	height: 2em;
	float: left;
	font-size: 24px;
	font-family:'方正兰亭超细黑简体';
	text-align: center;
}
.paslog:hover
{
	color: #00b38a;
}
.validate:hover
{
	color: #00b38a;
}
.sign:hover
{
	border-bottom: 1px solid #00b38a;
}
.validate
{
	width: 6em;
	height: 2em;
	float: left;
	font-size: 24px;
	font-family:'方正兰亭超细黑简体';
	text-align: center;
}
.triangle-up { 
    position: absolute;
    width:0;
    height:0;
    border-width:0 12px 12px;
    border-style:solid;
    border-color:transparent transparent #00b38a;
    margin-left: -6px ;
    left:25%;
    bottom: 0px;
}
.Login-info >div:nth-child(1) >div:nth-child(1)
{
	width: 12em;
	font-size: 24px;
	position: relative;
	overflow: hidden;
	border-bottom: 1px solid #00b38a;
	margin-top: 1.5em;
}
.Login-info >div:nth-child(1) >div:nth-child(2)
{
	float: left;
	font-size: 20px;
	margin-top: 3em;
	display: inline-block;
	width: 100%;
	height: 2em;
}
input
{
	float: left;
	border: none;
	border-bottom:1px solid #d3d3d3;
	margin-left:4em;
	margin-top: 0.4em;
	outline: none;
	font-size: 20px;
	width: 70%;
	font-family: 'MingLiU'
}
.Login-info >div:nth-child(1) >div:nth-child(3)
{

	float: left;
	font-size: 20px;
	margin-top: 2em;
	display: inline-block;
	width: 100%;
	height: 2em;
}
.Login-info >div:nth-child(1) >div:nth-child(4)
{
	float: right;
	width: 20%;
	height: 2em;
	margin-top: 1em;
}
.forget
{
	color: #00b38a;
	font-size: 18px;
	float: right;
	margin-right: 2em;
	width: 10em;
}
.Login-info >div:nth-child(1) >div:nth-child(5)
{
	width: 100%;
	height: 11.2em;
	float: left;
}
button
{
	width: 16em;
	height: 2.5em;
	margin-top: 2em;
	border-radius: 5px;
	font-size: 24px;
	letter-spacing: 8px;
	font-family: "Hiragino Sans GB";
	background: #00b38a;
	border: none;
	color: white;
}
.Login-info >div:nth-child(2)
{
	background-color: white;
	height: 35em;
	float: left;
	display: inline-block;
	width: 40%;
}
.Login-info >div:nth-child(2) >div:nth-child(1)
{
	width: 100%;
	float: left;
	margin-top: 5em;
	margin-left: 2em;
	font-family: "Hiragino Sans GB";
	font-size: 22px;
}
.Login-info >div:nth-child(2) >div:nth-child(2)
{
	width: 100%;
	height: 5em;
	float: left;
	margin-left: 2.5em;
	font-family: "Hiragino Sans GB";
	color:#00b38a;
    font-size: 18px;
}

img
{
	height: 2.5em;
	float: left;
	margin-top: -0.5em;
}
.sign
{
	font-size: 22px;
}
</style>
<script type="text/javascript">
export default{
	name:'Login',
	data(){
		return{
			LoginList:[
			/*{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"产品经理",salary:"17-35万",hiringJob:"3",CompanyName:"北京北大公学有限公司"，duty:"教育/培训/学术/科研"dealingRate:"99%",hover:false},*/
			{imgurl:"./src/Arrow-right.png",hover:false}]
		}
	}
}
</script>