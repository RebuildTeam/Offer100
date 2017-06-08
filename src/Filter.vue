<template>
<div align="center" id="Filter">
	<div align="left">
		<div v-for="item in filterList">
			<span><strong>{{item.label}}</strong></span>
			<a v-for="condition in item.conditions" href="#">{{condition.label}}</a>
		</div>
	</div>
</div>
</template>

<style type="text/css" scoped>
#Filter{
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
}
</style>
<script type="text/javascript">
export default{
	name:'Filter',
	data(){
		return{
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
	}
}
</script>