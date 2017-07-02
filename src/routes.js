import Index from './page/index-php.vue'
import Login from './page/login.vue'
import Position from './page/position.vue'

const routes=[
	{
		path:'/',
		name:'Login',
		component:Login,
	},
	{
		path:'/Index',
		name:'Index',
		component:Index,
	},
	{
		path:'/Position',
		name:'Position',
		component:Position,
	}
]

export default routes

