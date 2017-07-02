<template>
<div  id="PositionCard">
	    <div v-for="item in positionCardList">
	        <div class="PositionCard-info" align="left">
			    <div class="position-panel" v-on:click="linkToPosition()"><!-- 这是左层div -->
			    	<h4>{{item.positionName}}</h4>

			    	<div class="middle"><!-- 这是左侧中层div -->
			    			<span class="salary">{{item.salary}}</span>
			    			<span>{{item.city}}</span>
			    			<span>{{item.requiredEducation}}</span>
			    			<span>{{item.requiredExperience}}</span>
			    	</div class="footer">
			    	<div class="feedback"><!-- 左侧下层div -->
			    		<span>{{item.releaseTime}}</span>
			    		<span>{{item.positionType}}</span>			
			    	</div>

			    </div><div class="company-panel" v-if="item.companyName!=null" v-on:click="linkToCompany()"><!-- 这是右层div -->
			    	<div><!-- 那个公司名称的div -->
			    		<p>{{item.companyName}}</p>
			    	</div>
			    	<div align="left">
			    		<p>
			    			{{item.officeHour}}
			    		</p>
			    	</div>
			    </div>
		    </div>

		</div>
    
</div>	

</template>

<style type="text/css" scoped>
.PositionCard-info{
	cursor: pointer;
	box-sizing:border-box;
	width: 100%;
	border:1px solid #dfdfdf;
	margin-top:0.5em;
	margin-bottom: 0.5em;
	padding: 1em;
	height: 8em;
	overflow: hidden;
	transition: all 0.6s;
}
.PositionCard-info:hover{
	border:1px solid #00b38a;
}
.position-panel{
	display: inline-block;
	width: 60%;
	vertical-align: top;
}
h4{
	margin: 0.5em;
	color: #55aaaa;
	font-weight: bold;
}
.salary{
	color: orange;
}
.middle{
	overflow: hidden;
}
.footer{
	overflow: hidden;
}
.company-panel{
	display: inline-block;
	width: 40%;
	vertical-align: top;
}
.feedback{
	margin-top: 0.5em;
}
span{
	padding-left:0.5em;
	padding-right:0.5em;

	float: left;
	display: inline-block;
	width: auto;
	border-right: 1px solid #dfdfdf;
}

</style>
<script type="text/javascript">
export default{
	name:'PositionCard',
	props:['positionCardList'],
	data(){
		return{
		}
	},
	methods:{
		linkToPosition:function(){
			this.$router.push({ path: '/Position', params: { companyName: "DataHunter",positionName:"web" }})
		},
		linkeToCompany:function(){

		}
	}
}
</script>
