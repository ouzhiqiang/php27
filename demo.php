<?php
include "./vendor/autoload.php";
include './wx_sample-back1.php';

$wxObj = new wechatCallbackapiTest();
$url = $wxObj->getUserInfo();