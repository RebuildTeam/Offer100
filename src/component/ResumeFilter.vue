<template>
<div align="center" id="ResumeFilter">
		<div align="left" class="ResumeFilter">
			<span	v-for="item in filterList" ><a 
			 	v-on:click="chosenItem=item.label"
			 	v-bind:class="{active:item.label==chosenItem}">
			 	{{item.label}}
			</a></span>
		</div>
		<br>
		<br>

	<div style="margin:0 auto;">
		<PostCard v-bind:PostCardList="PostCardListMsg"></PostCard>
	</div>
</div>

</template>

<style type="text/css" scoped>
.ResumeFilter{
	font-size: 10pt;
	max-width: 960px;
	width: 100%;
	background-color: #fffff6;
	border:1px solid #dfdfdf;
	padding: 0.5em;
	box-sizing:border-box;
}
a.active{
	color: #fff;
	background-color: #33bb93;
}
a{
	height: 1em;
	font-size: 10pt;
	line-height: 1em;
	/*display: inline-block;*/
	box-sizing: border-box;
	padding: 0.5em;
	color: #333;
	text-decoration: none;
	transition: all 0.3s;
}
</style>
<script type="text/javascript">
import PostCard from './PostCard.vue';

export default{
	name:'ResumeFilter',
	components:{
		PostCard,
	},
	data(){
		return{
			idMsg:window.localStorage.getItem("id"),
			companyNameMsg:window.localStorage.getItem("companyName"),
			usernameMsg:window.localStorage.getItem("username"),
			chosenItem:'全部',
			filterList:[{label:"全部"},{label:"已投递"},{label:"已审阅"},{label:"通过"}],	
			PostCardListMsg:[]
		}
	},
	methods:{
		queryResumeData:function(){
				var jsonObj={
					'id':this.idMsg,
					'username':this.usernameMsg,
					'companyName':this.companyNameMsg,
					'prStatus':this.chosenItem,
				}
				if(jsonObj.prStatus=="全部"){
					jsonObj.prStatus="";
				}
				console.log(jsonObj);
				$.ajax({
					url:'./src/api/getResumeList',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.PostCardListMsg=result.data;
						console.log(result);
						// console.log(JSON.stringify(this.PostCardListMsg));
					},
					error:function(){

					}
				})
		}
	},
	created:function(){
		this.queryResumeData();
	},
	watch:{
		'chosenItem':{
			handler:function(){
				console.log(this.chosenItem);
				this.queryResumeData();
			},
			deep:true
		}
	},
}
</script>
