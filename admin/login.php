<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员登录</title>
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<div class="logoBar login_logo">
    <div class="comWidth">
        <div class="logo  fl "><a href="../index.php"><img src="images/logo.png" alt="YICI"></a></div>
        <div class="title fl"><a href="../index.php">一次商城</a></div>
        <h4 class="welcome_title">欢迎登录</h4>
    </div>
</div>
<div class="loginBox">
    <div class="login_cont">
        <form action="doLogin.php" method="post">
        <ul class="login">
            <li class="l_tit">用户名</li>
            <li>
                <input type="text" class="login_input" name="username">
            </li>
            <li class="l_tit">密码</li>
            <li>
                <input type="password" class="login_input" name="password">
            </li>
            <li class="l_tit">验证码</li>
            <li class="yzm">
                <input type="text" class=" yzm_input" name="verify">
                <img src="getVerify.php" alt="" />
            </li>
            <li class="check_box">
                <input type="checkbox" id="a1" class="checked">
                <label for="a1">自动登录</label>
            </li>
            <li>
                <input type="submit" class="login_btn register_btn" value="登录">
            </li>
        </ul>
        </form>
    </div>
</div>
</div>
<div class="footer">
    <p><a href="#">联系我们</a><a href="#">联系我们</a><a href="#">联系我们</a><a href="#">联系我们</a></p>
    <p>哈哈哈哈哈哈哈哈哈</p>
</div>

<body>
</body>
</html>
