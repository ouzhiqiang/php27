<?php 
// var_dump($_GET);
include './wx_sample-back1.php';
include './vendor/autoload.php';
include './db.php';

$wechatObj = new wechatCallbackapiTest();
$userinfo = $wechatObj->getOpenid();
dump($userinfo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
<h1>LOGIN PAGE</h1>	
</body>
</html>