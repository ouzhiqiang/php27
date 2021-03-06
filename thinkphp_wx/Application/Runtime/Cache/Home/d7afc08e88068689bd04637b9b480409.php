<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>tpshop管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap 3.3.4 -->
    <link href="/thinkphp_wx/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
 	<link href="/thinkphp_wx/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="/thinkphp_wx/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="/thinkphp_wx/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/thinkphp_wx/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" /> 
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->   
    <!-- jQuery 2.1.4 -->
    <script src="/thinkphp_wx/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="/thinkphp_wx/Public/js/global.js"></script>
    <script src="/thinkphp_wx/Public/js/upgrade.js"></script>
	<script src="/thinkphp_wx/Public/js/layer/layer.js"></script><!--弹窗js 参考文档 http://layer.layui.com/--> 
    <style type="text/css">
    	#riframe{min-height:inherit !important}
    </style>
  <meta name="__hash__" content="40390ff8c1de6e5b5f80bd80d3196959_ae50be8202f3f3857ef3fb3304b2b751" /></head>
<body class="skin-green-light sidebar-mini" style="overflow-y:hidden;">
<div class="wrapper">
  <header class="main-header">
      <!-- Logo -->
      <a href="/index.php/Admin/Index/index" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="/thinkphp_wx/Public/images/TP-shop_logo.png" width="40" height="30">&nbsp;&nbsp;<b>TPshop</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!--服务器升级-->
        <textarea id="textarea_upgrade" style="display:none;"></textarea>                              
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
                     <li>
              <a href="http://www.tp-shop.cn/index.php/Doc/Index/index" target="_blank">
                  <i class="fa fa-question-circle"></i>
                  <span>TPshop手册</span>
              </a>
           </li>
           <li>
              <a href="http://document.thinkphp.cn/manual_3_2.html" target="_blank">
                  <i class="fa fa-question-circle"></i>
                  <span>ThinkPHP手册</span>
              </a>
           </li>                      
           <li>
              <a href="/index.php" target="_blank">
                  <i class="glyphicon glyphicon-home"></i>
                  <span>网站前台</span>
              </a>
           </li>
           <li>
               <a target="rightContent" href="/index.php/Admin/System/cleanCache">
                   <i class="glyphicon glyphicon glyphicon-refresh"></i>
                   <span>清除缓存</span>
               </a>
           </li>      
           <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!--  <img src="/Public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                <i class="glyphicon glyphicon-user"></i>
                <span class="hidden-xs">欢迎：admin</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div class="pull-left">
                  	<a href="/index.php/Admin/Index/index" data-url="" class="btn btn-default btn-flat model-map">后台首页</a>
                   	<a href="/index.php/Admin/Admin/admin_info/admin_id/1" target="rightContent" class="btn btn-default btn-flat">修改密码</a>
                   	<a href="/index.php/Admin/Admin/logout" class="btn btn-default btn-flat">安全退出</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-street-view"></i>换肤</a></li>
          </ul>
        </div>
     </nav>
</header>
    
<script>
    
// 没有点击收货确定的按钮让他自己收货确定    

var timestamp = Date.parse(new Date());
$.ajax({
            type:'post',
            url:"/index.php/Admin/System/login_task",
            data:{timestamp:timestamp},
            timeout : 100000000, //超时时间设置，单位毫秒
            success:function(){
                // 执行定时任务
            }
        });    
</script>    

