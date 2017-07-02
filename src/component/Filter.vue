<template>
<div align="center" id="Filter">
	<div align="left" class="Filter">
		<div v-for="item in filterList">
			<span><strong>{{item.label}}</strong></span>
			<a 	v-for="condition in item.conditions" 
			 	v-on:click="chosenItem[item.label]=condition.label"
			 	v-bind:class="{active:condition.label==chosenItem[item.label]}">
			 	{{condition.label}}
			</a>
		</div>
	</div>
	<br>
	<div style="width: 1000px;margin:0 auto;">
		<CompanyCard v-bind:CompanyCardList="CompanyCardListMsg"></CompanyCard>
	</div>
</div>

</template>

<style type="text/css" scoped>
.Filter{
	font-size: 10pt;
	max-width: 960px;
	width: 100%;
	background-color: #fffff6;
	border:1px solid #dfdfdf;
	padding: 0.5em;
}
span{
	display: inline-block;
	width: 6em;
	height: 1em;
	margin: 0.3em;
	padding: 0.2em;
}
a.active{
	color: #fff;
	background-color: #33bb93;
}
a{
	height: 1em;
	font-size: 10pt;
	line-height: 1em;
	display: inline-block;
	margin: 0.2em;
	padding: 0.3em;
	color: #333;
	text-decoration: none;
	transition: all 0.3s;
}
</style>
<script type="text/javascript">
import CompanyCard from './CompanyCard.vue';

export default{
	name:'Filter',
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
