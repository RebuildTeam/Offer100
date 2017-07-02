<?php

$path = array(
	'applicantRegister' => 'UserManager.php',
	'applicantLogin' => 'UserManager.php',
	'hrLogin' => 'UserManager.php',
	'setResume' => 'PersonalInfoManager.php',
	'getResume' => 'PersonalInfoManager.php',
	'getResumeStatus' => 'PersonalInfoManager.php',
	'insertCompanyInfo' => 'CompanyInfoManager.php',
	'setCompanyInfo' => 'CompanyInfoManager.php',
	'getPosition' => 'CompanyInfoManager.php',
	'setPosition' => 'CompanyInfoManager.php',
	'dropPosition' => 'CompanyInfoManager.php',
	'getCompanyDetail' => 'PositionManager.php',
	'getCompanyBrief' => 'PositionManager.php',
	'getPositionDetail' => 'PositionManager.php',
	'getPositionBrief' => 'PositionManager.php',
	'sendResume' => 'PositionManager.php',
	'getResumeList' => 'ApplyManager.php',
	'replyResume' => 'ApplyManager.php',
	'getResume' => 'ApplyManager.php',
	);


$pathinfo = explode('/',$_SERVER['REQUEST_URI']);
$method = $pathinfo[3];
$data = file_get_contents("php://input");

require_once('php/'.''.$path[$method]);
$method($data);

?>
