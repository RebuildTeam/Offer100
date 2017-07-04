<template>
	<div id="Position">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
		<div class="container">
			<PR v-bind:PRDetail="PRDetailMsg" v-bind:caller="callerMsg"></PR>
		</div>
	</div>
</template>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import PR from '../component/PR.vue'
	export default{
		name:'Position',
		components:{
			Navbar,
			PR,
		},
		data(){
			return{
				callerMsg:"",
				PRDetailMsg:{}
			}
		},
		created:function(){
				this.initPRData();
		},
		methods:{
			initPRData:function(){
				var jsonObj={
					'id':"",
				};
				$.ajax({
					url:'./src/api/getResume',
					data:JSON.stringify(jsonObj),
					dataType:'json',
					type:'post',
					success:(result)=>{
						console.log(result);
						this.PRDetailMsg=result.data;
						this.callerMsg=result.caller;
					},
					error:function(result,msg,error){
						console.log(result,msg,error);
					}
				})
			}
		}
	}
</script>
