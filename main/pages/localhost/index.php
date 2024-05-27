<?php
function connect($servername, $username, $password, $dbname)
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
if (isset($_POST['user'], $_POST['pass'])) {
    # code...
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conn = connect('localhost', 'root', '', 'armani');
    // $sql = 'SELECT * FROM user WHERE Username =' . $user . ' and Password =' . $pass.'';
    $sql = "SELECT * FROM `user` WHERE Username = '$user' and Password = '$pass'";
    $result = $conn->query($sql)->rowCount();
    if ($result == 1) {
        header('location: home.php ');
    } else echo "Erro";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập hệ thống</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="">
    <?= $thongbao ?? '' ?>
    <form method="post" style="width: 30%;" class="container justify-content-center">
        <h3 class="text-center mt-4">Đăng Nhập</h3>
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input type="text" name="user" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="nho" id="" value="1">
                Ghi nhớ đăng nhập
            </label>
        </div>
        <div class="form-group text-right">
            <input type="submit" id="" class="btn btn-success btn-sm" value="Đăng nhập" aria-describedby="helpId">
        </div>
    </form>
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