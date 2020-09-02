//登录ajax提交
$('#denglu').click(function () {
    var naDname = $('#naDname').val();
    var naDpass = $('#naDpass').val();
    var vicode = $('#vicode').val();
    
    function sioxn(){
    	$("#text").css({'color':'#f56600'});
    	$(".imgst").css({'display':'block'});
    }
    
    //判断账号密码验证码不能为空
    if (!naDname){
        $("#text").text('账号不能为空');
        sioxn();
    }else if(!naDpass){
        $("#text").text('密码不能为空');
        sioxn();
    }else if (!vicode){
        $("#text").text('验证码不能为空');
        sioxn();
    }else{


    $.ajax({
        type:'post',
        url:'/index/index/deng',
        data:{ajname:naDname,ajpass:naDpass,ajcode:vicode},
        dataType:'json',
        success:function(tesr){
            if(tesr.code == -1){
                $("#text").text(tesr.data);
                sioxn();
            }else if (tesr.code == -2){
                $("#text").text(tesr.data);
                sioxn();
            }else if (tesr.code == -3){
                $("#text").text(tesr.data);
                $("#vicode").val('');	//验证码清空
                $(".tinVso").click();	//验证码图刷新
                sioxn();
            }else {
                $("#text").text(tesr.data);
            }
        }
    })
    }
})