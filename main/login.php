<?php
include 'config.php';
include 'libs/funcs.php';
//kiem tra cookie
if (isset($_COOKIE['src_']) && $_COOKIE['src_']) {
    $_SESSION['login_status_'] = true;
    $_SESSION['login_name'] =  $_COOKIE['name_'];
    $_SESSION['login_us'] =  $_COOKIE['us_'];
    $_SESSION['login_id'] =  $_COOKIE['id_'];
}
// kiem tra dang nhap
if (is_login()) {
    next_page('index.php');
}
if (isset($_POST['user'], $_POST['pass'])) {
    include 'core/database.php';
    include 'core/customer.php';
    $customer = (new customer())->login($_POST['user'], $_POST['pass']);
    if ($customer) {
        //kiem tra trang thai
        if ($customer->status == 1) {
            $_SESSION['login_status_'] = true;
            $_SESSION['login_name'] = $customer->name;
            $_SESSION['login_us'] = $customer->email;
            $_SESSION['login_phone'] = $customer->phone;
            $_SESSION['login_id'] = $customer->id;
            $_SESSION['login_add'] = $customer->address;

            //luu cookie
            if (isset($_POST['remember']) && $_POST['remember'] == 1) {
                $time = time() + 86400;
                setcookie('src_', true, $time);
                setcookie('name_', $_SESSION['login_name'], $time);
                setcookie('us_', $_SESSION['login_us'], $time);
                setcookie('id_', $_SESSION['login_id'], $time);
            }
            next_page('index.php');
        } else {
            $thongbao = msg('Account has been locked');
        }
    } else {
        $thongbao = msg('Invalid login information');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Armani || Offcial Online Store</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="public/src/img/logo/LogoWeb.png">
</head>

<body style="background-image: url('public/src//img/bg.jpg'); font-family:Georgia, 'Times New Roman', Times, serif">
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php?view=home">Emprorio Armani</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="register.php">Register<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <h2 class="text-center pt-5 pb-5">Emporio Armani Login</h2>
        <form class="container pt-5" method="post" enctype="multipart/form-data" style="width:500px">
            <?= $thongbao ?? '' ?>
            <div class="form-group">
                <label for="">Usermane</label>
                <input type="text" name="user" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Passowrd</label>
                <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group text-right">
                <label class="float-left pr-2" for="customCheck1">Remember login</label>
                <input class="float-left mt-1" name="remember" type="checkbox" id="customCheck1" value="1">
                <a class="float-left pl-5" href="">Register</a>
                <input type="submit" name="" id="" class="btn btn-secondary" placeholder="" aria-describedby="helpId"
                    value="Login">
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
ob_end_flush();
?>