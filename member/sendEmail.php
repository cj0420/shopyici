<?php

function sendEmail($username,$email,$token,$textType){
    $smtpserver = "smtp.163.com";    //SMTP服务器，如：smtp.163.com
    $smtpserverport = 25; //SMTP服务器端口，一般为25
    $smtpusermail = "18340804006@163.com"; //SMTP服务器的用户邮箱，如xxx@163.com
    $smtpuser = "18340804006"; //SMTP服务器的用户帐号xxx@163.com
    $smtppass = "dgjnn..456"; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //实例化邮件类
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $email; //接收邮件方，本例为注册用户的Email
    $smtpemailfrom = $smtpusermail; //发送邮件方，如xxx@163.com
    //邮件主体内容
    switch ($textType){
        case 'find':
            $emailsubject = "一次商城_用户帐号找回密码";//邮件标题
            $emailbody = "亲爱的".$username."：<br/>请妥善保管好您的密码。<br/>请点击链接找回您的密码。<br/> 
    <a href='http://localhost/testall/shopyici/member/setNewPwd.php?verify=".$token."' target= 
'_blank'>http://localhost/testall/shopyici/ui/setNewPwd.php?verify=".$token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>祝好。";

            break;
        case 'reg':
            $emailsubject = "一次商城_用户帐号激活";//邮件标题
            $emailbody = "亲爱的".$username."：<br/>感谢您在一次商城网站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
    <a href='http://localhost/testall/shopyici/member/active.php?verify=".$token."' target= 
'_blank'>http://localhost/testall/shopyici/ui/active.php?verify=".$token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>祝好。";
            break;
        case 'active':
            $emailsubject = "一次商城_用户重新激活账号";//邮件标题
            $emailbody = "亲爱的".$username."：<br/>请及时激活您的账号，以确保正常使用。<br/>请点击链接激活您的帐号。<br/> 
    <a href='http://localhost/testall/shopyici/member/active.php?verify=".$token."' target= 
'_blank'>http://localhost/testall/shopyici/ui/active.php?verify=".$token."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>祝好。";
            break;

    }
    //发送邮件
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
   return $rs;
}

?>