<aside class="main-sidebar" style="overflow-y:auto;">
      <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        <input type="hidden" name="__hash__" value="40390ff8c1de6e5b5f80bd80d3196959_ae50be8202f3f3857ef3fb3304b2b751" /></form>
        <!-- /.search form -->
        <ul class="sidebar-menu"> 
	      <li class="treeview">
        	    <a href="javascript:void(0)">
	              <i class="fa fa-cog"></i><span>系统设置</span><i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	            	<li onclick="makecss(this)" data-id="index_System">
	            		<a href='/index.php/Admin/System/index' target='rightContent'><i class="fa fa-circle-o"></i>网站设置</a>
	            	</li><li onclick="makecss(this)" data-id="linkList_Article">
	            		<a href='/index.php/Admin/Article/linkList' target='rightContent'><i class="fa fa-circle-o"></i>友情链接</a>
	            	</li><li onclick="makecss(this)" data-id="navigationList_System">
	            		<a href='/index.php/Admin/System/navigationList' target='rightContent'><i class="fa fa-circle-o"></i>自定义导航</a>
	            	</li><li onclick="makecss(this)" data-id="region_Tools">
	            		<a href='/index.php/Admin/Tools/region' target='rightContent'><i class="fa fa-circle-o"></i>区域管理</a>
	            	</li><li onclick="makecss(this)" data-id="right_list_System">
	            		<a href='/index.php/Admin/System/right_list' target='rightContent'><i class="fa fa-circle-o"></i>权限资源列表</a>
	            	</li>	            </ul>
        	</li><li class="treeview">
        	    <a href="javascript:void(0)">
	              <i class="fa fa-gears"></i><span>权限管理</span><i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	            	<li onclick="makecss(this)" data-id="index_Admin">
	            		<a href='/index.php/Admin/Admin/index' target='rightContent'><i class="fa fa-circle-o"></i>管理员列表</a>
	            	</li><li onclick="makecss(this)" data-id="role_Admin">
	            		<a href='/index.php/Admin/Admin/role' target='rightContent'><i class="fa fa-circle-o"></i>角色管理</a>
	            	</li><li onclick="makecss(this)" data-id="supplier_Admin">
	            		<a href='/index.php/Admin/Admin/supplier' target='rightContent'><i class="fa fa-circle-o"></i>供应商管理</a>
	            	</li><li onclick="makecss(this)" data-id="log_Admin">
	            		<a href='/index.php/Admin/Admin/log' target='rightContent'><i class="fa fa-circle-o"></i>管理员日志</a>
	            	</li>	            </ul>
        	</li><li class="treeview">
        	    <a href="javascript:void(0)">
	              <i class="fa fa-user"></i><span>会员管理</span><i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	            	<li onclick="makecss(this)" data-id="index_User">
	            		<a href='/index.php/Admin/User/index' target='rightContent'><i class="fa fa-circle-o"></i>会员列表</a>
	            	</li><li onclick="makecss(this)" data-id="levelList_User">
	            		<a href='/index.php/Admin/User/levelList' target='rightContent'><i class="fa fa-circle-o"></i>会员等级</a>
	            	</li><li onclick="makecss(this)" data-id="recharge_User">
	            		<a href='/index.php/Admin/User/recharge' target='rightContent'><i class="fa fa-circle-o"></i>充值记录</a>
	            	</li><li onclick="makecss(this)" data-id="withdrawals_User">
	            		<a href='/index.php/Admin/User/withdrawals' target='rightContent'><i class="fa fa-circle-o"></i>提现申请</a>
	            	</li><li onclick="makecss(this)" data-id="remittance_User">
	            		<a href='/index.php/Admin/User/remittance' target='rightContent'><i class="fa fa-circle-o"></i>汇款记录</a>
	            	</li>	            </ul>
        	</li><li class="treeview">
        	    <a href="javascript:void(0)">
	              <i class="fa fa-weixin"></i><span>微信管理</span><i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	            	<li onclick="makecss(this)" data-id="index_Wechat">
	            		<a href='/index.php/Admin/Wechat/index' target='rightContent'><i class="fa fa-circle-o"></i>公众号管理</a>
	            	</li><li onclick="makecss(this)" data-id="menu_Wechat">
	            		<a href='/index.php/Admin/Wechat/menu' target='rightContent'><i class="fa fa-circle-o"></i>微信菜单管理</a>
	            	</li><li onclick="makecss(this)" data-id="text_Wechat">
	            		<a href="<?php echo U(wxText);?>" target='rightContent'><i class="fa fa-circle-o"></i>文本回复</a>
	            	</li><li onclick="makecss(this)" data-id="img_Wechat">
	            		<a href='/index.php/Admin/Wechat/img' target='rightContent'><i class="fa fa-circle-o"></i>图文回复</a>
	            	</li><li onclick="makecss(this)" data-id="nes_Wechat">
	            		<a href='/index.php/Admin/Wechat/nes' target='rightContent'><i class="fa fa-circle-o"></i>组合回复</a>
	            	</li><li onclick="makecss(this)" data-id="news_Wechat">
	            		<a href='/index.php/Admin/Wechat/news' target='rightContent'><i class="fa fa-circle-o"></i>消息推送</a>
	            	</li>	            </ul>
        	</li><li class="treeview">
        	    <a href="javascript:void(0)">
	              <i class="fa fa-adjust"></i><span>模板管理</span><i class="fa fa-angle-left pull-right"></i>
	            </a>
	            <ul class="treeview-menu">
	            	<li onclick="makecss(this)" data-id="templateList?t=pc_Template">
	            		<a href='/index.php/Admin/Template/templateList/t/pc' target='rightContent'><i class="fa fa-circle-o"></i>PC端模板</a>
	            	</li><li onclick="makecss(this)" data-id="templateList?t=mobile_Template">
	            		<a href='/index.php/Admin/Template/templateList/t/mobile' target='rightContent'><i class="fa fa-circle-o"></i>手机端模板</a>
	            	</li>	            </ul>
        	</li>     
          <li class="header">帮助中心</li>
          <li><a href="http://www.tp-shop.cn/index.php/Doc/Index/index" target="_blank"><i class="fa fa-circle-o text-red"></i> <span>使用手册</span></a></li>
          <li><a href="http://www.99soubao.com/tpshop_video/video.html" target="_blank"><i class="fa fa-circle-o text-yellow"></i> <span>视频教程</span></a></li>
          <li><a href="http://document.thinkphp.cn/manual_3_2.html" target="_blank"><i class="fa fa-circle-o text-aqua"></i> <span>ThinkPHP手册</span></a></li>
        </ul>
      </section>
