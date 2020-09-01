<?php 
    namespace app\admin\controller;

    use think\Controller;
    
    class Userle extends Controller
    {
        public function index(){
            return $this->fetch('user/index');
        }
    }