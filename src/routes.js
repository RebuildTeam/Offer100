import Index from './page/index-php.vue'
import Login from './page/login.vue'

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
	}
]

export default routes