</aside>

<section class="content-wrapper right-side" id="riframe" style="margin:0px;padding:0px;margin-left:230px;">
    <iframe id='rightContent' name='rightContent' src="/index.php/Admin/Index/welcome" width='100%' frameborder="0"></iframe>
</section>

	<footer class="main-footer">
	   <div class="pull-right hidden-xs">
	    	 感谢使用ThinkPHP Shop开源系统<b></b>
	   </div>
	   <strong>Copyright &copy; 2015-2025 <a href="http://www.tp-shop.cn">深圳搜豹公司旗下产品</a>.</strong>保留所有权利。
	</footer>

     <!-- Control Sidebar -->
     <aside class="control-sidebar control-sidebar-dark">
       <!-- Create the tabs -->
       <!--
       <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-at"></i></a></li>
         <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
       </ul>
       -->
       <!-- Tab panes -->
       <div class="tab-content">
      	<!-- Home tab content -->
         <div class="tab-pane" id="control-sidebar-home-tab">
         </div><!-- /.tab-pane -->
         <!-- Stats tab content -->
         <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
         <!-- Settings tab content -->
         <div class="tab-pane" id="control-sidebar-settings-tab">
         </div>
       </div>
     </aside>
   <div class="control-sidebar-bg"></div>
</div>

<script src="/thinkphp_wx/Public/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/thinkphp_wx/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/thinkphp_wx/Public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/thinkphp_wx/Public/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="/thinkphp_wx/Public/dist/js/app.js" type="text/javascript"></script>
<script src="/thinkphp_wx/Public/dist/js/demo.js" type="text/javascript"></script>
 
<script type="text/javascript">
$(document).ready(function(){
	$("#riframe").height($(window).height()-100);//浏览器当前窗口可视区域高度
	$("#rightContent").height($(window).height()-100);
	$('.main-sidebar').height($(window).height()-50);
});

var tmpmenu = 'index_Index';
function makecss(obj){
	$('li[data-id="'+tmpmenu+'"]').removeClass('active');
	$(obj).addClass('active');
	tmpmenu = $(obj).attr('data-id');
}

function callUrl(url){
	layer.closeAll('iframe');
	rightContent.location.href = url;
}
    var now_num = 0; //现在的数量
    var is_close=0;
    function ajaxOrderNotice(){
        var url = '/index.php/Admin/Order/ajaxOrderNotice';
        if(is_close > 0)
            return;
        $.get(url,function(data){
            //有新订单且数量不跟上次相等 弹出提示
            if(data > 0 && data != now_num){
                now_num = data;
                if(document.getElementById('ordfoo').style.display == 'none'){
                    $('#orderAmount').text(data);
                    $('#ordfoo').show();
                }
            }
        })
//        setTimeout('ajaxOrderNotice()',5000);
    }
//setTimeout('ajaxOrderNotice()',5000);
</script>
<!-- 新订单提醒-s -->
<style type="text/css">
.fl{ float:left; margin-left:10px; margin-top:4px}
.fr{ float:right; margin-right:10px; margin-top:3px}
.orderfoods{ width:200px; border:1px solid #dedede; position:absolute; bottom:50px; z-index:999; right:10px; background-color:#00A65A;opacity:0.8;-webkit-opacity:0.8;filter:alpha(opacity=80);-moz-opacity:0.8;  }
.dor_head{ border-bottom:1px solid #dedede; height:28px; color:#FFF; font-size:12px}
.dor_head:after{ content:""; clear:both; display:block}
.dor_foot{ margin-top:6px; color:#FFF}
.dor_foot p{ padding:0 12px}
.te-in{ text-indent:2em;}
.dor_foot p span{ color:red}
.te-al-ce{ text-align:center}
</style>
<div id="ordfoo" class="orderfoods" style="">
	<div class="dor_head">
    	<p class="fl">新订单通知</p>
        <p onClick="closes();" id="close" class="fr" style="cursor:pointer">x</p>
    </div>
    <div class="dor_foot">
    	<p class="te-in">您有<span id="orderAmount">139</span>个订单待处理</p>
        <p class="te-al-ce"><a href="/index.php/Admin/Order/index" target='rightContent'><span>点击查看</span></a></p>
    </div>
</div>
<script type="text/javascript">
	function closes(){
        is_close = 1;
		document.getElementById('ordfoo').style.display = 'none';
	}
</script>
<!-- 新订单提醒-e -->
</body>
</html>