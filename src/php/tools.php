<?php

require_once 'Manager.php';

  //convert object to array
  function object_array($array)
  {
    if(is_object($array))
    {
      $array = (array)$array;
    }
    if(is_array($array))
    {
      foreach($array as $key=>$value)
      {
          $array[$key] = object_array($value);
        }
      }
      return $array;
    }

    //to see if the username exists
    function findUser($username)
    {
      $manager = Manager::getManager();
      //var_dump($manager);
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
        // $arr = object_array($document);
        // $password = $arr['password'];
        // echo $password;
      }
      return $isExist;
  // 1是真 0是假 1是有了不能用 0是没有可以用
  }

  function findCompany($companyName)
  {
    $manager = Manager::getManager();
    $filter = ['companyName' => $companyName];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.company", $query);
    $isExist = 0;
    foreach($cursor as $document)
    {
      $isExist = 1;
    }
    return $isExist;
  }

  function notSend($username,$companyName,$positionName)
  {
    $manager = Manager::getManager();
    //var_dump($manager);
    $filter = ['username' => $username];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.user", $query);
    $isNotSend = 1;
    foreach($cursor as $document)
    {
      $re = object_array($document);
      $resumeStatusArr = $re['resume']['status'];
    }
    foreach($resumeStatusArr as $rsArr)
    {
      if($rsArr['sendToCompany'] == $companyName && $rsArr['sendToPosition'] == $positionName)
      {
        $isNotSend = 0;
      }
    }
    return $isNotSend;
  }

  function getCompanyLogo($companyName)
  {
    $manager = Manager::getManager();
    //var_dump($manager);
    $filter = ['companyName' => $companyName];
    $options = [
      'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter,$options);
    $cursor = $manager->executeQuery("test.company", $query);
    foreach($cursor as $document)
    {
      $re = object_array($document);
      $logo = $re['logo'];
    }
    return $logo;
  }
    // echo getCompanyLogo("欧德蒙");
  // echo notSend("明镜止水","欧德蒙","文案策划");

 ?>
