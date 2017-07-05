<template>
	<div id="ResumeBox">
		<HRNavbar v-bind:caller="caller"></HRNavbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<div class="container">
			<ResumeFilter v-bind:caller="caller"></ResumeFilter>
		</div>
	</div>
</template>
<script type="text/javascript">
import HRNavbar from '../component/HRNavbar.vue'
import ResumeFilter from '../component/ResumeFilter.vue'
	export default{
		name:'ResumeBox',
		components:{
			HRNavbar,
			ResumeFilter,
		},
		data(){
			return{
				idMsg:this.$router.currentRoute.query.id,
				nameMsg:"",
				caller:"",
			}
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
