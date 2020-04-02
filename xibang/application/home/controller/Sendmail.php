<?php
namespace app\home\controller;

use app\home\controller\Common;

use app\home\controller\PHPMailer;

use app\home\controller\SMTP;

use app\home\controller\Exception;

class Sendmail extends Common{
    public function index(){
        $info = input('post.');
        if(isset($info) && !empty($info)){
            // dump($info);die;
            $toUser = $info['toUser'];
            $title = $info['title'];
            $content = $info['content'];
            $mail = new PHPMailer(true);
            // dump($mail);
            try{
                $mail->CharSet = 'UTF-8';//设定邮箱编码
                $mail->SMTPDebug = 0;//调试模式输出
                $mail->isSMTP();//使用SMTP
                $mail->Host = 'smtp.qq.com';//smtp服务器
                $mail->SMTPAuth = true;//允许smtp认证
                $mail->Username = '179705140@qq.com';//邮箱用户名
                $mail->Password = 'tnkktxypiutebjfj';//SMTP密码或者授权码
                $mail->Port = 25;//服务器端口

                $mail->setFrom('179705140@qq.com','cb');//发件人
                $mail->addAddress("$toUser",'xiao');//收件人
                $mail->Subject = $title;
                $mail->Body = $content;
                // echo 666;die;
                $mail->send();

                $msg = '邮件发送成功';
                echo $msg;die;
                // $this->success('','index/');
                // $flag = 1;
            }catch(Exception $e){
                $msg = '邮件发送失败'. $mail->ErrorInfo;
                // $flag = 0;
            }
        }else{
            $msg = '请提交信息';
            // $flag = 0;
        }
        
        $this->assign('msg',$msg);
        // $this->assign('flag',$flag);
        return $this->fetch();
    }
}