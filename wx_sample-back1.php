<?php


/**
  * wechat php test
  */

//define your token
define("TOKEN", "cs2017");
$wechatObj = new wechatCallbackapiTest();
// var_dump($wechatObj);
$wechatObj->menuArrjson();
//  var_dump($wechatObj->getUserOpenIdList()) ;
// echo $wechatObj->getUserOpenIdList();
$wechatObj->send_message();
if ($_GET['echostr'])
{
	$wechatObj->valid();

}
else
{
	$wechatObj->responseMsg();

}

$wechatObj->valid();


    

class wechatCallbackapiTest
{   

    public $appid = "wx4cdb3fde292f995e";
    public $appsecret = "7f8707798a6ed841ef5d9421de496100";
	
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {   
        
		//get post data, May be due to the different environments
		$postStr = file_get_contents('php://input');
        // $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
      	//extract post data
        

      // 使用 Medoo 类 把xml数据写入数据库
        // include './db.php';
        // $data = array(
        //     'xml' => $postStr,
        // );
        // $database->insert('xml', $data);

        // 使用 Medoo 类 把xml数据写入数据库
        include './db.php';
        $data = array(
            'xml' => $postStr,
        );
        $database->insert('xml', $data);

        if (!empty($postStr)) {
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            // Disable the ability to load external entities
            libxml_disable_entity_loader(true);

            // 接收到微信服务器发送过来的xml数据：分为：时间、消息，按照 msgType 分，转换为对象
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            $tousername = $postObj->ToUserName;
            $fromusername = $postObj->FromUserName;
            $msgtype = $postObj->MsgType;
            $keyword = trim($postObj->Content);

            // 图文  -》 返回图文列表    其他任何关键   默认
            if ($msgtype == 'text') {
                // 判断关键字，根据关键字来自定义回复的消息
                if ($keyword == "图文") {
                    // php + mysql    读取数据库 拿到文章列表的数据
                    $arr = array(
                        array(
                            'title' => "套路太深！唯品会对清空微博作出解释 网友：这广告6到飞",
                            'date' => "2017-6-2",
                            'url' => "http://www.chinaz.com/news/quka/2017/0602/715449.shtml",
                            'description' => '日前，唯品会清空了官方微博，成功的引起了众人的注意。',
                            'picUrl' => "http://upload.chinaz.com/2017/0602/6363201407728157524057839.jpeg"
                        ),
                        array(
                            'title' => "刘强东章泽天向中国人民大学捐赠3亿 设人大京东基金",
                            'date' => "2017-6-2",
                            'url' => "http://www.chinaz.com/news/2017/0602/715434.shtml",
                            'description' => '京东集团创始人、董事局主席兼首席执行官及京东集团今天下午在中国人民大学宣布',
                            'picUrl' => "http://upload.chinaz.com/2017/0602/6363201407728157524057839.jpeg"
                        ),
                        array(
                            'title' => "高通发布 QC 4+ 快充技术，让努比亚 Z17 当了一次“业界领先”",
                            'date' => "2017-6-2",
                            'url' => "http://www.chinaz.com/mobile/2017/0602/715429.shtml",
                            'description' => '充电 5 分钟，通话 2 小时这句广告词',
                            'picUrl' => "http://upload.chinaz.com/2017/0602/6363201407728157524057839.jpeg"
                        )
                    );
                    $textTpl = <<<EOT
                                <xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>%s</ArticleCount>
                                <Articles>
EOT;

                    $str = "";
                    foreach ($arr as $v) {
                        $str .= "<item>";
                        $str .= "<Title><![CDATA[" . $v['title'] . "]]></Title>";
                        $str .= "<Description><![CDATA[" . $v['description'] . "]]></Description>";
                        $str .= "<PicUrl><![CDATA[" . $v['picUrl'] . "]]></PicUrl>";
                        $str .= "<Url><![CDATA[" . $v['url'] . "]]></Url>";
                        $str .= "</item>";
                    }

                    $textTpl .= $str;
                    $textTpl .= "</Articles></xml>";

                    $time = time();
                    $msgtype = 'news';
                    $nums = count($arr);

                    // Return a formatted string
                    $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $nums);
                    echo $retStr;
                }

                // 接收到的关键字：美女，返回美图图片
                if ($keyword == "美女") {
                    $textTpl = <<<EOT
                                <xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Image>
                                <MediaId><![CDATA[%s]]></MediaId>
                                </Image>
                                </xml>
EOT;
                    $time = time();
                    $msgtype = 'image';
                    $mediaid = 'wKZPWtjIYPDZypx6tDkJDEs4JkLOQdgRM4u700VjRthfV1h6YCpLqM4kmuESfyBc';

                    $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $mediaid);
                    echo $retStr;
                }
            

            // 天气预报：天气+广州
            if(substr($keyword,0,6) == '天气'){
                $city = substr($keyword, 6 ,strlen($keyword));
                $str = $this->getWeather($city);
                //发送天气信息
                $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";
                $time = time();
                $msgtype = 'text';
                $content = $str;
                /*
                    广州今天的天气信息：\n
                    温度：\n
                    气候：\n
                    适宜：\n
                    2017-6-5
                     */
                 $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $content);
                 // var_dump($retStr);
                 echo $retStr;   

            }
        if ($keyword == '测试') {
                // 发送天气的消息
                $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
                $time = time();
                $msgtype = 'text';
                $content = '<a href="'.$this->getUserInfo().'">测试</a>';
                $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $content);
                echo $retStr;
                }

        }

            // 判断是否发生了事件推送
            if ($msgtype == 'event') {
                $event = $postObj->Event;
                // 订阅事件
                if ($event == 'subscribe')
                {
                    // 订阅后，发送的文本消息
                    $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";
                    $time = time();
                    $msgtype = 'text';
                    $content = "欢迎来到PHP27，请输入美女，查看图片(有效期仅限今天)";

                    $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $content);
                    echo $retStr;
                }
                // 点击菜单的时间推送
                if ($event == 'CLICK' )
                {
                  // 判断到底是哪一个菜单
                  $key = $postObj->EventKey;

                  switch ($key) {
                        case '20000':
                            $content = "您点击的是图文列表菜单";
                            break;
                        case '30000':
                            $content = "您点击的是关于我们菜单";
                            break;
                        case '40000':
                            $content = "您点击的是帮助信息菜单";
                            break;
                        
                        default:
                            $content = "不存在菜单";
                            break;
                    } 
                    $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";
                    $time = time();
                    $msgtype = 'text';

                    $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $content);
                    echo $retStr;

                }

            }

            $time = time();
            $msgtype = $postObj->MsgType;
            $content = "欢迎来到微信公众号的开发世界！__GZPHP27";

            /*
            <xml>
            <ToUserName><![CDATA[toUser]]></ToUserName>
            <FromUserName><![CDATA[fromUser]]></FromUserName>
            <CreateTime>12345678</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[你好]]></Content>
            </xml>
            */
            // 发送消息的xml模板：文本消息
            $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";

            $time = time();
            $msgtype = 'text';
            $content = "欢迎来到微信公众号的开发世界！__GZPHP27";

            // Return a formatted string
            $retStr = sprintf($textTpl, $fromusername, $tousername, $time, $msgtype, $content);
            echo $retStr;

        } else {
            echo "";
            exit;
        }


    }
		
	private function checkSignature()
	{
        /*
        1）将token、timestamp、nonce三个参数进行字典序排序
        2）将三个参数字符串拼接成一个字符串进行sha1加密
        3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
         */
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = TOKEN;
		
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}



    /*
     * curl请求，获取返回的数据
     * */
    public function getData($url,$data = null)
    {
        // 1. cURL初始化
        $ch = curl_init();

        // 2. 设置cURL选项
        /*
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        */
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        
    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 

        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // 3. 执行cURL请求
        $ret = curl_exec($ch);

        // 4. 关闭资源
        curl_close($ch);

        return $ret;
    }

    /*
     * JSON 转化为数组
     * */
    public function jsonToArray($json)
    {
        $arr = json_decode($json, 1);
        return $arr;
    }

    public function getAccessToken(){
        // redis  memcache SESSION
        session_start();

        if ($_SESSION['access_token'] && (time()-$_SESSION['expire_time']) < 7000 )
        {
            return $_SESSION['access_token'];
        } else {
            $appid = $this->appid;
            $appsecret = $this->appsecret;

            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
            $access_token = $this->jsonToArray($this->getData($url))['access_token'];

            // 写入SESSION
            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = time();
            return $access_token;
        }
    }

    public function menuArrjson(){
          $access_token = $this->getAccessToken();
          $list = array(
      
              'button' => array(
                   array(
                    "type" => "click",
                    "name" => "图文列表",
                    "key" => "20000"
                    ),
                   array(           
                    "name" => "下拉菜单",
                    "sub_button" => array(
                         array(
                            "type" => "click",
                            "name" => "关于我们",
                            "key" => "30000"
                            ),
                         array(
                            "type" => "click",
                            "name" => "歌曲",
                            "key" => "40000"
                            ),
                         array(
                            "type" => "view",
                            "name" => "我的商城",
                            "url" => "https://kdt.im/Kok8Nr"
                            )
                        )
                    ),
                   array(
                    "type" => "view",
                    "name" => "so搜索",
                    "url" => "http://www.soso.com/"
                    )
                )

            ); 
           $arr=json_encode($list,JSON_UNESCAPED_UNICODE);
             // var_dump($arr);  
    
           $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
           $result = $this->getData($url, $arr);
           // var_dump($result);
           // echo $result;
    }

    public function getWeather($city)
    {
           $appkey = '3d92eb3623d5cc1ec6c85f596cc58054';
           // url
           $url = "http://v.juhe.cn/weather/index?format=2&cityname=".$city."&key=".$appkey;
           return $this->getData($url); 
    }

    public function getUserOpenIdList()
    {
           $url =  "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$this->getAccessToken();
           return $this->getData($url);
    }

    // 网页授权的接口，获取用户信息
    public function getUserInfo()
    {
        $appid = $this->appid;
        $redirect_uri = urlencode('http://http://39.108.104.19/login.php');
        $scope = 'snsapi_userinfo';
        // $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=".$scope."&state=STATE#wechat_redirect";
        header('location:' . $url);
    }

    public function geiIp()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$this->getAccessToken();
        return $this->getData($url);
    }


	// 发送客服消息  
	public function send_message()
	{  

		$appid = $this->appid;
		$appsecret = $this->appsecret;  
		$Useropenid= $this->getUserOpenIdList();               
		// echo $Useropenid;
	    $openidList = json_decode($Useropenid);
	    // echo '<pre>';
	    // var_dump($lose) ;
	    $openid = $openidList->data->openid;
	    // var_dump($openid);  		 
		$access_token = $this->getAccessToken();
		// echo $access_token;
		//判断是否关注  
		// $subscribe_msg = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token."&openid=".$openid;  
		// $subscribe = json_decode(file_get_contents($subscribe_msg));  
		// $gzxx = $subscribe->subscribe;  
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;  
		$content = '您好,'.$info['name'].'恭喜您报名成功！';  
		$message = '{  
		    "touser":"'.$openid[1].'",           
		    "msgtype":"text",  
		    "text":  
		    {  
		         "content":"'.$content.'"  
		    }  
		}';  
        echo $message;
		$token_info  = $this->getData($url,$message);  
		$final = json_decode($token_info);  
		return $final;  
	}
}

?>