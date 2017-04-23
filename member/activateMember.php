<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>校园商城-用户重新激活</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <style>
        .form-s {
            width: 300px;
            margin: auto;
            position: absolute;
            margin-top: 200px;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;

        }

        .btn {
            width: 300px;
            text-align: center;

        }

        .verify {
            width: 200px;
            float: left;
        }
        #Form input.error {
            color: #66AFE9;
        }


    </style>
</head>
<body>

<!--表单-->
<div class="form-s form-horizontal col-xs-12 col-sm-6 col-md-8">
    <form role="form" action="doActive.php" method="post" id="Form">
        <div class="form-group">

            <input type="text" class="form-control" id="username" name="username" placeholder="用户名">

        </div>
        <div class="form-group">

            <input type="password" class="form-control" id="password" name="password" placeholder="密码">

        </div>
        <div class="form-group">

            <input type="text" class="form-control verify" id="verify"  name="verify" placeholder="验证码">
            <img src="getVerify.php"  alt=""/>

        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-default">重新激活</button>

        </div>

    </form>


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


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>