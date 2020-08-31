<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    //Ä¬ÈÏ½øÈëÒ³Ãæ
    public function index()
    {
        return $this->fetch('index/index');
    }
    
    //µÇÂ¼
    public function deng()
    {
        return $this->fetch('index/login');
    }
    
    //×¢²á
    public function note()
    {
        return $this->fetch('index/register');
    }
}
