<?php

session_start();

require_once 'tools.php';
//require_once 'Manager.php';

  function insertCompanyInfo($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $data = $arr['data'];
    insertCompanyInfoF($companyName,$data);
  }
  function setCompanyInfo($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $data = $arr['data'];
    setCompanyInfoF($companyName,$data);
  }
  function setPosition($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $data = $arr['data'];
    setPositionF($companyName,$data);
  }
  function dropPosition($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    $positionName = $arr['positionName'];
    dropPositionF($companyName,$positionName);
  }
  function getPosition($jsonS)
  {
    $arr = json_decode($jsonS,true);
    $companyName = $arr['companyName'];
    getPositionF($companyName);
  }

  // function companyInfoManager($method, $jsonS)
  // {
  //   if($method == "insertCompanyInfo")
  //   {
  //     $arr = json_decode($jsonS,true);
  //     $companyName = $arr['companyName'];
  //     $data = $arr['data'];
  //     insertCompanyInfo($companyName,$data);
  //   }
  // }

  function insertCompanyInfoF($companyName,$data)
  {
    $reArr = array();
    $isExist = findCompany($companyName);
    if($isExist)
    {
      $code = 1;
      $message = "company name already exists";
    }
    else
    {
      $logo = "1.png";
      $picture = "1001.png";
      $dataArr = json_decode($data,true);
      $manager = Manager::getManager();
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->insert(['companyName' => $dataArr['companyName'],
                     'companyInfoBrief'=> $dataArr['companyInfoBrief'],
                     'companyTag' => $dataArr['companyTag'],
                     'companyInfoDetail' => $dataArr['companyInfoDetail'],
                     'type' => $dataArr['type'],
                     'financing' => $dataArr['financing'],
                     'province' => $dataArr['province'],
                     'city' => $dataArr['city'],
                     'location' => $dataArr['location'],
                     'size' => $dataArr['size'],
                     'website' => $dataArr['website'],
                     'logo' => $logo,
                     'picture' => $picture,
                     'hrAccount' => $dataArr['hrAccount'],
                     'hrPassword' => $dataArr['hrPassword'],
                     'dealingRate' => $dataArr['dealingRate'],
                     'evaluateNum' => $dataArr['evaluateNum']]);
      // var_dump($dataArr);
      $re = $manager->executeBulkWrite('test.company',$bulk);
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
    $reArr['caller'] = $_SESSION['identity'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function setCompanyInfoF($companyName,$data)
  {
    $reArr = array();
    $isExist = findCompany($companyName);
    if($isExist)
    {
      $dataArr = json_decode($data,true);
      $manager = Manager::getManager();
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->update(['companyName' => $companyName],
                    ['$set' => ['companyInfoBrief'=> $dataArr['companyInfoBrief'],
                                'companyTag' => $dataArr['companyTag'],
                                'companyInfoDetail' => $dataArr['companyInfoDetail'],
                                'type' => $dataArr['type'],
                                'financing' => $dataArr['financing'],
                                'province' => $dataArr['province'],
                                'city' => $dataArr['city'],
                                'location' => $dataArr['location'],
                                'size' => $dataArr['size'],
                                'website' => $dataArr['website'],
                                'dealingRate' => $dataArr['dealingRate'],
                                'evaluateNum' => $dataArr['evaluateNum']]],
                    ['multi' => false, 'upsert' => false]);
      // var_dump($dataArr);
      $re = $manager->executeBulkWrite('test.company',$bulk);
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

  function setPositionF($companyName,$data)
  {
    $reArr = array();
    $isExist = findCompany($companyName);
    if($isExist)
    {
      //$dataArr = json_decode($data,true);
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
        $positionRe = $re['position'];
      }
      if($positionRe)
      {
        //array_push($positionRe,$data);
        array_push($positionRe,json_decode($data));
      }
      else
      {
        $positionRe = array();
        array_push($positionRe,json_decode($data));
      }
      $bulk = new MongoDB\Driver\BulkWrite;
      $bulk->update(['companyName' => $companyName],
                    ['$set' => ['position'=> $positionRe]],
                    ['multi' => false, 'upsert' => false]);
      //var_dump($positionArr);
      $re = $manager->executeBulkWrite('test.company',$bulk);
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

  function dropPositionF($companyName,$positionName)
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
        $positionRe = $re['position'];
      }
      // var_dump($positionRe);
      if($positionRe)
      {
        //$PositionArr = json_decode($jsonS,true);
        $dropLine = -1;
        for($i = 0;$i < count($positionRe);$i++)
        {
          $positionInfo = $positionRe[$i];
          //var_dump($positionInfo);
          //$positionArr = json_decode($positionInfo,true);
          if($positionInfo['positionName'] == $positionName)
          {
            $dropLine = $i;
          }
        }
        if($dropLine == -1)
        {
          // 该公司没有发布这个名字的职务
          $code = -1;
          $message = "fail";
        }
        else
        {
          array_splice($positionRe,$dropLine,1);
          // var_dump($positionRe);
          $bulk = new MongoDB\Driver\BulkWrite;
          $bulk->update(['companyName' => $companyName],
                        ['$set' => ['position'=> $positionRe]],
                        ['multi' => false, 'upsert' => false]);
          $re = $manager->executeBulkWrite('test.company',$bulk);
          if($re)
          {
            $code = 0;
            $message = "success";
          }
          else
          {
            // 迷之原因插入失败
            $code = -1;
            $message = "fail";
          }
        }
      }
      else
      {
        // 该公司没有任何发布职务
        $code = -1;
        $message = "fail";
      }
    }
    else
    {
      // 没有这个公司
      $code = -1;
      $message = "fail";
    }
    $reArr['code'] = $code;
    $reArr['message'] = $message;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = urldecode(json_encode($reArr));
    echo $obj;
  }

  function getPositionF($companyName)
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
      $positionRe = array();
      foreach($cursor as $document)
      {
        $re = object_array($document);
        // unset($re['position']['applicant']);
        foreach($re['position'] as $singlePosition)
        {
          unset($singlePosition['applicant']);
          array_push($positionRe,$singlePosition);
        }
      }
      // var_dump($positionRe);
    }
    $reArr['data'] = $positionRe;
    $reArr['caller'] = $_SESSION['identity'];
    $obj = json_encode($reArr,JSON_UNESCAPED_UNICODE);
    echo $obj;
    //var_dump(json_decode($obj));
  }

  // $companyName = $_POST['companyName'];
  // $data = $_POST['data'];
  // $positionName = $_POST['positionName'];
  // setPositionF($companyName,$data);
  // dropPositionF("欧德蒙","java工程师");
  // dropPositionF($companyName,$positionName);
  // getPositionF("欧德蒙");

 ?>
