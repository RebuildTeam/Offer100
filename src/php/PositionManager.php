<?php
session_start();
require_once 'tools.php';
  function getCompanyDetail($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    getCompanyDetailF($companyName);
  }
  function getCompanyBrief($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $keyword = $arr['keyword'];
    getCompanyBriefF($keyword);
  }
  function getPositionBrief($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $keyword = $arr['keyword'];
    getPositionBriefF($keyword);
  }
  function sendResume($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    $companyName = $arr['companyName'];
    $positionName = $arr['positionName'];
    sendResumeF($username,$companyName,$positionName);
  }

  function getCompanyDetailF($companyName)
  {
    $reArr = array();
    $isExist = findCompany($companyName);
    if($isExist)
    {
      $manager = Manager::getManager();
      $filter = ['companyName' => $companyName];
      $options = [
        'projection' => ['_id' => 0],
      ];
      $query = new MongoDB\Driver\Query($filter,$options);
      $cursor = $manager->executeQuery("test.company", $query);
      foreach($cursor as $document)
      {
        $re = object_array($document);
        //var_dump($document);
      }
      // var_dump($positionRe);
    }
    $reArr['data'] = $re;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function getCompanyBriefF($keyWord)
  {
    $reArr = array();
    $manager = Manager::getManager();
    $filter = ['$or' => [
                  ['companyName' => ['$in' => [new MongoDB\BSON\Regex($keyWord)]]],
                  ['companyTag' => ['$in' => [new MongoDB\BSON\Regex($keyWord)]]],
                  ['type' => ['$in' => [new MongoDB\BSON\Regex($keyWord)]]],
                  ['financing' => ['$in' => [new MongoDB\BSON\Regex($keyWord)]]],
                  ['location' => ['$in' => [new MongoDB\BSON\Regex($keyWord)]]]
    ]];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.company", $query);
    $companyList = array();
    foreach($cursor as $document)
    {
      $re = object_array($document);
      $tempArr = array();
      $tempArr['companyName'] = $re['companyName'];
      $tempArr['companyInfoBrief'] = $re['companyInfoBrief'];
      $tempArr['type'] = $re['type'];
      $tempArr['financing'] = $re['financing'];
      $tempArr['province'] = $re['province'];
      $tempArr['logo'] = $re['logo'];
      $tempArr['dealingRate'] = $re['dealingRate'];
      $tempArr['evaluateNum'] = $re['evaluateNum'];
      array_push($companyList,$tempArr);
    }
    //var_dump($companyList);
    $reArr['data'] = $companyList;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function getPositionBriefF($keyword)
  {
    $reArr = array();
    $manager = Manager::getManager();
    $filter = [];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.company", $query);
    $allPosition = array();

    if($keyword == "")
    {
      foreach($cursor as $document)
      {
        $re = object_array($document);
        $positionArr = $re['position'];
        $companyName = $re['companyName'];
        foreach($positionArr as $singlePosition)
        {
          $singlePosition['companyName'] = $companyName;
          // var_dump($singlePosition);
          array_push($allPosition,$singlePosition);
        }
      }
    }
    else
    {
      foreach($cursor as $document)
      {
        $re = object_array($document);
        $positionArr = $re['position'];
        $companyName = $re['companyName'];
        if(strpos($re['companyName'],$keyword) !== false)
        {
          foreach($positionArr as $singlePosition)
          {
            $singlePosition['companyName'] = $companyName;
            array_push($allPosition,$singlePosition);
          }
        }
        else
        {
          foreach($positionArr as $singlePosition)
          {
            if(strpos($singlePosition['positionName'],$keyword) !== false || strpos($singlePosition['city'],$keyword) !== false)
            {
              $singlePosition['companyName'] = $companyName;
              array_push($allPosition,$singlePosition);
            }
          }
        }
      }
    }

    $reArr['data'] = $allPosition;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function sendResumeF($username,$companyName,$positionName)
  {
    $reArr = array();
    $isExistUsername = findUser($username);
    $isExistCompany = findCompany($companyName);
    if($isExistUsername && $isExistCompany)
    {
      $isNotSend = notSend($username,$companyName,$positionName);
      if($isNotSend)
      {
        $manager = Manager::getManager();
        $filter = ['companyName' => $companyName];
        $options = [
          'projection' => ['_id' => 0],
        ];
        $query = new MongoDB\Driver\Query($filter,$options);
        $cursor = $manager->executeQuery("test.company", $query);
        foreach($cursor as $document)
        {
          $re = object_array($document);
          $positionArr = $re['position'];
        }
        $len = count($positionArr);
        for($i = 0;$i < $len;$i++)
        {
          $p = object_array($positionArr[$i]);
          $applicantStatus = array();
          $applicantStatus['username'] = $username;
          $applicantStatus['status'] = "已投递";
          if($positionName == $p['positionName'])
          {
            if($p['applicant'])
            {
              array_push($p['applicant'],$applicantStatus);
            }
            else
            {
              $p['applicant'] = array();
              array_push($p['applicant'],$applicantStatus);
            }
            $positionArr[$i] = $p;
            $filter = ['username' => $username];
            $options = [
              'projection' => ['_id' => 0],
            ];
            $query = new MongoDB\Driver\Query($filter,$options);
            $cursor = $manager->executeQuery("test.user", $query);
            foreach($cursor as $document)
            {
              $reUser = object_array($document);
              $resumeArr = object_array($reUser['resume']);
            }
            //var_dump($resumeArr);
            $resumeStatus = array();
            $resumeStatus['sendToCompany'] = $companyName;
            $resumeStatus['sendToPosition'] = $positionName;
            $resumeStatus['status'] = "已投递";
            if($resumeArr['status'])
            {
              array_push($resumeArr['status'],$resumeStatus);
            }
            else
            {
              $resumeArr['status'] = array();
              array_push($resumeArr['status'],$resumeStatus);
            }
            $resume = $resumeArr;
            //var_dump($resume);
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(['username' => $username],
                          ['$set' => ['resume' => $resume]],
                          ['multi' => false, 'upsert' => false]);
            $reModifyUser = $manager->executeBulkWrite('test.user',$bulk);
            break;
          }
        }
        //var_dump($positionArr);
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['companyName' => $companyName],
                      ['$set' => ['position'=> $positionArr,]],
                      ['multi' => false, 'upsert' => false]);
        $reModifyCompany = $manager->executeBulkWrite('test.company',$bulk);
        if($reModifyCompany && $reModifyUser)
        {
          $code = 0;
          $message = "success";
        }
        else
        {
          $code = -1;
          $message = "fail";
        }
      }
      else
      {
        $code = 1;
        $message = "already sent to this position";
      }
    }
    else
    {
      $code = -1;
      $message = "fail";
    }
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }
  // getCompanyDetailF("轻松筹");
  // getCompanyBriefF("区");
  getPositionBriefF("设计师");
  // sendResumeF("S.T.A.R","欧德蒙","文案策划");
 ?>
