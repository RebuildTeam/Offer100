<?php
if(!isset($_SESSION))
  session_start();

require_once 'checkSession.php';
require_once 'tools.php';

  function getResumeList($jsonS)
  {
    $arr = json_decode($jsonS,true);
   $id = $arr['id'];
   $companyName = $arr['companyName'];
   $prStatus = $arr['prStatus'];
     //validate whether the user is a hr
   if($_SESSION["$id"]['caller']!='hr')
     return;
   getResumeListF($companyName,$prStatus,$id);
  }
  function replyResume($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $id = $arr['id'];
    $companyName = $arr['companyName'];
    $username = $arr['username'];
    $positionName = $arr['positionName'];
    $reply = $arr['reply'];
    $comment = $arr['comment'];
    //validate whether the user is a hr
    // if($_SESSION["$id"]['caller']!='hr')
    // {
    //   echo "wrong";
    //   return;
    // }
    if($_SESSION["$id"]['companyName']!=$companyName)
    {
      echo "wrong".$_SESSION["$id"]['companyName'];
      return;
    }
      // return;
    replyResumeF($companyName,$username,$positionName,$reply,$comment,$id);
  }

  function getResumeListF($companyName,$prStatus,$id)
  {
    $reArr = array();
    $prList = array();
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
        $positionArr = $re['position'];
      }
      $positionNum = count($positionArr);
      for($i = 0;$i < $positionNum;$i++)
      {
        $pArr = array();
        // var_dump($positionArr[$i]['positionName']);
        $pArr['positionName'] = $positionArr[$i]['positionName'];
        if($positionArr[$i]['applicant'])
        {
          $applicantNum = count($positionArr[$i]['applicant']);
          if($prStatus == "")
          {
            //all
            for($j = 0;$j <$applicantNum;$j++)
            {
              $pArr['status'] = $positionArr[$i]['applicant'][$j]['status'];
              $pArr['username'] = $positionArr[$i]['applicant'][$j]['username'];
              $pArr['resume'] = getPR($positionArr[$i]['applicant'][$j]['username']);
              array_push($prList,$pArr);
            }
          }
          else
          {
            $newApplicantArr = array();
            for($j = 0;$j <$applicantNum;$j++)
            {
              if($positionArr[$i]['applicant'][$j]['status'] == $prStatus)
              {
                //array_push($newApplicantArr,$positionArr[$i]['applicant'][$j]);
                $pArr['status'] = $positionArr[$i]['applicant'][$j]['status'];
                $pArr['username'] = $positionArr[$i]['applicant'][$j]['username'];
                $pArr['resume'] = getPR($positionArr[$i]['applicant'][$j]['username']);
                array_push($prList,$pArr);
              }
            }
          }
        }
        // $pArr['applicant'] = $positionArr[$i]['applicant'];
        // var_dump($pArr);
      }
      // var_dump($prList);
    }
    else
    {
      $code = -1;
      $message = "fail";
    }
    $reArr['data'] = $prList;
    $reArr['caller'] = $_SESSION["$id"]['caller'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function replyResumeF($companyName,$username,$positionName,$reply,$comment,$id)
  {
    $reArr = array();
    $isExistUsername = findUser($username);
    $isExistCompany = findCompany($companyName);
    if($isExistUsername && $isExistCompany)
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
      $positionNum = count($positionArr);
      for($i = 0;$i < $positionNum;$i++)
      {
        $applicantNum = count($positionArr[$i]['applicant']);
        if($positionArr[$i]['positionName'] == $positionName)
        {
          for($j = 0;$j <$applicantNum;$j++)
          {
            if($positionArr[$i]['applicant'][$j]['username'] == $username)
            {
              $nowStatus = nextStatus($positionArr[$i]['applicant'][$j]['status'],$reply);
              $positionArr[$i]['applicant'][$j]['status'] = $nowStatus;
              //$positionArr[$i]['applicant'][$j]['status'] = nextStatus($positionArr[$i]['applicant'][$j]['status'],$reply);
              //上面还没完
              $manager = Manager::getManager();
              $filter = ['username' => $username];
              $options = [
                'projection' => ['_id' => 0],
              ];
              $query = new MongoDB\Driver\Query($filter,$options);
              $cursor2 = $manager->executeQuery("test.user", $query);
              foreach($cursor2 as $document2)
              {
                $re2 = object_array($document2);
                $resumeStatusArr = $re2['resume']['status'];
                // var_dump($resumeStatusArr);
                for($k = 0;$k < count($resumeStatusArr);$k++)
                // foreach($resumeStatusArr as $resumeData)
                {
                  $resumeData = $resumeStatusArr[$k];
                  if($resumeData['sendToCompany'] == $companyName && $resumeData['sendToPosition'] == $positionName)
                  {
                    // echo 1;
                    // var_dump($positionName);
                    $resumeData['status'] = $nowStatus;
                    if($reply == 0)
                    {
                      $resumeData['result'] = "通过";
                    }
                    else
                    {
                      $resumeData['result'] = "未通过";
                    }
                    $resumeData['comment'] = $comment;
                    $companyNo = $k;
                  }
                  $resumeStatusArr["$k"] = $resumeData;
                  // var_dump($resumeData);
                }
                // var_dump($resumeStatusArr["$companyNo"]);
                // var_dump($companyNo);
                // if($companyNo >= 0)
                // {
                //   $resumeStatusArr["$companyNo"] = $resumeData;
                // }
                // var_dump($resumeStatusArr);
              }
              $re2['resume']['status'] = $resumeStatusArr;
              // var_dump($re['resume']);

              $manager = Manager::getManager();
              $bulk = new MongoDB\Driver\BulkWrite;
              $bulk->update(['username' => $username],
                            ['$set' => ['resume' => $re2['resume']]],
                            ['multi' => false, 'upsert' => false]);
              $reUser = $manager->executeBulkWrite('test.user',$bulk);
            }
          }//this!!!!!
        }
      }
      // var_dump($positionArr[2]);
      $manager = Manager::getManager();
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->update(['companyName' => $companyName],
                    ['$set' => ['position' => $positionArr]],
                    ['multi' => false, 'upsert' => false]);
      $reCompany = $manager->executeBulkWrite('test.company',$bulk);
      if($reUser && $reCompany)
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
      $code = -1;
      $message = "fail";
    }
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $reArr['caller'] = $_SESSION["$id"]['caller'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function nextStatus($nowStatus,$reply)
  {
    if($nowStatus == "已投递")
    {
      if($reply == "0")
      {
        return "通过";
      }
      else
      {
        return "未通过";
      }
    }
    elseif ($nowStatus == "已审阅")
    {
      if($reply == "0")
      {
        return "通过";
      }
      else
      {
        return "未通过";
      }
    }
    else
    {
      return "通过";
    }
  }

  function getPR($username)
  {
    $isExist = findUser($username);
    if($isExist)
    {
      $manager = Manager::getManager();
      $filter = ['username' => $username];
      $options = [
        'projection' => ['_id' => 0],
      ];
      $query = new MongoDB\Driver\Query($filter,$options);
      $cursor = $manager->executeQuery("test.user", $query);
      foreach($cursor as $document)
      {
        $re = object_array($document);
        unset($re['resume']['status']);
        $data = $re['resume'];
      }
      // var_dump($data);
      // var_dump(json_decode($data,true));
    }
    return $data;
  }

  // getResumeListF("欧德蒙","");
  // replyResumeF("欧德蒙","明镜止水","软件测试工程师","-1","不符合");
  // replyResumeF("欧德蒙","明镜止水","java工程师","0","好");

 ?>
