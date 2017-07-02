<template>
<div  id="PositionCard">
	    <div v-for="item in positionCardList">
	        <div class="PositionCard-info" align="left">
			    <div class="position-panel"><!-- 这是左层div -->
			    	<h4>{{item.positionName}}</h4>

			    	<div class="middle"><!-- 这是左侧中层div -->
			    			<span class="salary">{{item.salary}}</span>
			    			<span>{{item.city}}</span>
			    			<span>{{item.requiredEducation}}</span>
			    			<span>{{item.requiredExperience}}</span>
			    	</div class="footer">
			    	<div class="feedback"><!-- 左侧下层div -->
			    		<span>{{item.releaseTime}}</span>
			    		<span>{{item.positionType}}</span>			
			    	</div>

			    </div><div class="company-panel" v-if="item.companyName!=null"><!-- 这是右层div -->
			    	<div><!-- 那个公司名称的div -->
			    		<p>{{item.companyName}}</p>
			    	</div>
			    	<div align="left">
			    		<p>
			    			{{item.officeHour}}
			    		</p>
			    	</div>
			    </div>
		    </div>

		</div>
    
</div>	

</template>

<style type="text/css" scoped>
.PositionCard-info{
	cursor: pointer;
	box-sizing:border-box;
	width: 100%;
	border:1px solid #dfdfdf;
	margin-top:0.5em;
	margin-bottom: 0.5em;
	padding: 1em;
	height: 8em;
	overflow: hidden;
	transition: all 0.6s;
}
.PositionCard-info:hover{
	border:1px solid #00b38a;
}
.position-panel{
	display: inline-block;
	width: 60%;
	vertical-align: top;
}
h4{
	margin: 0.5em;
	color: #55aaaa;
	font-weight: bold;
}
.salary{
	color: orange;
}
.middle{
	overflow: hidden;
}
.footer{
	overflow: hidden;
}
.company-panel{
	display: inline-block;
	width: 40%;
	vertical-align: top;
}
.feedback{
	margin-top: 0.5em;
}
span{
	padding-left:0.5em;
	padding-right:0.5em;

	float: left;
	display: inline-block;
	width: auto;
	border-right: 1px solid #dfdfdf;
}

