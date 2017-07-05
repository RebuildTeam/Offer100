<?php
function generateSession($username,$caller){
    $id = md5(sha1(uniqid(mt_rand(),1)));
    session_id($id);
    session_start();
    // if(!isset($_SESSION))
    //     session_start();
    // $id = session_id();
    // just for debug
    // echo $id;
    $info = array(
        "username" => $username,
        "caller" => $caller
    );
    $_SESSION["$id"] = $info;
    return $id;
}
function generateHrSession($hrAccount,$caller,$companyName){
  $id = md5(sha1(uniqid(mt_rand(),1)));
  session_id($id);
  session_start();
  // if(!isset($_SESSION))
  //     session_start();
  // $id = session_id();
  // just for debug
  // echo $id;
  $info = array(
      "username" => $username,
      "caller" => $caller,
      "companyName" => $companyName
  );
  $_SESSION["$id"] = $info;
  return $id;
}
function destroySession($id){
    unset($_SESSION["$id"]);
}
function getIdentity($id){
  return $_SESSION["$id"]["caller"];
}
function validateSession($id,$username){
        if($_SESSION["$id"]["username"] == $username)
            return 1;
        return 0;
}
// generateSession("mahao","hr");
// $id = session_id();
// echo validateSession($id,"s");
?>
