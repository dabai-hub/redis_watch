<?php
/**
 * Created by PhpStorm.
 * User: lhh
 * Date: 2018/10/12
 * Time: 16:02
 */
function sendEmail($str,$subject,$body){
    if(empty($str)||empty($subject)||empty($body)){
        return false;
    }
    $smtpserver = $GLOBALS['mailConf']['smtpserver'];//SMTP服务器
    $smtpserverport = $GLOBALS['mailConf']['smtpserverport'];//SMTP服务器端口
    $smtpusermail = $GLOBALS['mailConf']['smtpusermail'];//SMTP服务器的用户邮箱
    $smtpemailto = $str;//发送给谁
    $smtpuser = $GLOBALS['mailConf']['smtpuser'];//SMTP服务器的用户帐号
    $smtppass = $GLOBALS['mailConf']['smtppass'];//SMTP服务器的用户密码
    $mailsubject = $subject;//邮件主题
    $mailbody = $body;//邮件内容
    $mailtype = $GLOBALS['mailConf']['mailtype']; //邮件格式（HTML/TXT）,TXT为文本邮件
    $smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug = false;//是否显示发送的调试信息
    $res = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
    return $res;
}
