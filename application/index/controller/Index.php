<?php
namespace app\index\controller;
use  smtp;
use think\Request;
class Index
{
    // 属性

    //构造函数
    public function __construct()
    {
        
    }
    //邮件发送测试
    public function index(Request $request = null )
    {
        if($request->isPost()){//提交信息执行邮件发送   需要3参数  
            $mail = new \smtp\smtp();
            $data = $request->param();
            $res = $mail->sendmail($data['toemail'], config('mail')['mail_user_mail'],$data['title'] ,$data['content'],config('mail')['mail_type']);
            if($res)
            {
                echo "<div style='width:300px; margin:36px auto;'>";
                echo "success";
                echo "<a href='index.html'>return top</a>";
                echo "</div>";
            }else{
                echo "<div style='width:300px; margin:36px auto;'>";
                echo "error";
                echo "<a href='index.html'>return top</a>";
                exit();
        }
      }else{
          return view('index');
      }

    }
}
