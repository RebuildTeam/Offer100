<template>
	<div id="Index">
		<Navbar></Navbar>
		<div id="offer-100-label" align="left"><strong>Offer 100</strong></div>
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
					<Searcher></Searcher>
				</div>
				<div class="right-panel">	
					<h1 class="recommend-label-orange" align="center">Recommend</h1>
					<RecommendColumn></RecommendColumn>
				</div>
			</div>
		</div>
	</div>
</template>
<style type="text/css" scoped>
.item{
	color: white;
	font-size: 20px;
	height: 25em;
	width: 100%;
	background-size: 100% auto;
	background-position: center;
}
/*.item:nth-child(1){
	background-image: url('../img/work1.jpg');
}
.item:nth-child(2){
	background-image: url('../img/work2.jpg');
}
.item:nth-child(3){
	background-image: url('../img/work3.jpg');
}*/
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
	}
</script>