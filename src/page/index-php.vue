<template>
	<div id="Index">
		<Navbar v-bind:caller="caller"></Navbar>
		<div id="offer-100-label" align="left" class="container"><router-link :to="{name:'Index',query:{id:idMsg}}"><strong>Offer 100</strong></router-link></div>
<div id="myCarousel" class="carousel slide">
  	<ol class="carousel-indicators">
  	  	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  	  	<li data-target="#myCarousel" data-slide-to="1"></li>
  	  	<li data-target="#myCarousel" data-slide-to="2"></li>
  	</ol>
  	<!-- Carousel items -->
  	<div class="carousel-inner">
  	  	<div class="active item" v-bind:style="{backgroundImage:'url(./src/img/work1.jpg'}">海量Offer任你挑</div>
  	  	<div class="item" v-bind:style="{backgroundImage:'url(./src/img/work2.jpg'}">高薪工作随便找</div>
  	  	<div class="item" v-bind:style="{backgroundImage:'url(./src/img/work3.jpg'}">轻松求职口碑好</div>
  	</div>
  	<!-- Carousel nav -->

  	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
		<div class="container">
			<div class="row">
				<div class="left-content">
					<Searcher v-bind:caller="caller"></Searcher>
				</div>
				<div class="right-panel">	
					<h1 class="recommend-label-orange" align="center">Recommend</h1>
					<RecommendColumn v-bind:caller="caller"></RecommendColumn>
				</div>
			</div>
		</div>
	</div>
</template>
<style type="text/css" scoped>
.item{
	color: white;
	font-size: 50px;
	height: 10em;
	width: 100%;
	background-size: 100% auto;
	background-position: center;
	line-height: 25em;
}
</style>
<script type="text/javascript">
import Navbar from '../component/Navbar.vue'
import Searcher from '../component/Searcher.vue'
import RecommendColumn from '../component/RecommendColumn.vue'

	export default{
		name:'Index',
		components:{
			Navbar,
			Searcher,
			RecommendColumn
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
