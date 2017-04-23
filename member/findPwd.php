<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>校园商城-用户重置密码</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
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
        .img{
            border:#B0B0B0 solid 1px;
        }

        .primary {
            color: #B0B0B0;
            height: 30px;

        }


    </style>
</head>
<body>

<!--表单-->
<div class="form-s form-horizontal col-xs-12 col-sm-6 col-md-8">
    <form role="form" action="doFindPwd.php" method="post">
        <div class="form-group">

            <input type="text" class="form-control" id="firstname" name="email" placeholder="邮箱">

        </div>
        <div class="form-group">

            <input type="text" class="form-control verify" id="firstname"  name="verify" placeholder="验证码">
            <img src="getVerify.php"  alt=""/>

        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-default">申请重置密码</button>

        </div>

    </form>


</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>