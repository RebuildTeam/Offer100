import Index from './page/index-go.vue'
import Login from './page/login.vue'
import Position from './page/position.vue'
import Company from './page/company.vue'
import PersonalResume from './page/personalResume.vue'

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
	},
	{
		path:'/Company',
		name:'Company',
		component:Company,
	},
	{
		path:'/PersonalResume',
		name:'PersonalResume',
		component:PersonalResume
	}
]

export default routes

