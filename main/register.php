<?php
include 'config.php';
include 'libs/funcs.php';
if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['pass'])) {
    include 'core/database.php';
    include 'core/customer.php';
    $cust = (new customer())->list_customer();
    $ms = '';
    $flag = true;
    if (!$_POST['name']) {
        $flag = false;
        $ms = 'Name cannot be empty. <br>';
        $thongbao = msg($ms);
    }
    if (!$_POST['email']) {
        $flag = false;
        $ms .= 'Email cannot be empty. <br>';
        $thongbao = msg($ms);
    }
    if (!$_POST['phone']) {
        $flag = false;
        $ms .= 'Phone cannot be empty. <br>';
        $thongbao = msg($ms);
    }
    if (!$_POST['address']) {
        $flag = false;
        $ms .= 'Address cannot be empty. <br>';
        $thongbao = msg($ms);
    }
    if (!$_POST['pass']) {
        $flag = false;
        $ms .= 'Password cannot be empty. <br>';
        $thongbao = msg($ms);
    }
    if ($flag) {
        foreach ($cust as $item) {
            if ($_POST['email'] = !$item->email) {

                $cust = (new customer())->add_customer($_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['pass']);
                $thongbao = msg('Register successfully', 'success');
            } else {
                $thongbao = msg('Email already registered');
            }
        }
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
    <link rel="icon" href="public/src/img/logo/LogoWeb.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <h2 class="text-center pt-5 pb-5">Emporio Armani Register</h2>
        <form class="container pt-2" method="post" enctype="multipart/form-data" style="width:500px">
            <?= $thongbao ?? '' ?>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Name" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="Email"
                    aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="Phone number"
                    aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">address</label>
                <textarea name="address" id="" cols="55" rows="2" placeholder="Address"></textarea>
            </div>
            <div class="form-group">
                <label for="">Passowrd</label>
                <input type="password" name="pass" id="" class="form-control" placeholder="**********"
                    aria-describedby="helpId">
            </div>
            <div class="form-group text-right">
                <a class="float-left" href="login.php">Login</a>
                <input type="submit" name="" id="" class="btn btn-secondary" placeholder="" aria-describedby="helpId"
                    value="Register">
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