<?php
// +----------------------------------------------------------------------
// | layerIM + workerman + ThinkPHP5 即时通讯
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: NickBai <1902822973@qq.com>
// +----------------------------------------------------------------------
namespace app\index\controller;


use GatewayClient\Gateway;


use think\Controller;

class Index extends Controller
{
	public function _initialize()
	{
        header("Access-Control-Allow-Origin:*");
        header("Content-type:application/json;charset='utf-8'");
        
	    
	    $uname = input('param.token');
		if( empty(cookie('uid')) && empty($uname) ){
			$this->redirect( url('login/index'), 302 );
		}
        $this->user_img  = '/static/admin/images/a3.jpg';
        $this->admin_img = '/static/admin/images/a5.jpg';
	}
	
    //对话列表
    public function getchat()
    {
        $kefu_id = input('kefu_id',1);
        $cid = intval(input('visiter_id', 0));
        if(empty($cid)){
            $result = db('chatlog')->field("*")->where("toid={$kefu_id} and type='friend' and needsend=0 and id IN (SELECT MAX(id) FROM after_chatlog where id<{$cid} GROUP BY fromid)")
                ->order('id desc')
                ->limit(2)
                ->select();
        }else{
            $result = db('chatlog')->field("*")->where("toid={$kefu_id} and type='friend' and needsend=0 and id IN (SELECT MAX(id) FROM after_chatlog GROUP BY fromid)")
                ->order('id desc')
                ->limit(2)
                ->select();
        }


        if( empty($result) ){
            return json( ['code' => 1, 'data' => ''] );
        }   
        $data = [];
        foreach ($result as $vo){
            
            $temp['content'] = $vo['content'];
            $temp['last_timestamp'] = $vo['timeline'];
            $temp['state']   =  'online';//online  offline
            $temp['visiter_name'] = $vo['fromname'];
            $temp['visiter_id'] = $vo['fromid'];
            $temp['vid'] = $vo['id'];
            $temp['from_url'] =  'web';
            $temp['ip'] =  '39.191.197.117';
            $temp['count'] =  0;
            $temp['avatar'] = $vo['fromavatar'];
                
            $data[] = $temp;
            // $data[] = $temp;
            $data[] = $temp;
            $data[] = $temp;
        }

        return json( ['code' => 0, 'data' => $data, 'num'=>count($data)]);
    }
    
    //对话列表
    public function getwait()
    {
        $kefu_id = input('kefu_id',2);
        
        $result = db('chatlog')->where("(toid={$kefu_id}) and type='friend' and needsend=1")
            ->order('timeline desc')
            ->group("fromid")
            ->limit(10)
            ->select();

        if( empty($result) ){
            return json( ['code' => 1, 'data' => ''] );
        }   
        $last_names = array_column($result,'timeline');
        array_multisort($last_names,SORT_ASC,$result);

        $data = [];
        foreach ($result as $vo){
            
            $temp['content'] = $vo['content'];
            $temp['last_timestamp'] = $vo['timeline'];
            $temp['state']   =  'offline';
            $temp['c_count'] =  'readed';
            $temp['channel'] =  '663663230323066383932';
            $temp['visiter_name'] = $vo['fromname'];
            $temp['visiter_id'] = $vo['fromid'];
            $temp['vid'] = $vo['id'];
            $temp['from_url'] =  'web';
            $temp['ip'] =  '39.191.197.117';
            $temp['count'] =  2;
            $temp['avatar'] = $vo['fromavatar'];
                
            $data[] = $temp;
        }

        return json( ['code' => 0, 'data' => $data, 'num'=>count($data)]);
    }
	
	
    public function list()
    {
        $uname = input('param.token');
        if(!empty($uname)){
            cookie( 'uid', null);
            cookie( 'username', null);
            cookie( 'avatar', null);
            cookie( 'sign', null);
            $userinfo = db('chatuser')->where('username', $uname)->find();
            //不存在就注册
            if(empty($userinfo)){
                db('chatuser')->insert(['username'=>$uname,'pwd'=>md5(123456)]);
                $userinfo = db('chatuser')->where('username', $uname)->find();
            }
        	//设置为登录状态
        	db('chatuser')->where('username', $uname)->setField('status', 'online');
        	
        	cookie( 'uid', $userinfo['id'] );
        	cookie( 'username', $userinfo['username'] );
            cookie( 'avatar', $userinfo['avatar'] );
            cookie( 'sign', $userinfo['sign'] );
        }
    	$mine = db('chatuser')->where('id', cookie('uid'))->find();
    	$this->assign([
    			'uinfo' => $mine,
                'user_img' => $this->admin_img
    	]);
        return $this->fetch();
    }
    
