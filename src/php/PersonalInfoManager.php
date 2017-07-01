<?php

session_start();

require_once 'tools.php';

  function setResume($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    $data = $arr['data'];
    setResumeF($username,$data);
  }
  function getResume($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    //$caller = $arr['caller'];
    getResumeF($username);
  }
  function getResumeStatus($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    getResumeStatusF($username);
  }
  // function personalInfoManagerF($method,$jsonS)
  // {
  //   if($method == "setResume")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $username = $arr['username'];
  //     $data = $arr['data'];
  //     setResume($username,$data);
  //   }
  //   if($method == "getResume")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $username = $arr['username'];
  //     $caller = $arr['caller'];
  //     getResume($username,$caller);
  //   }
  // }

  function setResumeF($username,$data)
  {
    $reArray = array();
    $isExist = findUser($username);
    if($isExist)
    {
      $manager = Manager::getManager();
      $bulk = new MongoDB\Driver\BulkWrite;
      $dataArr = json_decode($data,true);
      $bulk->update(['username' => $username],
                    ['$set' => ['resumeName' => $dataArr['resumeName'],
                                'resume' => $dataArr]],
                    ['multi' => false, 'upsert' => false]);
      $re = $manager->executeBulkWrite('test.user',$bulk);
      if($re)
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
    $reArr['caller'] = $_SESSION['identity'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function getResumeF($username)
  {
    $caller = $_SESSION['identity'];
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
        $data = $re['resume'];
      }
      // var_dump($data);
      // var_dump(json_decode($data,true));
    }
    $reArr['data'] = $data;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

  function getResumeStatusF($username)
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
        $resumeData = $re['resume'];
      }
      //$resumeArr = json_decode($resumeData,true);
      $resumeArr = $resumeData;
      $data = $resumeArr['status'];
    }
    $reArr['data'] = $data;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
  }

// getResumeF("明镜止水","hr");
// $username = $_POST['username'];
// $data = $_POST['data'];
// setResumeF($username,$data);
// getResumeStatusF("明镜止水");

 ?>