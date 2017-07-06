<template>
<div  align="center" id="EditCompanyPanel">
	<div class=".container" align="center">
			<input placeholder="公司名称" v-model="companyInfo.companyName" >
			<p v-if="companyInfo.companyName==''||companyInfo.companyName==null">请输入有效的公司名称</p>
			
			<input placeholder="一句话简介" v-model="companyInfo.companyInfoBrief" maxlength="30"/>
			<p v-if="companyInfo.companyInfoBrief==''||companyInfo.companyInfoBrief==null">请输入有效的一句话简介</p>
			
			<textarea placeholder="公司详细介绍"  v-model="companyInfo.companyInfoDetail" rows="10"></textarea>

			<input placeholder="公司标签,用半角逗号分隔,如:福利好,假期多,工资高" v-model="companyInfo.companyTag"/>
			<p v-if="companyInfo.companyTag==''||companyInfo.companyTag==null">请输入有效的标签</p>
			
			<input placeholder="公司分类" v-model="companyInfo.type" maxlength="10"/>
			<p v-if="companyInfo.type==''||companyInfo.type==null">请输入有效的公司分类</p>
			
			<select placeholder="融资阶段" v-model="companyInfo.financing">
					<option >未融资</option>
					<option >天使轮</option>
					<option >A轮</option>
					<option >B轮</option>
					<option >C轮</option>
					<option >D轮及以上</option>
					<option >不需要融资</option>
					<option >上市公司</option>
			</select>
			<p v-if="companyInfo.financing==''||companyInfo.financing==null">请输入有效的融资阶段</p>
			
			<input placeholder="所在省份" v-model="companyInfo.province" maxlength="20" />
			<p v-if="companyInfo.province==''||companyInfo.province==null">请输入有效的省份</p>
			
			<input placeholder="所在城市" v-model="companyInfo.city" maxlength="20" />
			<p v-if="companyInfo.city==''||companyInfo.type==city">请输入有效的城市</p>
			
			<input placeholder="具体地址" v-model="companyInfo.location" maxlength="100"/>
			<p v-if="companyInfo.location==''||companyInfo.location==null">请输入有效的地址</p>
			
			<input placeholder="精度" v-model="companyInfo.long" maxlength="10" />
			<input placeholder="纬度" v-model="companyInfo.lat" maxlength="10" />
			<input placeholder="公司规模" v-model="companyInfo.size" maxlength="20" />
			<p v-if="companyInfo.size==''||companyInfo.size==null">请输入有效的规模</p>
			

		<!-- 	<vue-core-image-upload
  				:class="['btn', 'btn-primary']"
  				:crop="false"
  				@imageuploaded="imageuploaded"
  				:data="{a:123}"
  				:max-file-size="5242880"
  				url="/src/api/uploadPhoto" >上传图片
			</vue-core-image-upload> -->

			<input placeholder="公司主页" v-model="companyInfo.website" maxlength="20" />
			<div align="center">
				<button 
					class="btn-green submit-btn"
					v-if="companyInfo.companyName&&companyInfo.companyInfoBrief&&companyInfo.companyTag&&companyInfo.type&&companyInfo.financing&&companyInfo.province&&companyInfo.city&&companyInfo.location&&companyInfo.size" v-on:click="setCompanyData()">提交</button>
			</div>
	</div>
</div>
</template>


<style type="text/css" scoped>
.container{
	background-color: #f6f6f6;
}
select{
	width: 80%;
	max-width:800px;
	height: 2em;
}
input{
	border-radius: 10px;
	height: 2em;
	width: 80%;
	max-width: 800px;
	border: none;
	box-shadow:inset 1px 1px 5px 1px #dfdfdf;
	padding: 10px;
	box-sizing: border-box;
	margin-bottom: 10px;
}
textarea{
	border-radius: 10px;
	width: 80%;
	max-width: 800px;
	border: none;
	box-shadow:inset 1px 1px 5px 1px #dfdfdf;
	resize: none;
	padding:10px;
	box-sizing: border-box;
	margin-bottom: 10px;
}
.submit-btn{
	width: 8em;
	height: 3em;
	border: none;
	border-radius: 10px;
}
.btn-green{
	background-color: inherit;
	color: #00b38a;
	transition:all 0.6s;
}
.btn-green:hover{
	background-color: #00b38a;
	color: white;
}
</style>
<script type="text/javascript">
import VueCoreImageUpload  from 'vue-core-image-upload';


export default{
	name:'EditPositionPanel',
	props:['caller'],
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			companyInfo:{},
			photoSrc: '/src/img/100001.png',
		}
	},
	components: {
    	'vue-core-image-upload': VueCoreImageUpload
  	},
	methods:{
		imageuploaded(res) {
      		if (res.errcode == 0) {
        		this.photoSrc = res.src;
      		}
      	},
		setCompanyData:function(){
			var d=new Date();
			var jsonObj={
				'id':this.idMsg,
				'companyName':this.nameMsg,
				'data':this.companyInfo,
			}
			console.log(JSON.stringify(jsonObj));
			$.ajax({
				url:'./src/api/setCompanyInfo',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					if(result.code==0){
						alert("修改成功");
						this.$router.push({name:'CompanyManagement',query:{id:idMsg}});
					}else{
						alert("修改失败，因为"+result.message);
					}
				},
				error:function(result,msg,error){
					console.log("error>>>>>>",result,msg,error);
				}
			})
		},
		initCompanyData:function(){
			var jsonObj={
				'id':this.idMsg,
				'companyName':this.nameMsg,
			};
			$.ajax({
				url:'./src/api/getCompanyDetail',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					console.log(result);
					this.companyInfo=result.data;
				},
				error:function(result,msg,error){
					console.log(result,msg,error);
				}
			})
		}
	},
	mounted:function(){
		this.initCompanyData();
	},
	created:function(){
			this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
	
}
</script>
