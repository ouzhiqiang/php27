<?php

include './wx_sample-back1.php';
include './vendor/autoload.php';
include './db.php';

/**
  * wechat php test
  */

//define your token
define("TOKEN", "csxdl2017");
$wechatObj = new wechatCallbackapiTest();
// var_dump($wechatObj);
 $wechatObj->menuArrjson();
//  var_dump($wechatObj->getUserOpenIdList()) ;
// echo $wechatObj->getUserOpenIdList();
// $wechatObj->send_message();
if ($_GET['echostr'])
{
	$wechatObj->valid();

}
else
{
	$wechatObj->responseMsg();

}

$wechatObj->valid();
