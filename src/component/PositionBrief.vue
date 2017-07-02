<template>
<div align="center" id="PositionBrief">
	<div align="left" class="PositionBrief">
		<div class="container">
		<div class="left-panel">
			<p>{{positionBrief.companyName}}</p>
			<h3>{{positionBrief.positionName}}</h3>
			<span>{{positionBrief.salary}}</span>
			<span>{{positionBrief.city}}</span>
			<span>{{positionBrief.requiredExperience}}</span>
			<span>{{positionBrief.requiredEducation}}</span>
			<span>{{positionBrief.positionType}}</span>
			<p>{{positionBrief.releaseTime}}</p>
		</div>
		<div class="right-panel" align="center">
			<br>
			<br>
			<button class="send-pr-btn">投个简历</button>
		</div>
		</div>

	</div>
</div>
</template>


<style type="text/css" scoped>
.PositionBrief{
	font-size: 10pt;
	width: 100%;
	background-color: #dfdfdf;
	border:1px solid #dfdfdf;
	padding: 0.5em;
	overflow: hidden;
}
.left-panel{
	float: left;
	width: 60%;
}
.right-panel{
	float: left;
	width: 40%;
	position: relative;
}
.send-pr-btn{
	width: 8em;
	height: 2.5em;
	font-size: 1.5em;
	border:none;
	border-radius: 5px;
	background-color: #00b38a;
	color: white;
}
</style>
<script type="text/javascript">
import CompanyCard from './CompanyCard.vue';

export default{
	name:'CompanyFilter',
	components:{
		CompanyCard
	},
	data(){
		return{
			chosenItem:{
				"Location":"China",
				"Phase":"No Limitation",
				"Field":"No Limitation",
				"Sort Order":"Default"
			},
			CompanyCardListMsg:[],
			filterList:[
				{
					label:"Location",
					conditions:[
					{
						label:"China"
					},{
						label:"Beijing"
					},{
						label:"Shanghai"
					},{
						label:"Shenzhen"
					},{
						label:"Guangzhou"
					},{
						label:"Hangzhou"
					},{
						label:"Chengdu"
					},{
						label:"Nanjing"
					},{
						label:"Wuhan"
					},{
						label:"Xiamen"
					},{
						label:"Suzhou"
					},{
						label:"Tianjing"
					}]
				},
				{
					label:"Phase",
					conditions:[
					{
						label:"No Limitation"
					},{
						label:"No Financing "
					},{
						label:"AI Round"
					},{
						label:"A Round"
					},{
						label:"B Round"
					},{
						label:"C Round"
					},{
						label:"D+ Round"
					},{
						label:"Quoted"
					},{
						label:"No Need To Financing"
					}]
				},
				{
					label:"Field",
					conditions:[{
						label:"No Limitation"
					},{
						label:"Mobile Internet"
					},{
						label:"E-Business"
					},{
						label:"Finance"
					},{
						label:"Business Service"
					},{
						label:"Education"
					},{
						label:"Entertainment"
					},{
						label:"Game"
					},{
						label:"O2O"
					},{
						label:"Hardware"	
					}]
				},
				{
					label:"Sort Order",
					conditions:[
					{
						label:"Default"
					},{
						label:"Jobs Number"
					},{
						label:"Comments Number"
					},{
						label:"PR dealing Rate"
					}]
				}]
		}
	},
	watch:{
		'chosenItem':{
			handler:function(){
				// this.CompanyCardListMsg=
				// [{label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
				// {label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
				// {label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
				// {label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
				// {label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false},
				// {label:"全球同步协作，让成功更近一步，企业云构筑高远广阔的发展平台， 期待与您携手，和梦想一起腾飞！",imgurl:"./src/img/yanmai.png",intro:"Focus on BigData field, devoted to product the health device and software",title:"企业云科技",evaluate:"64",hiringJob:"3",dealingRate:"99%",hover:false}];
				
				var jsonObj={
					keyword:"",
				}
				$.ajax({
					url:'./src/api/getCompanyBrief',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.CompanyCardListMsg=result.data;
						console.log(JSON.stringify(this.CompanyCardListMsg));
					},
					error:function(){

					}
				})
				//this.CompanyCardListMsg=[{"companyName":"欧德蒙","companyInfoBrief":"致力于打造最先进的智慧健康医疗设备和人工智能软件，让生命健康数据的采集、分析、存储管理更便捷更智能。","type":"移动互联网","financing":"A轮","province":"广东"},{"companyName":"轻松筹","companyInfoBrief":"基于社交的全民众筹平台","type":"移动互联网, 金融","financing":"C轮","province":"北京"},{"companyName":"西安未来国际","companyInfoBrief":"中国专业的信息化全程服务提供商。","type":"移动互联网","financing":"上市公司","province":"陕西"},{"companyName":"洺信科技","companyInfoBrief":"最专业的二次元音乐平台，提供海量原创、翻唱音乐，让二次元音乐爱好者通过音乐互相交流，分享快乐。","type":"数据服务","financing":"天使轮","province":"四川"}];
			},
			deep:true
		}
	}
}
</script>
