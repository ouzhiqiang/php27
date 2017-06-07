<?php
    
    
    include './wx_sample-back1.php';
   
    $wxObj = new wechatCallbackapiTest();
	
	// var_dump($wxObj->getUserOpenIdList() );
	$wxObj->send_message();
?>