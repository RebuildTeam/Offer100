<template>
<div align="center" id="CompanyFilter">
	<div align="left" class="CompanyFilter">
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
		<CompanyCard v-bind:CompanyCardList="CompanyCardListMsg" v-bind:caller="caller"></CompanyCard>
	</div>
</div>

</template>

<style type="text/css" scoped>
.CompanyFilter{
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
	name:'CompanyFilter',
	props:['caller'],
	components:{
		CompanyCard
	},
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			usernameMsg:"",
			chosenItem:{
				"公司地址":"全国",
				"融资阶段":"无限制",
				"行业领域":"无限制",
				"排序方式":"默认"
			},
			CompanyCardListMsg:[],
			filterList:[
				{
					label:"公司地址",
					conditions:[
					{
						label:"全国"
					},{
						label:"北京"
					},{
						label:"上海"
					},{
						label:"深圳"
					},{
						label:"广州"
					},{
						label:"杭州"
					},{
						label:"成都"
					},{
						label:"南京"
					},{
						label:"武汉"
					},{
						label:"厦门"
					},{
						label:"苏州"
					},{
						label:"天津"
					}]
				},
				{
					label:"融资阶段",
					conditions:[
					{
						label:"无限制"
					},{
						label:"未融资 "
					},{
						label:"天使轮"
					},{
						label:"A轮"
					},{
						label:"B轮"
					},{
						label:"C轮"
					},{
						label:"D轮及以上"
					},{
						label:"上市公司"
					},{
						label:"不需要融资"
					}]
				},
				{
					label:"行业领域",
					conditions:[{
						label:"无限制"
					},{
						label:"移动互联网"
					},{
						label:"电子商务"
					},{
						label:"金融"
					},{
						label:"商务服务"
					},{
						label:"教育"
					},{
						label:"娱乐"
					},{
						label:"游戏"
					},{
						label:"O2O"
					},{
						label:"硬件"	
					}]
				},
				{
					label:"排序方式",
					conditions:[
					{
						label:"默认"
					},{
						label:"职位数量"
					},{
						label:"评论数量"
					},{
						label:"简历处理率"
					}]
				}]
		}
	},
	methods:{
		queryCompanyData:function(){
			var jsonObj={
				province:this.chosenItem['公司地址'],
				financing:this.chosenItem['融资阶段'],
				type:this.chosenItem['行业领域'],
				sortOrder:this.chosenItem['排序方式'],
			};

			if(jsonObj.province=="全国"){
				jsonObj.Province="";
			}
			if(jsonObj.financing=="无限制"){
				jsonObj.Financing="";
			}
			if(jsonObj.type=="无限制"){
				jsonObj.type="";
			}
			if(jsonObj.sortOrder=="默认"){
				jsonObj.sortOrder="";
			}
				$.ajax({
					url:'./src/api/getCompanyBrief',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.CompanyCardListMsg=result.data;
					},
					error:function(){

					}
				})
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
		this.queryCompanyData();
	},
	watch:{
		'chosenItem':{
			handler:function(){
				this.queryCompanyData();
			},
			deep:true
		}
	},
}
</script>
