<?php

session_start();

require_once 'tools.php';
//require_once 'Manager.php';

  function applicantRegister($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    $password = $arr['password'];
    $applicantName = $arr['applicantName'];
    applicantRegisterF($username,$password,$applicantName);
  }
  function applicantLogin($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $username = $arr['username'];
    $password = $arr['password'];
    applicantLoginF($username,$password);
  }
  function hrLogin($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $hrAccount = $arr['hrAccount'];
    $hrPassword = $arr['hrPassword'];
    hrLoginF($hrAccount,$hrPassword);
  }

  //
  // function userManager($method, $jsonS)
  // {
  //   if($methos == "applicantRegister")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $username = $arr['username'];
  //     $password = $arr['password'];
  //     $applicantName = $arr['applicantName'];
  //     applicantRegister($username,$password,$applicantName);
  //   }
  //   if($method == "applicantLogin")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $username = $arr['username'];
  //     $password = $arr['password'];
  //     applicantLogin($username,$password);
  //   }
  //   if($method == "hrLogin")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $hrAccount = $arr['hrAccount'];
  //     $hrPassword = $arr['hrPassword'];
  //     hrLogin($hrAccount,$hrPassword);
  //   }
  // }

  function applicantRegisterF($username,$password,$applicantName)
  {
    $reArr = array();
    $isExist = findUser($username);
    if($isExist)
    {
      $code = 1;
      $message = "username already exists";
    }
    else
    {
      //insert new document
      //$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
      $manager = Manager::getManager();
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->insert(['username' => $username, 'name'=> $applicantName, 'password' => $password]);
      $re = $manager->executeBulkWrite('test.user', $bulk);
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
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function applicantLoginF($username,$password)
  {
    $reArr = array();
    // $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $manager = Manager::getManager();
    // var_dump($manager);

    $filter = ['username' => $username];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.user", $query);
    $isExist = 0;
    foreach($cursor as $document)
    {
      $isExist = 1;
      $re = object_array($document);
      $passwordTrue = $re['password'];
    }
    if($isExist)
    {
      if($password == $passwordTrue)
      {
        $code = 0;
        $message = "success";
        $_SESSION['username'] = $username;
        $_SESSION['identity'] = "user";
      }
      else
      {
        $code = -1;
        $message = "password wrong";
      }
    }
    else
    {
      $code = 1;
      $message = "username does not exist";
    }
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function hrLoginF($hrAccount,$hrPassword)
  {
    $reArr = array();
    $manager = Manager::getManager();
    $filter = ['hrAccount' => $hrAccount];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.company", $query);
    $isExist = 0;
    foreach($cursor as $document)
    {
      $isExist = 1;
      $re = object_array($document);
      $passwordTrue = $re['hrPassword'];
    }
    if($isExist)
    {
      if($hrPassword == $passwordTrue)
      {
        $code = 0;
        $message = "success";
        $_SESSION['username'] = $hrAccount;
        $_SESSION['identity'] = "hr";
      }
      else
      {
        $code = -1;
        $message = "password wrong";
      }
    }
    else
    {
      $code = 1;
      $message = "hr account does not exist";
    }
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  //pplicantLoginF("明镜止水","12345678");
  //hrLoginF("董小姐","oudmon123");

 ?>
