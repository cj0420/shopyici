<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>****-用户注册界面</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="css/reg-css.css"/>
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
<style>
    html{
        background-color: #F5F5F5;
    }
    .btn-default{
        margin-bottom: 15px;

    }
    .form-group{
        width: 234px;
        margin-left: 13px!important;
    }
    #verify{
        width: 154px;
        float: left;
    }
    #login-logo{
        margin-bottom: 20px;
    }
</style>
</head>
<body>

<!--登录表单-->
<div class="form-s form-horizontal col-xs-12">
    <form id="msform" role="form" action="doReg.php" method="post">
        <img id="login-logo" src="../images/logo.png">
        <ul id="progressbar">
            <li class="active">创建用户</li>
            <li>选择学校</li>
            <li>确认邮箱</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">创建用户</h2>
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
            </div>
            <div class="form-group">
                <input type="password" class="form-control " id="password" name="password" placeholder="密码">
            </div>
            <div class="form-group">
                <input type="password" class="form-control " id="repassword" name="repassword" placeholder="确认密码">
            </div>
            <input type="button" name="next" class="next action-button" value="下一步"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">确认学校</h2>
            <select id="province" data-width="90%" data-size="5" class="selectpicker"
                    data-live-search="true">
                <option>北京</option>
            </select>
            <select id="city" data-width="90%" data-size="5" class="selectpicker "
                    data-live-search="true">
                <option>北京</option>
            </select>
            <select id="university" data-width="90%" data-size="5" class="selectpicker "
                    data-live-search="true">
                <option>清华大学</option>
            </select>
            <input type="button" name="previous" class="previous action-button" value="上一步"/>
            <input type="button" name="next" class="next action-button" value="下一步"/>
        </fieldset>

        <fieldset>
            <h2 class="fs-title">确认邮箱</h2>
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input type="text" class="form-control verify" id="verify" name="verify" placeholder="验证码">
                <img src="getVerify.php" onclick="this.src='getVerify.php?d='+Math.random();"/>
            </div>
            <input type="button" name="previous" class="previous action-button" value="上一步"/>
            <input type="submit" name="submit" class="submit action-button" value="注册"/>
        </fieldset>
    </form>
</div>

<script type="text/javascript">
    $(function () {
        //jquery.validate
        $("#Form").validate({
            focusCleanup: true,
            onkeyup: false,
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
                repassword: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                verify: {
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
                repassword: {
                    required: "确认密码",
                    equalTo: "两次密码输入不一致"
                },
                email: {
                    required: "E-mail",
                    email: "E-mail"
                },
                verify: {
                    required: "验证码"
                }
            },
            errorPlacement: function (error, element) {   //错误信息位置设置方法
//                   element.val($(error).text()).focus(function(){$(this).val("")});      //获取焦点时清空文本框
                if ($(element).hasClass('password')) {
                    document.getElementById("password").placeholder = $(error).text();
                } else if ($(element).hasClass('repassword')) {
                    document.getElementById("repassword").placeholder = $(error).text();
                }
            }
        });
    });
    jQuery.validator.addMethod("verify", function (value, element) {
        var verify = /^[a-zA-Z0-9]{4}$/;
        return this.optional(element) || (verify.test(value));
    }, "验证码");

</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/zzsc.js" type="text/javascript"></script>
</body>
</html>