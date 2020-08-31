<?php
namespace app\index\controller;

use think\Controller;

class Head extends Controller
{
    //小米手机页面
    public function liebiao()
    {
        return $this->fetch('index/liebiao');
    }
    
    //详情页面
    public function xiangqing()
    {
        return $this->fetch('index/xiangqing');
    }
}
