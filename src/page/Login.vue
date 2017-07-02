<template>
	<div id="App">
		<div class="panel"></div>
		<div class="panel"></div>
		<LoginBox></LoginBox>
	<div>

</template>
<style type="text/css" scoped>
#App{
	height: 100%;
	width: 100%;
}
.panel{
	height: 50%;
	width: 100%;
}
.panel:nth-child(1){
	background-color: green;
}
</style>

<script type="text/javascript">
	import LoginBox from '../component/LoginBox.vue'
	export default{
		name:'Login',
		components:{
			LoginBox
		}
	}
</script>