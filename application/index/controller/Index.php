<?php
namespace app\index\controller;

use app\index\model\Dengmodel;
use think\Controller;
use think\session;

class Index extends Controller
{
    //默认进入页面
    public function index()
    {
        return $this->fetch('index/index');
    }
    
    //登录
    public function deng()
    {
        if (request()->isAjax()){
            $vicode = input('ajcode');  //验证码
            
			if(!captcha_check($vicode) ){
			    return Json(['code' => -3 , 'data' => '验证码错误']);   //验证码错误
			}else{
			    $naDuser = input('ajname');  //账号
			    $naDpass = input('ajpass');  //密码
			    
			    $where = [
			        'username' => $naDuser
			    ];
			    
			    $whereht = [
			        'username' => trim($naDuser),
			        'password' => trim(md5($naDpass.config('salt')))
			    ];
			    
			    
			    $sent= new Dengmodel();
			    $res = $sent->mylogin($where);		//判断用户名是否存在
			    $res2 = $sent->mylogin($whereht);	//判断用户名或密码是否正确
			    
			    if(empty($res)){
			        return Json(['code' => -1 , 'data' => '用户名不存在']);                  //用户名不存在
			    }else if(empty($res2)){
			        return Json(['code' => -2 , 'data' => '用户名或密码不正确，请重新输入']);    //用户名或密码不正确，请重新输入
			    }else{
			        session('phone',$naDuser);      //写入seesion
			        return Json(['code' => 1 , 'data' => '登录成功！']);   //登录成功！
			    }
			}
        }
        return $this->fetch('login/login');
    }
    
    //注册
    public function note()
    {
        return $this->fetch('note/register');
    }
}
