<?php 
include './wx_sample-back1.php';
include './vendor/autoload.php';

$wechatObj = new wechatCallbackapiTest();
$imgurl = $wechatObj->getQrCode();

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" /> 
	<title>获取微信二维码</title>
	</head>
	<body>
      <img src="<?php echo $imgurl ?>">
	</body>
</html>