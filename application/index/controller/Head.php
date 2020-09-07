<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Base;

class Head extends Base
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
    
    //个人中心页面
    public function selfInfo()
    {
        return $this->fetch('index/self_info');
    }
    
    //订单页面
    public function order()
    {
        return $this->fetch('index/dingdanzhongxin');
    }
    
    //购物车页面
    public function shopping()
    {
        return $this->fetch('index/gouwuche');
    }
}
