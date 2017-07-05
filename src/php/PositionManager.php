<?php
if(!isset($_SESSION))
  session_start();

require_once 'checkSession.php';
require_once 'tools.php';

  function getCompanyDetail($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $id = $arr['id'];
    // session_id($id);
    // session_start();
    if($_SESSION["$id"]["caller"] == "applicant")
    {
      getCompanyDetailF($companyName,$id);
    }
    if($_SESSION["$id"]["caller"] == "hr")
    {
      if($_SESSION["$id"]["companyName"] == $companyName)
      {
        getCompanyDetailF($companyName,$id);
      }
      else return;
      // else echo "caller:".$_SESSION["$id"]["caller"];
    }
    // else echo "session".$_SESSION["$id"]["caller"];
  }
  function getCompanyBrief($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $keyword = $arr['keyword'];
    getCompanyBriefF($keyword);
  }
  function getPositionDetail($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $positionName = $arr['positionName'];
    $id = $arr['id'];
    // session_id($id);
    // session_start();
    if($_SESSION["$id"]["caller"] == "applicant")
    {
      getPositionDetailF($companyName,$positionName,$id);
    }
    if($_SESSION["$id"]["caller"] == "hr")
    {
      if($_SESSION["$id"]["companyName"] == $companyName)
      {
        getPositionDetailF($companyName,$positionName,$id);
      }
      else return;
    }
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
    $id = $arr['id'];
    $username = $arr['username'];
    $companyName = $arr['companyName'];
    $positionName = $arr['positionName'];
    $valRes = validateSession($id,$username);
    if($valRes==0)
      return;
    sendResumeF($username,$companyName,$positionName,$id);
  }

  function getCompanyDetailF($companyName,$id)
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
        $positionWithoutApplican = array();
        foreach($re['position'] as $singlePosition)
        {
          unset($singlePosition['applicant']);
          $singlePosition['companyName'] = $companyName;
          array_push($positionWithoutApplican,$singlePosition);
        }
        $re['position'] = $positionWithoutApplican;
        //unset($re['position']);
        //var_dump($document);
      }
      // var_dump($positionRe);
    }
    $reArr['data'] = $re;
    $reArr['caller'] = $_SESSION["$id"]['caller'];
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
    // $reArr['caller'] = $_SESSION["$id"]['caller'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function getPositionDetailF($companyName,$positionName,$id)
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
        foreach($re['position'] as $singlePosition)
        {
          if($singlePosition['positionName'] == $positionName)
          {
            $singlePosition['companyName'] = $companyName;
            unset($singlePosition['applicant']);
            $positionRe = $singlePosition;
          }
        }
      }
      // var_dump($positionRe);
    }
    $reArr['data'] = $positionRe;
    $reArr['caller'] = $_SESSION["$id"]['caller'];
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
          unset($singlePosition['applicant']);
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
    // $reArr['caller'] = $_SESSION["$id"]['caller'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function sendResumeF($username,$companyName,$positionName,$id)
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
    $reArr['caller'] = $_SESSION["$id"]['caller'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }
  // getCompanyDetailF("欧德蒙");
  // getCompanyBriefF("区");
  // getPositionBriefF("设计师");
  // sendResumeF("明镜止水","欧德蒙","文案策划");
  // getPositionDetailF("问卷星","高级客服");
 ?>