    //对话列表
    public function listdlg()
    {
        $uid = input('uid',2);
        $kefu_id = input('kefu_id',1);
        $cid = intval(input('hid', 0));
        if(!empty($cid)){
            $result = db('chatlog')->where("((fromid={$uid} and toid={$kefu_id}) or (fromid={$kefu_id} and toid={$uid})) and type='friend' and id<{$cid}")
                ->order('timeline desc')
                ->limit(10)
                ->select();
        }else{
            $result = db('chatlog')->where("((fromid={$uid} and toid={$kefu_id}) or (fromid={$kefu_id} and toid={$uid})) and type='friend'")
                ->order('timeline desc')
                ->limit(10)
                ->select();
        }


        if( empty($result) ){
            return json( ['code' => -1, 'data' => '', 'msg' => '没有记录'] );
        }
                
        $last_names = array_column($result,'timeline');
        array_multisort($last_names,SORT_ASC,$result);

        $data = [];
        foreach ($result as $vo){
            $temp['cid'] = $vo['id'];
            $temp['visiter_id'] = $vo['toid'];
            $temp['service_id'] = $vo['fromid'];
            $temp['business_id'] = uniqid();
            $temp['content'] = $vo['content'];
            $temp['timestamp'] = $vo['timeline'];
            
            $temp['state'] =  'readed';
            
            if($uid==$vo['toid']){
                $temp['direction'] = 'to_service';
            }else{
                $temp['direction'] = 'to_visiter';
            }
            
            $temp['avatar'] = $vo['fromavatar'];
                
            $data[] = $temp;
            
        }

        return json( ['code' => 0, 'data' => $data]);
    }
	
    //上传图片
    public function uploadImg()
    {
        $file = request()->file('upload');
        if( $file->getInfo()['size'] > 3145728){
            // 上传失败获取错误信息
            return json( ['code' => -2, 'msg' => '文件超过3M', 'data' => ''] );
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $src =  '/uploads' . '/' . date('Ymd') . '/' . $info->getFilename();
            return json( ['code' => 0, 'msg' => '', 'data' => ['src' =>$src] ] );
        }else{
            // 上传失败获取错误信息
            return json( ['code' => -1, 'msg' => $file->getError(), 'data' => ''] );
        }
    }

    //上传文件
    public function uploadFile()
    {
        $file = request()->file('folder');

        if( $file->getInfo()['size'] > 3145728){
            // 上传失败获取错误信息
            return json( ['code' => -2, 'msg' => '文件超过3M', 'data' => ''] );
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $src =  '/uploads' . '/' . date('Ymd') . '/' . $info->getFilename();
            return json( ['code' => 0, 'msg' => '', 'data' => ['src' => $src ] ] );
        }else{
            // 上传失败获取错误信息
            return json( ['code' => -1, 'msg' => $file->getError(), 'data' => ''] );
        }
    }
	
    //聊天记录详情
    public function history()
    {
        $uid = input('uid',2);
        $kefu_id = input('kefu_id',1);
        $cid = intval(input('hid', 0));
        if(!empty($cid)){
            $result = db('chatlog')->where("((fromid={$uid} and toid={$kefu_id}) or (fromid={$kefu_id} and toid={$uid})) and type='friend' and id<{$cid}")
                ->order('timeline desc')
                ->limit(10)
                ->select();
        }else{
            $result = db('chatlog')->where("((fromid={$uid} and toid={$kefu_id}) or (fromid={$kefu_id} and toid={$uid})) and type='friend'")
                ->order('timeline desc')
                ->limit(10)
                ->select();
        }


        if( empty($result) ){
            return json( ['code' => -1, 'data' => '', 'msg' => '没有记录'] );
        }
                
        $last_names = array_column($result,'timeline');
        array_multisort($last_names,SORT_ASC,$result);

        $data = [];
        foreach ($result as $vo){
            $temp['cid'] = $vo['id'];
            $temp['visiter_id'] = $vo['toid'];
            $temp['service_id'] = $vo['fromid'];
            $temp['business_id'] = uniqid();
            $temp['content'] = $vo['content'];
            $temp['timestamp'] = $vo['timeline'];
            
            $temp['state'] =  'readed';
            
            if($uid==$vo['toid']){
                $temp['direction'] = 'to_service';
            }else{
                $temp['direction'] = 'to_visiter';
            }
            
            $temp['avatar'] = $vo['fromavatar'];
                
            $data[] = $temp;
            
        }

        return json( ['code' => 0, 'data' => $data]);
    }
    

    //getanswer
    public function getanswer()
    {
        header("Access-Control-Allow-Origin:*");
        header("Content-type:application/json;charset='utf-8'");
        
        $d = '{"qid":185,"business_id":"4e48a3da3a9b529de87fde05e5b1bf94","question":"请点击查看（售后问题如收到的货有破损、货发错了、质量问题等）","answer":"<p>亲亲，您好，麻烦您拍下您收到的商品照片，这边核实后给您回复，请耐心等待。<\/p>","answer_read":"亲亲，您好，麻烦您拍下您收到的商品照片，这边核实后给您回复，请耐心等待。"}';
        $d = json_decode($d,true);
        return json( ['code' => 0, 'msg'=>'success','data' => $d]);
    }
	
