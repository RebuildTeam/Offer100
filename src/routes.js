import Index from './page/index-php.vue'
import Login from './page/login.vue'
import Position from './page/position.vue'
import EditPosition from './page/editPosition.vue'
import EditCompany from './page/editCompany.vue'
import Company from './page/company.vue'
import ResumeBox from './page/resumeBox.vue'
import DeliveryBox from './page/deliveryBox.vue'
import PersonalResume from './page/personalResume.vue'
import ApplicantResume from './page/applicantResume.vue'
import CompanyManagement from './page/companyManagement.vue'

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
		path:'/EditPosition',
		name:'EditPosition',
		component:EditPosition,
	},
	{
		path:'/EditCompany',
		name:'EditCompany',
		component:EditCompany,
	},
	{
		path:'/Company',
		name:'Company',
		component:Company,
	},
	{
		path:'/ResumeBox',
		name:'ResumeBox',
		component:ResumeBox,
	},
	{
		path:'/DeliveryBox',
		name:'DeliveryBox',
		component:DeliveryBox,
	},
	{
		path:'/PersonalResume',
		name:'PersonalResume',
		component:PersonalResume,
	},
	{
		path:'/ApplicantResume',
		name:'ApplicantResume',
		component:ApplicantResume,
	},
	{
		path:'/CompanyManagement',
		name:'CompanyManagement',
		component:CompanyManagement,
	},
]

export default routes