</style>
<script type="text/javascript">
export default{
	name:'PositionCard',
	// props:['positionCardList'],
	data(){
		return{
			positionCardList:[{"positionName":"软件测试工程师","salary":"8k-16k","city":"深圳","requiredEducation":"大专及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"","releaseTime":"2017-06-25","introduction":"","responsibility":"参与公司嵌入式产品的功能测试、性能测试、稳定性测试等；编写测试方案并制定测试计划；编写测试用例并执行测试；根据测试计划搭建和维护测试环境；跟踪所提交Bug的解决；参与产品需求讨论，需求评审；编写测试报告","requiredSkill":"","priority":"","officeHour":"","welfare":"","others":"","applicant":[{"username":"Abstract","status":"已审阅"}],"companyName":"欧德蒙"},{"positionName":"java工程师","salary":"10k-20k","city":"深圳","requiredEducation":"大专","requiredExperience":"3-5年","positionType":"全职","positionTag":"","releaseTime":"2017-06-25","introduction":"","responsibility":"","requiredSkill":"","priority":"","officeHour":"","welfare":"","others":"","applicant":[],"companyName":"欧德蒙"},{"positionName":"文案策划","salary":"5k-8k","city":"深圳","requiredEducation":"本科及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"","releaseTime":"2017-06-25","introduction":"","responsibility":"","requiredSkill":"","priority":"","officeHour":"","welfare":"","others":"","applicant":[{"username":"明镜止水","status":"已审阅"},{"username":"S.T.A.R","status":"已投递"}],"companyName":"欧德蒙"},{"positionName":"UI设计师","salary":"3k-5k","city":"西安","requiredEducation":"大专及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"","releaseTime":"2017-06-30","introduction":"","responsibility":"1、精通Photoshop、Illustrator、Flash、PPT等软件；2、熟练操作常用办公软件，且具备其它软件应用能力；3、对通用类软件或互联网应用产品的人机交互方面有自己的理解和认识；4、具备良好的审美能力、深厚的美术功底，有较强的平面设计和网页设计能力；5、具有敏锐的用户体验观察力，富有创新精神。","requiredSkill":"","priority":"","officeHour":"","welfare":"发展空间, 企业平台, 餐补交补, 五险一金","others":"","applicant":[{"username":"S.T.A.R","status":"已投递"}],"companyName":"西安未来国际"},{"positionName":"IOS开发工程师","salary":"6k-9k","city":"成都","requiredEducation":"本科及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"","releaseTime":"2017-07-01","introduction":"","responsibility":"根据任务需求完成独立模块的开发；设计、开发，测试 IOS应用软件；编写维护相关文档；研究手机应用的各种用户体验;配合web前端基于react native完成界面开发。","requiredSkill":"全日制统招计算机专业本科以上学历；两年以上IOS应用开发经验，熟悉IOS系统架构，至少一款完整的IOS(基于Swift开发实现)应用开发和发布经验；熟悉RestFull API 开发流程，熟悉音视频播放器开发、文件断点续传及下载。（必备一项）；对OOP，多线程编程，内存管理，性能优化，单元测试有实际项目经验；熟悉IOS平台设计理念，具有丰富的UI开发经验；具备良好的团队合作意识；工作认真负责，思路清晰，良好的问题分析和解决能力；熟悉敏捷及迭代式开发，有Swift经验，有图像、数据处理相关经验优先。","priority":"","officeHour":"","welfare":"","others":"","applicant":[],"companyName":"洺信科技"},{"positionName":"中高级UI设计师","salary":"7k-9k","city":"成都","requiredEducation":"大专及以上","requiredExperience":"3-5年","positionType":"全职","positionTag":"web, 交互, UI, 设计, UED, app","releaseTime":"2017-07-01","introduction":"","reponsibility":"根据产品(APP及web)原型图，独立完成界面视觉设计╭(′▽`)╭(′▽`)╯；负责静态页（切图标注等输出）和交互效果制作，与前端充分沟通，确保功能易用体验流畅；追踪产品改进，提升用户体验，不断优化产品 ( •́ .̫ •̀ )；","requiredSkill":"我们需要你热爱设计、坚持设计、热爱创意、善于思考≖‿≖✧；对iOS和Android的UI设计了解的就像了解你的左手跟右手๑乛◡乛๑，高度认同Material Design设计风格和苹果产品设计理念；三年以上工作经验，拥有优质的视觉鉴赏能力(๑•̀ㅂ•́)و✧，想法创意不拘一格，对视觉用户研究有独到的见解，有着2个以上完整商业成熟项目；设计作品有美感，体现专业性 ( •̀ .̫ •́ )✧（布局、按钮、列表、操作布局、配色）；具备良好的团队意识和责任感，善于交流分享，能承受一定的工作压力；美术、设计或相关全日制本科毕业。","priority":"","officeHour":"周一至周五8am-5pm","welfare":"六险一金, 周末双休, 法定节假日, 各种福利","others":"(ฅ´ω`ฅ) 简历投递请附带作品或作品链接","applicant":[],"companyName":"洺信科技"},{"positionName":"品牌运营","salary":"3k-6k","city":"成都","requiredEducation":"大专及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"媒体, 社交, 游戏, 音乐, 广告营销, 运营","releaseTime":"2017-07-01","introduction":"","reponsibility":"能够制定、管理、执行产品的整体PR策略，根据产品现阶段情况和下阶段计划，给出各阶段重点的传播渠道，撰写传播规划及费用预算；协调沟通品牌的媒体资源，增加品牌曝光度。项目类型包含但不限于主流媒体报道、KOls、网络广告等；对公司现有宣传渠道进行维护，并能根据实际情况给出意见，挖掘新的宣传渠道；阶段性分析品牌传播效果，能够对数据进行分析和总结，对品牌运营策略进行调整优化；与新媒体运营协同配合生产传播内容。","requiredSkill":"具有一定的品牌塑造和品牌传播的经验，或对此行业有浓厚兴趣；大专以上学历，1年以上内容运营工作经验，对品牌塑造和品牌传播有独特见解，对于直播媒体、音乐类应用有浓厚兴趣；活跃的社交网络用户，特别熟悉社交平台的推广方式，乐于表达、互动与交际；具备一定的文字功底、较宽的知识面，思维活跃，文笔流畅；善于总结规律，并善于使用PPT，语言传达工作及知识内容。","priority":"热爱动漫、游戏、音乐、二次元，有管理过社交圈的经验的优先","officeHour":"","welfare":"六险一金, 周末双休, 法定节假日, 各种福利","others":"","applicant":[],"companyName":"洺信科技"},{"positionName":"产品运营（活动内容运营）","salary":"3k-6k","city":"成都","requiredEducation":"大专及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"文化娱乐, 运营","releaseTime":"2017-07-01","introduction":"","reponsibility":"根据产品各阶段发展需求，策划各类活动（线下、线上），能独立策划、撰写活动方案并组织实施；善于挖掘网络传播爆点，善于运用网络途径进行宣传；对同类产品活动、话题等内容和数据进行监控，提供有竞争性的活动方案；对活动数据效果进行评估，对数据进行监控，整理并分析活动数据。","requiredSkill":"专科以上学位，2年以上互联网运营工作经验，对娱乐行业有一定的了解；具备良好的文字功底、较宽的知识面，思维活跃，文笔流畅；了解二次元，了解贴吧运营和新媒体运营；工作执行细心缜密、注重细节和用户体验, 良好的团队协作能力；有较高的互联网职业素养，较高的执行力。","priority":"","officeHour":"","welfare":"六险一金, 周末双休, 法定节假日, 各种福利","others":"","applicant":[],"companyName":"洺信科技"},{"positionName":"web前端工程师","salary":"7k-10k","city":"成都","requiredEducation":"大专及以上","requiredExperience":"3-4年","positionType":"全职","positionTag":"","releaseTime":"2017-07-01","introduction":"公司网站开发前端相关工作。","reponsibility":"完成公司各类H5页面、PC页面的编写；与UI紧密配合，高效地将设计图转化为HTML、CSS、JavaScript文件；配合App开发同事完成 app界面开发。","requiredSkill":"全日制统招计算机相关专业大专及以上学历。 3年及以上网页前端工作经验，熟悉互联网行业。 熟悉 Web 开发流程, 有 ES6,  Vue,  Webpack 实践经验。 熟悉H5 Audio播放器, 能基于vue.js完成web播放器代码开发及兼容调试。熟练掌握 HTML5,  CSS3,  Javascript 开发技术.有 ES6,  Vue,  Webpack 实践经验，良好的团队协作精神。","priority":"有跨浏览器、跨终端的前端开发经历或者有移动app混合开发经验者优先考虑；有采用 react native 的实际项目开发经验者择优录用；","officeHour":"","welfare":"","others":"至少有一个基于Vue（angularjs或者react）项目完整开发经验。","applicant":[],"companyName":"洺信科技"},{"positionName":"BI产品经理","salary":"15k-30k","city":"北京","requiredEducation":"本科及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"BI","releaseTime":"2017-07-01","introduction":"1、负责 DataHunter 数据自助式分析产品平台的产品设计，向企业提供一站式数据分析平台服务；2、负责产品的功能分析、UE设计，行业化分析功能设计，推进平台的易用性和规范化；3、观察用户行为，分析、挖掘产品需求，协同设计、开发团队规划产品发展方向；4、关注行业信息，跟踪竞品动向，试用竞争产品，创新产品，提升产品竞争力。","responsibility":"","requiredSkill":"优秀的产品设计能力，交互设计能力，需求挖掘能力，对各种图表熟练使用；了解数据分析和算法的基本概念，有相关产品及项目负责经验；思维逻辑清晰，有数据统计分析理论基础，处理过大量数据，熟练使用业内多种数据分析产品；具有优秀的表达、沟通与协调能力、团队合作精神。","priority":"统计、应用数学等相关专业背景优先，有BI工具（Tableau、Qlik、PowerBI、Oracle BIE）类相关经验加分","officeHour":"","welfare":"","others":"","applicant":[],"companyName":"DataHunter"},{"positionName":"数据产品经理","salary":"15k-30k","city":"北京","requiredEducation":"本科及以上","requiredExperience":"1-3年","positionType":"全职","positionTag":"BI","releaseTime":"2017-07-01","introduction":"","reponsibility":"负责 DataHunter 数据自助式分析产品平台的产品设计，向企业提供一站式数据可视化分析平台服务；负责产品的功能分析、UE设计，行业可视化分析功能设计，推进平台的易用性和规范化；观察用户行为，分析、挖掘产品需求，协同设计、开发团队规划产品发展方向；关注行业信息，跟踪竞品动向，试用竞争产品，创新产品，提升产品竞争力。","requiredSkill":"优秀的产品设计能力，交互设计能力，需求挖掘能力，对各种图表熟练使用；了解数据分析和算法的基本概念，有相关产品及项目负责经验；思维逻辑清晰，有数据统计分析理论基础，处理过大量数据，熟练使用业内多种数据分析产品；具有优秀的表达、沟通与协调能力、团队合作精神。","priority":"统计、应用数学等相关专业背景优先，有BI工具（Tableau、Qlik、PowerBI、Oracle BIE）类相关经验加分","officeHour":"","welfare":"","others":"","applicant":[],"companyName":"DataHunter"}]
		}
	}
}
</script>