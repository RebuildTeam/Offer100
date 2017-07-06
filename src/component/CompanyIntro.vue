<template>
<div align="center" id="CompanyIntro">
	<div align="left" class="CompanyIntro">
		<div class="container">
			<h3>公司特色</h3>
			<p>{{companyDetail.companyTag}}</p><br>
			<h3>公司环境</h3>
			<img v-bind:src="'./src/img/'+companyDetail.picture">
			<h3>公司介绍</h3>
			<p>{{companyDetail.companyInfoDetail}}</p><br>
			<h3>公司主页</h3>
			<p>{{companyDetail.website}}</p><br>
			<h3>公司地址</h3>
			<p>{{companyDetail.location}}</p><br>
			<el-amap vid="amapDemo" id="map" :center="LngLat" :zoom="11">
				<el-amap-marker :position="LngLat"> </el-amap-marker>
			</el-amap>
			<h3>招聘职位</h3>
			<div align="center">
			<router-link v-if="caller=='hr'" class="btn-green add-btn" :to="{ name :'EditPosition' , query:{ id:idMsg, positionName:''}}">
				新增职位
			</router-link></div>
			<PositionCard v-bind:positionCardList="companyDetail.position" v-bind:caller="caller"></PositionCard>
		</div>
	</div>
</div>
</template>


<style type="text/css" scoped>
#map{
	height: 400px;
}
.add-btn{
	display:block;
	line-height: 3em;
	width: 8em;
	height: 3em;
	border-radius: 10px;
}
.btn-green{
	color:orange;
	background-color: white;
	border:none;
	transition:all 0.6s;
}
.btn-green:hover{
	color:white;
	background-color: orange;
	border:none;
}
.container{
	padding:0;
}
.CompanyIntro{
	font-size: 10pt;
	width: 100%;
	background-color: #fff;
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
	margin:0;
	position: relative;
}
.send-pr-btn{
	width: 8em;
	height: 2.5em;
	font-size: 1.5em;
	border:none;
	border-radius: 5px;
	background-color: orange;
	color: white;
}
.icon
{
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: text-top;
    margin-top: -1px;
}
</style>
<script type="text/javascript">
import PositionCard from './PositionCard.vue';

export default{
	name:'CompanyIntro',
	components:{
		PositionCard
	},
	props:['companyDetail','caller'],
	data(){
		return{
			LngLat:[0,0],
			idMsg:this.$router.currentRoute.query.id,
			usernameMsg:"",
		}
	},
	watch:{
		'companyDetail':{
			handler:function(){
				var lng=parseInt(this.companyDetail.long);
				var lat=parseInt(this.companyDetail.lat);
				this.LngLat=[lng,lat];
				console.log(this.LngLat)
			},
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	}
}
</script>
