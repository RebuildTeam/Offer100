import Vue from './js/vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import routes from './routes.js'
import AMap from 'vue-amap';

Vue.use(VueRouter)
Vue.use(AMap);

// 初始化vue-amap
AMap.initAMapApiLoader({
  // 高德的key
  key: '89ad2d3de25335618fdbadaae5710fb2',
  // 插件集合
  plugin: ['AMap.Autocomplete', 'AMap.PlaceSearch', 'AMap.Scale', 'AMap.OverView', 'AMap.ToolBar', 'AMap.MapType', 'AMap.PolyEditor', 'AMap.CircleEditor']
});


const router=new VueRouter({
	mode:'history',
	routes	
})

new Vue({
	router,
	render:h=>h(App)
}).$mount("#MountPoint")

export default router

