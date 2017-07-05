<template>
	<div id="Index">
		<Navbar v-bind:caller="caller"></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<h1  id="recommend-label" align="center">Recommend</h1>
		<RecommendRow v-bind:caller="caller"></RecommendRow>
		<br><br>
		<CompanyFilter v-bind:caller="caller"></CompanyFilter>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import RecommendRow from '../component/RecommendRow.vue'
import CompanyFilter from '../component/CompanyFilter.vue'
	export default{
		name:'Index',
		data(){
			return{
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:window.localStorage.getItem(this.idMsg),
				caller:"",
			}
		},
		components:{
			Navbar,
			CompanyFilter,
			RecommendRow
		},
		methods:{
			getCaller:function(){
				var jsonObj={
					'id':this.idMsg,
				};
				$.ajax({
					url:'./src/api/getCaller',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						this.caller=result.caller;
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		},
		created:function(){				
			this.nameMsg=window.localStorage.getItem(this.idMsg);
			this.getCaller();
		},
	}
</script>
