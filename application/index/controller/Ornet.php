<?php
namespace app\index\controller;

use think\Controller;

class Ornet extends Controller
{
    //确认付款订单页面
    public function sureorder()
    {
        return $this->fetch('order/sureorder');
    }
    
   
}
