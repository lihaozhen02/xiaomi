<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ���� <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Ӧ�ù����ļ�

//��¼���ǳ�ҳ��
function userdetails($operate = [],$ter){
    $option = <<<EOT
    
            <ul class="anty">
                <li>|</li>
                <li class='ana' ><a href="">��Ϣ֪ͨ</a></li>
                <li>|</li>
                <li class='bnb' ><a href="/index/head/order" >�ҵĶ���</a></li>
           </ul>
            <div class="dropdown">
			  <a class="dropbtn">$ter</a>
			  <div class="dropdown-content">
			    <a href="/index/head/selfInfo">��������</a>
			    <a href="#">����ɹ��</a>
			    <a href="#">�ҵ�ϲ��</a>
			    <a href="/index/index/logout">�˳���¼</a>
			  </div>
			</div>
EOT;
    
    return $option;
}

function userdeta($operate = [],$ter){
    $option = <<<EOT
    
            <ul class="antys">
                <li>|</li>
                <li class='bnb' ><a href="/index/head/order" >�ҵĶ���</a></li>
           </ul>
            <div class="dropdowns">
			  <a class="dropbtns">$ter</a>
			  <div class="dropdown-contents">
			    <a href="/index/head/selfInfo">��������</a>
			    <a href="#">����ɹ��</a>
			    <a href="#">�ҵ�ϲ��</a>
			    <a href="/index/index/logout">�˳���¼</a>
			  </div>
			</div>
EOT;
    
    return $option;
}

function weilog(){
    
    $option = <<<EOT
        <ul>
        <li><a href="/index/index/deng" >��¼</a></li>
        <li>|</li>
        <li><a href="/index/index/note" >ע��</a></li>
        <li>|</li>
        <li><a href="">��Ϣ֪ͨ</a></li>
        </ul>
EOT;
    
    return $option;
}

include_once("../application/extra/CCP/SDK/CCPRestSDK.php");

/**
 * ����ģ�����
 * @param to �ֻ����뼯��,��Ӣ�Ķ��ŷֿ�
 * @param datas �������� ��ʽΪ���� ���磺array('Marry','Alon')���粻���滻���� null
 * @param $tempId ģ��Id
 */
function sendTemplateSMS($to,$datas,$tempId)
{
    //���ʺ�
    $accountSid= '8a216da8746c6ee4017471d256550288';
    
    //���ʺ�Token
    $accountToken= '6ef975b9a84e4fd1ad04667b73c297a4';
    
    //Ӧ��Id
    $appId='8a216da8746c6ee4017471d25740028f';
    
    //�����ַ����ʽ���£�����Ҫдhttps://
    $serverIP='app.cloopen.com';
    
    //����˿�
    $serverPort='8883';
    
    //REST�汾��
    $softVersion='2013-12-26';
    
    // ��ʼ��REST SDK
    //global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    // ����ģ�����
    //echo "Sending TemplateSMS to $to <br/>";
    $result = $rest->sendTemplateSMS($to,$datas,$tempId);
    if($result == NULL ) {
        //echo "result error!";
    }
    if($result->statusCode!=0) {
        //echo "error code :" . $result->statusCode . "<br>";
        //echo "error msg :" . $result->statusMsg . "<br>";
        //TODO ��Ӵ������߼�
    }else{
        //echo "Sendind TemplateSMS success!<br/>";
        // ��ȡ������Ϣ
        //$smsmessage = $result->TemplateSMS;
        //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
        return '2003T';
        //TODO ��ӳɹ������߼�
    }
    
}