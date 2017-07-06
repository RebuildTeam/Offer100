<template>
	<div id="DeliveryBox">
		<Navbar v-bind:caller="caller"></Navbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'Index',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
		<div class="container">
			<ResumeFilter v-bind:caller="caller"></ResumeFilter>
		</div>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import ResumeFilter from '../component/ResumeFilter.vue'
	export default{
		name:'DeliveryBox',
		components:{
			Navbar,
			ResumeFilter,
		},
		data(){
			return{
				idMsg:this.$router.currentRoute.query.id,
				usernameMsg:"",
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
		}
	}
</script>
