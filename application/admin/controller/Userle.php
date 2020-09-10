<?php 
    namespace app\admin\controller;

    use think\Controller;
    use app\admin\model\UserleModel;
    
    class Userle extends Controller
    {
        //��ѯ�û���Ϣ
        /*
         *  ���ߣ������
         *  �������
         *  ʱ�䣺2020-09-08
         */
        public function index(){
            if(request()->isAjax()){
                $user = input('post.user');
                $pageNumber = empty(input('post.page')) ? 1 : input('post.page');        //��ǰ�ڼ�ҳ
                $top = input('post.top');                                                //��һҳ
                $bottom = input('post.bottom');                                          //��һҳ
                
                if(!empty($top)){
                    $pageNu = $pageNumber - $top;
                }else{
                    $pageNu = $pageNumber + $bottom;
                }
               
                //�ж��Ƿ���յ�ֵ��û��ֵ���ؿ�����
                if(!empty($user)){
                    $sent = new UserleModel();
                    
                    $pageSize = 10;
                    $fe = ($pageNu - 1) * $pageSize;
                    $limit = "$fe , $pageSize";
                    
                    $where = [
                        'username' => ["like","%$user%"]
                    ];
                    
                    $sel = $sent->showfan($where,$limit);

                    $sels = $sent->countfan($where);
                    
                    $count = count($sels);
                    $yei = ceil($count / $pageSize);
                 
                    
                    return Json(['code' => 1 , 'data' => $sel , 'datas' => $yei , 'msg' => $pageNu ]);
                }else{
                    return Json(['code' => -1 , 'data' => [] ]);
                }
            }
            return $this->fetch('user/index');
        }
        
        //��ѯ�û���Ϣ��ת�û�������༭
        public function xiangqing(){
            return $this->fetch('user/xiangqing');
        }
    }