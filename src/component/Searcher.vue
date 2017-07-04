<template>
<div align="center" id="Searcher">
	<div class="Searcher">
		<div><input v-model="searchContent" /><button v-on:click="searchPosition()">寻找Offer</button></div>
	</div>
	<br>
	<div>
		<PositionCard v-bind:positionCardList="positionCardListMsg"></PositionCard>
	</div>
</div>

</template>

<style type="text/css" scoped>
.Searcher{
	font-size: 10pt;
	max-width: 960px;
	width: 100%;
	box-sizing:border-box;
	background-color: #fffff6;
	border:1px solid #dfdfdf;
	padding: 0.5em;
	overflow: hidden;
}
.Searcher >div> input {
	margin:-1px;
	width: 80%;
	float: left;
	border: 1px solid #efefef;
	height: 2em;
	padding: 0;
	font-size: 18px;
}
.Searcher >div> button{
	padding:0;
	height: 2em;
	width: 20%;
	float: left;
	font-size: 18px;
	background-color: orange;
	color: white;
	border: none;
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
import PositionCard from './PositionCard.vue';

export default{
	name:'Searcher',
	components:{
		PositionCard
	},
	data(){
		return{
				isSearching:0,
				positionCardListMsg:[],
				searchContent:"",
			}
	},
	methods:{
		searchPosition:function(){
			var jsonObj={
				'id':"",
				'keyword':this.searchContent,
			}
			$.ajax({
				url:'./src/api/getPositionBrief',
				data:JSON.stringify(jsonObj),
				dataType:'json',
				type:'post',
				success:(result)=>{
					this.positionCardListMsg=result.data;
					this.isSearching=0;
				},
				error:function(result,msg,error){
					console.log(result,msg,error);
					this.isSearching=0;
				}
			})
		}

	},
	created:function(){
		this.searchPosition();		
	}
}
</script>