	//history
    public function msg()
    {
        $uid     = input('param.uid');
        $kefu_id = input('param.kefu_id');
        $msg     = input('param.content');
        $avatar  = input('param.avatar');
        
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值(ip不能是0.0.0.0)
        Gateway::$registerAddress = '127.0.0.1:2236';
        
        $type = "friend";
       $chat_message = [
            'message_type' => 'chatMessage',
            'data' => [
                'username' => cookie('username'),
                'avatar'   => $avatar,
                'id'       => $uid,
                'type'     => $type,
                'content'  => ($msg),
                'timestamp'=> time()*1000,
            ]
       ];
       //聊天记录数组
       $param = [
           'fromid' => $uid,
           'toid' => $kefu_id,
           'fromname' => cookie('username'),
           'fromavatar' =>$avatar,
        //   'content' => htmlspecialchars($msg),
            'content'  => ($msg),
           'timeline' => time(),
           'needsend' => 0
       ];

       switch ($type) {
           // 私聊
           case 'friend':
               // 插入
               $param['type'] = 'friend';
               if( empty( Gateway::getClientIdByUid( $uid.$kefu_id ) ) ){
                   $param['needsend'] = 1;  //用户不在线,标记此消息推送
               }
               db('chatlog')->insert($param);
               //发送给好友  
               echo (Gateway::sendToUid($uid.$kefu_id, json_encode($chat_message)));
               
               //客户列表推送
               echo (Gateway::sendToUid($kefu_id, json_encode($chat_message)));
       }
        
        echo '{"code":0,"msg":"success"}';
        exit;
    }
	
	
    public function chat()
    {
        $uname = input('param.token',54126);
        if(!empty($uname)){
            cookie( 'uid', null);
            cookie( 'username', null);
            cookie( 'avatar', null);
            cookie( 'sign', null);
            $userinfo = db('chatuser')->where('username', $uname)->find();
            //不存在就注册
            if(empty($userinfo)){
                db('chatuser')->insert(['username'=>$uname,'pwd'=>md5(123456)]);
                $userinfo = db('chatuser')->where('username', $uname)->find();
            }
        	//设置为登录状态
        	db('chatuser')->where('username', $uname)->setField('status', 'online');
        	
        	cookie( 'uid', $userinfo['id'] );
        	cookie( 'username', $userinfo['username'] );
            cookie( 'avatar', $userinfo['avatar'] );
            cookie( 'sign', $userinfo['sign'] );
        }
    	$mine = db('chatuser')->where('id', cookie('uid'))->find();
    	$uname = input('param.kefu_id', 123);
    	$kefu_info = db('chatuser')->where('username', $uname)->find();
    	$this->assign([
    			'uinfo' => $mine,
    			'kefu_info' => $kefu_info,
                'user_img' => $this->admin_img
    	]);
        return $this->fetch();
    }
    


    
    
    public function index()
    {
        $uname = input('param.token');
        if(!empty($uname)){
            cookie( 'uid', null);
            cookie( 'username', null);
            cookie( 'avatar', null);
            cookie( 'sign', null);
            $userinfo = db('chatuser')->where('username', $uname)->find();
            //不存在就注册
            if(empty($userinfo)){
                db('chatuser')->insert(['username'=>$uname,'pwd'=>md5(123456)]);
                $userinfo = db('chatuser')->where('username', $uname)->find();
            }
        	//设置为登录状态
        	db('chatuser')->where('username', $uname)->setField('status', 'online');
        	
        	cookie( 'uid', $userinfo['id'] );
        	cookie( 'username', $userinfo['username'] );
            cookie( 'avatar', $userinfo['avatar'] );
            cookie( 'sign', $userinfo['sign'] );
        }
    	$mine = db('chatuser')->where('id', cookie('uid'))->find();
    	$this->assign([
    			'uinfo' => $mine,
                'user_img' => $this->admin_img
    	]);
        return $this->fetch();
    }
    
    //获取列表
    public function getList()
    {
    	//查询自己的信息
        $mine = db('chatuser')->where('id', cookie('uid'))->find();
        $user = db('chatuser')->select();

        $group[] = [ 'groupname' => '客服列表', 'id' => 1, 'online' => false, 'list' => [] ];
        foreach ($user as $key => $val)
        {
            if ($val['id'] !== $mine['id']) {
                $group[0]['list'][] = [
                    'username' => $val['username'],
                    'id' => $val['id'],
                    'status' => $val['status'],
                    'avatar' => $this->admin_img
                ];
            }
            
        }
        //组合返回数据
        $return = [
            'code' => 0,
            'msg'=> '',
            'data' => [
                'mine' => [
                    'username' => $mine['username'],
                    'id' => $mine['id'],
                    'status' => $mine['status'],
                    'avatar' => $this->admin_img,
                    'sign'  =>'目前客服列表是所有已注册用户'
                ],
                'friend' => $group,//分组
                'group' => ''
            ],
        ];

        return json( $return );

    }
    

}
