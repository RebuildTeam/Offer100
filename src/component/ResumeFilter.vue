<template>
<div align="center" id="ResumeFilter">
		<div align="left" class="ResumeFilter">
			<span	v-for="item in filterList" >
			<a  v-on:click="chosenItem=item.label"
			 	v-bind:class="{active:item.label==chosenItem}">
			 	{{item.label}}
			</a></span>
		</div>
		<br>
		<br>

	<div style="margin:0 auto;">
		<PostCard v-bind:PostCardList="PostCardListMsg" v-bind:caller="caller"></PostCard>
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
	props:['caller'],
	components:{
		PostCard,
	},
	data(){
		return{
			idMsg:this.$router.currentRoute.query.id,
			nameMsg:"",
			chosenItem:'全部',
			filterList:[{label:"全部"},{label:"已投递"},{label:"已审阅"},{label:"通过"},{label:"未通过"}],
			PostCardListMsg:[]
		}
	},
	methods:{
		queryResumeData:function(){
				var jsonObj={
					'id':this.idMsg,
					'username':this.nameMsg,
					'companyName':this.nameMsg,
					'prStatus':this.chosenItem,
				}
				if(jsonObj.prStatus=="全部"){
					jsonObj.prStatus="";
				}
				console.log(jsonObj);
				var targetUrl='';
				if(this.caller=='hr'){
					targetUrl='./src/api/getResumeList';
				}else if(this.caller=='applicant'){
					targetUrl='./src/api/getResumeStatus';
				}else{
					targetUrl='./src/api/getResumeStatus';
				}
				console.log("caller>>>"+this.caller)
				console.log("url>>>>"+targetUrl)
				$.ajax({
					url:targetUrl,
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.PostCardListMsg=JSON.parse(JSON.stringify(result.data));
					},
					error:function(){

					}
				})
		}
	},
	created:function(){
		this.nameMsg=window.localStorage.getItem(this.idMsg);
	},
	watch:{
		'chosenItem':{
			handler:function(){
				console.log(this.chosenItem);
				this.queryResumeData();
			},
			deep:true
		},
		caller:function(){
			this.queryResumeData();
		}
	},
}
</script>
