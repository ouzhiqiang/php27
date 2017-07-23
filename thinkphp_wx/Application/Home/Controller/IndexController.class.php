<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function wx(){
    	// $xml = new \Think\Model('xml');
    	// $map['id'] = array('gt',1);  
     //    $list =	$xml
     //       ->field('id,group_concat(id)')
     //       ->order('id desc')
     //       ->group('id')
     //       // ->having('id')
     //  //      ->where([
     //  //       'id'=>1
    	// 	// ])
     //       ->where($map)
     //       ->select();
     //       // ->find();

     //    echo $xml->getLastSql();
    	// dump($list);
    }

    public function wxIndex(){
    	
          $this->display('Home/index');
          
    	
    }

    public function wxText(){
    	if(IS_GET){
    	  $text = M('wx_text')->field('id,keyword,text')->select();
    	  // dump($text);
    	  $this->assign('text',$text);
          $this->display('Home/text');
          
    	}
    }

    public function del_text(){
    	   $id = I('get.id');
    	   $del = M('wx_text')->where(['id'=>$id])->delete();
    	   if ($del) {
    	   	$this->success("删除成功");
    	   }else{
    	   	 $this->error("删除失败");
    	   }
    }

    public function add_text(){
    	if (IS_POST) {
    		$edit = I('get.edit');
            $add['keyword'] =  I('post.keyword');
            $add['text'] = I('post.text');
    		if (!$edit) {
    			//添加
    		  $add['createtime'] = time();
    		  $res = M('wx_text')->add($add);
    		  if ($res) {
    		  	$this->success('添加成功！');
    		  }else{
    		  	$this->error('添加失败！请重新添加');
    		  }
    		}else{
    			//编辑模式
    		    $id = I('post.kid');
    		    dump($id);
    		    $row = M('wx_text')->where(['id'=>$id])->save($add);
    		    $row ? $this->success("修改成功",U('wxText')) : $this->error("修改失败",U('wxText'));
    		}
    	}
    	$id = I('get.id');
    	if ($id) {
    		$keyword = M('wx_text')->where(['id'=>$id])->find();
    		$this->assign('keyword',$keyword);
    	}
    	
    	$this->display('Home/add_text');
    }

    


}