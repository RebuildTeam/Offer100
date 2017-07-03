<template>
<div  id="PositionCard">
	    <div v-for="item in positionCardList">
	        <div class="PositionCard-info" align="left">
			    <router-link :to="{ name: 'Position', params: { companyName: item.companyName,positionName:item.positionName }}"><div class="position-panel"><!-- 这是左层div -->
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
			    </div></router-link><div class="company-panel" v-if="item.companyName!=null" v-on:click="linkToCompany(e)"><!-- 这是右层div -->
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
	/*border:1px solid #dfdfdf;*/
	box-shadow: 1px 1px 5px 1px #dfdfdf;
	margin-top:0.5em;
	margin-bottom: 0.5em;
	padding: 1em;
	height: 8em;
	overflow: hidden;
	transition: all 0.6s;
}
.PositionCard-info:hover{
	/*border:1px solid #00b38a;*/
	box-shadow: 1px 1px 5px 1px #00b38a;
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
import router from '../main.js'

export default{
	name:'PositionCard',
	props:['positionCardList'],
	data(){
		return{
			e:null
		}
	},
	methods:{
		linkToPosition:function(even){
				// var cn=event.target.getAttribute("cn");
				// var pn=event.target.getAttribute("pn");
				// console.log(event.target);
				// router.push({ name: 'Position', params: { companyName:cn,positionName:pn}})
				// console.log("router>>>>>"+router.params.companyName);
		},
		linkeToCompany:function(){

		}
	}
}
</script>
