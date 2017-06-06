<?php
    
    echo '123sdf';
    include './wx_sample-back1.php';
    // include './vendor/autoload.php';
    echo 111;
    $wxObj = new wechatCallbackapiTest();
	var_dump($wxObj);
	// // echo 123;
	var_dump($wxObj->getUserOpenIdList() );
	$wxObj->send_message();
?>