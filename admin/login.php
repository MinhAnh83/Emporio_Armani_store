<?php
include 'config.php';
include 'libs/funcs.php';
//kiem tra cookie
if (isset($_COOKIE['src']) && $_COOKIE['src']) {
    $_SESSION['login_status'] = true;
    $_SESSION['login_name'] =  $_COOKIE['name'];
    $_SESSION['login_avt'] =  $_COOKIE['avt'];
    $_SESSION['login_us'] =  $_COOKIE['us'];
}
//kiem tra dang nhap
if (is_login()) {
    netx_page('index.php');
}
if (isset($_POST['user'], $_POST['pass'])) {
    include 'core/database.php';
    include 'core/user.php';
    $user = (new user())->login($_POST['user'], $_POST['pass']);
    if ($user) {
        //kiem tra trang thai
        if ($user->status == 1) {
            $_SESSION['login_status'] = true;
            $_SESSION['login_name'] = $user->name;
            $_SESSION['login_avt'] = $user->image;
            $_SESSION['login_us'] = $user->username;
            $_SESSION['login_mail'] = $user->email;
            $_SESSION['login_phone'] = $user->phone;

            //luu cookie
            if (isset($_POST['remember']) && $_POST['remember'] == 1) {
                $time = time() + 86400;
                setcookie('src', true, $time);
                setcookie('name', $_SESSION['login_name'], $time);
                setcookie('avt', $_SESSION['login_avt'], $time);
                setcookie('us', $_SESSION['login_us'], $time);
            }
            netx_page('index.php');
        } else {
            $thongbao = msg('Account has been locked');
        }
    } else {
        $thongbao = msg('Invalid login information');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Armani || Admin</title>

    <!-- Site favicon -->
    <link rel="icon" href="public/LogoWeb.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="public/tem/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="public/tem/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="public/tem/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.php">
                    <img src="public/tem/src/images/em.png">
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="public/tem/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary"><img src="public/tem/src/images/em.png"
                                    style="width: 300px;"></h2>
                        </div>
                        <?= $thongbao ?? '' ?>
                        <form method="post">
                            <div class="input-group custom">
                                <input name="user" type="text" class="form-control form-control-lg"
                                    placeholder="Username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input name="pass" type="password" class="form-control form-control-lg"
                                    placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input name="remember" type="checkbox" class="custom-control-input"
                                            id="customCheck1" value="1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="public/tem/vendors/scripts/core.js"></script>
    <script src="public/tem/vendors/scripts/script.min.js"></script>
    <script src="public/tem/vendors/scripts/process.js"></script>
    <script src="public/tem/vendors/scripts/layout-settings.js"></script>
</body>

</html>