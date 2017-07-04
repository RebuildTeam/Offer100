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
			<PositionCard v-bind:positionCardList="companyDetail.position"></PositionCard>
		</div>
	</div>
</div>
</template>


<style type="text/css" scoped>
#map{
	height: 400px;
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
	background-color: #00b38a;
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
	props:['companyDetail'],
	data(){
		return{
			LngLat:[0,0],
		}
	},
	mounted:function(){
		
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
	}
}
</script>
