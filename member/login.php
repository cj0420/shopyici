<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--响应式布局，第三个用于相应移动设备-->
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>校园商城-用户登录界面</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
        html,body{
            background-color: #F5F5F5;
        }
        .form-s {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            box-sizing: border-box;
            width: 320px;
            padding: 20px 30px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;

        }
        .form-group{
            width: 234px;
            margin-left: 13px!important;
        }
        .btn {
            width: 234px;
            text-align: center;
        }

        .verify {
            width: 154px;
            float: left;
        }
        .primary {
            color: #B0B0B0;
            height: 30px;

        }
        #Form input.error {
            color: #66AFE9;
        }
        .sh-box{
            height: 313px;
            width: 320px;
            margin: 100px auto auto auto;
            text-align: center;
            position: relative;
        }
        #login-logo{
            margin-bottom: 10px ;
        }

    </style>
</head>
<body>

<!--登录表单-->
<div class="sh-box">
<div class="form-s form-horizontal col-xs-12 col-sm-6 col-md-8">
    <form id="Form" role="form" action="doLogin.php" method="post">
        <img id="login-logo" src="../images/logo.png">
        <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="用户名/邮箱">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="密码">
        </div>
        <div class="form-group">
            <input type="text" class="form-control verify" id="verify"  name="verify" placeholder="验证码">
            <img src="getVerify.php"   onclick="this.src='getVerify.php?d='+Math.random();"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </form>
    <a class="primary" href="findPwd.php">忘记密码</a>
</div>
</div>
<script type="text/javascript">
    $(function () {
        //jquery.validate
        $("#Form").validate({
            focusCleanup:true,
            onkeyup :false,
            debug: true,
            submitHandler: function (form) {
                form.submit();
            },
            rules: {
                username: {
                    required: true,
                    rangelength: [3, 30]
                },
                password: {
                    required: true,
                    rangelength: [6, 30]

                },
                verify:{
                    required: true,
                    verify: true
                }

            },
            messages: {
                username: {
                    required: "用户名",
                    rangelength: $.format("长度不少于3字符")

                },
                password: {
                    required: "密码",
                    rangelength: $.format("长度不少于6字符")

                },
                verify:{
                    required: "验证码"
                }
            },
            errorPlacement: function(error, element) {   //错误信息位置设置方法
//                   element.val($(error).text()).focus(function(){$(this).val("")});      //获取焦点时清空文本框
                if($(element).hasClass('password')) {
                    document.getElementById("password").placeholder=$(error).text();
                }
            }
        });
    });
    jQuery.validator.addMethod("verify", function (value, element) {
        var verify = /^[a-zA-Z0-9]{4}$/;
        return this.optional(element) || (verify.test(value));
    }, "验证码");

</script>


<!--放在下面为了页面加载快一点-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>