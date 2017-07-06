<template>
<div  id="LoginBox" v-bind:class="{'register':trianglePos==1}">
	<div class="LoginBox-info" align="center">
	    <div class="form-input"><!-- 这是左边最上面写offer100那个块 -->
	    	<div class="switchBox" align="center" v-on:click="trianglePos=0">登录
	    	</div><div class="switchBox " align="center" v-on:click="trianglePos=1" >注册</div>
	    	<div class="triangle-up" > </div>
	    </div>
	    <br>
	    <div class="form-input"><!-- 这是左边输入用户名的那一个块 -->
	    	<input type="text" class="mInput" v-model="username"  placeholder="请输入用户名"  />
	    	<br>
	    	<br>
	    </div>
	   
	    <div class="form-input" v-if="trianglePos==1">
	    	<input type="text" class="mInput" v-model="applicantName"  placeholder="请输入真实姓名"  />
	    	<br>
	    	<br>
	    </div>

	    <div  class="form-input"><!-- 这是左边输入密码的那一个块 -->
	    	<input type="password" class="mInput" v-model="password" placeholder="请输入密码" />
	    	<br>
	    <br>
	    </div>
	    
	    <div>
	    	<span class="IAmHR" align="right"><input type="checkbox" v-model="isHR">我是hr</span>
	    </div> 
	    	<br>
	    <br>
	    <div class="btn-group"><!-- 登录按钮 -->
	    	<button align='center' v-if="trianglePos==0" v-on:click="login()">登录</button>
	    	<button align='center' v-if="trianglePos==1" v-on:click="register()">注册</button>
	    </div>   
	</div>
</div>
</template>
<style type="text/css" scoped>
#LoginBox
{
	box-sizing: border-box;
	padding-top: 2em;
	padding-bottom: 2em;
	overflow: hidden;
	width: 40em;
	height: 100%;
	max-height: 30em;
	font-size: 14px;
	border: 1px solid #d3d3d3;
	/*background-color: rgba(0,0,0,0.5);*/
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	margin:auto auto;
	transition: all 0.6s;
}
#LoginBox.register{
	max-height: 32em;
}
.form-input{
	overflow: hidden;
}
.triangle-up { 
    position: absolute;
    width:0;
    height:0;
    border-width:0 12px 12px;
    border-style:solid;
    border-color:transparent transparent #66CCCC;
    margin-left: -6px ;
    left:25%;
    top:0;
    margin-top: 5em;
    transition:left 0.5s;
}
.switchBox{
	width: 50%;
	height: 3em;
	font-size: 18px;
	line-height: 3em;
	float: left;
	border-bottom: 1px solid #66CCCC;
}
input.mInput{
	width: 60%;
	height: 2em;
	font-size: 14px;
	border: none;
	border-radius: 10px;
	border:1px solid #66CCCC;
}
.IAmHR{
	color: #66CCCC;
}
.btn-group>button{
	background-color: #66CCCC;
	color: white;
	border-radius: 10px;
	border:none;
	width: 12em;
	height: 4em;
}
</style>
<script type="text/javascript">
export default{
	name:'LoginBox',
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			isHR:false,
			username:"",
			password:"",
			applicantName:"",
			trianglePos:0,
			focusUsername:false,
			focusPassword:false,
			imgurl:"./src/img/Arrow-right.png",
			hover:false
		}
		
	},
	   methods:{
    	login:function(){
    		if(this.username!=""||this.password!=""){
    			console.log(this.username,this.password)
    			var jsonObj={
    				'username':this.username,
    				'password':this.password
    			}
    			if(this.isHR==false){
    				$.ajax({
    					url:'./src/api/applicantLogin',
    					data:JSON.stringify(jsonObj),
						dataType:'json',
						type:'post',
						success:(result)=>{
							if(result.code==0){
								window.localStorage.setItem(result.id,this.username);
								this.$router.push({name:'Index',query:{id:result.id}});
							}else{
								console.log(result.message);
							}
						},
						error:(result)=>{
							console.log(result);
						}
		
    				})
    			}else{
    				$.ajax({
    					url:'./src/api/hrLogin',
    					data:JSON.stringify(jsonObj),
						dataType:'json',
						type:'post',
						success:(result)=>{
							if(result.code==0){
								window.localStorage.setItem(result.id,result.companyName);
								this.$router.push({name:'CompanyManagement',query:{id:result.id}});
							}else{
								console.log(result.message);
							}
						},
						error:(result)=>{
							console.log(result);
						}
		
    				})
    			}
    		}else{
    			alert("请输入用户名密码");
    		}
    	},
    	register:function(){
    		if(this.username!=""||this.applicantName||this.password!=""){
    			console.log(this.username,this.password)
    			var jsonObj={
    				'username':this.username,
    				'password':this.password,
    				'applicantName':this.applicantName
    			}
    			$.ajax({
    				url:'./src/api/applicantRegister',
    				data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						if(result.code==0){
							this.id=result.id;
							window.localStorage.setItem(result.id,this.username);
							this.$router.push({name:'Index',query:{id:result.id}});
						}else{
							console.log(result);
						}
					},
					error:(result)=>{
						console.log(result);
					}
    			})
    		}else{
    			alert("请输入用户名密码");
    		}
    	}
    },
	watch:{
            trianglePos:function (){
                if (this.trianglePos == 0){
                    document.getElementsByClassName('triangle-up')[0].style.left='25%';
                    document.getElementsByClassName('paslog')[0].style.color='#00b38a';
                    document.getElementsByClassName('sign')[0].style.color='black';
                    document.getElementsByClassName('forget')[0].style.display='block';
                }
                else{
                    document.getElementsByClassName('triangle-up')[0].style.left='75%';
                     document.getElementsByClassName('sign')[0].style.color='#00b38a';
                     document.getElementsByClassName('paslog')[0].style.color='black';
                     document.getElementsByClassName('forget')[0].style.display='none';
                }
            },   

    }
                
 }
</script>
