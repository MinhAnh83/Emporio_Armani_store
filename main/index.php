<?php
include 'config.php';
include 'libs/funcs.php';
include 'core/database.php';
?>
<!doctype html>
<html lang="en">
<?php include 'widgets/head.php' ?>

<body>
    <?php include 'widgets/menu.php' ?>

    <div class="container-fluid px-0">
        <?php
        $view  = $_GET['view'] ?? 'home';
        $path = 'pages/' . $view . '.php';
        if (file_exists($path))
            include $path;
        else
            next_page('404.php');
        ?>
        <!--Footer-->
        <?php include 'widgets/footer.php' ?>
    </div>

    <?php include 'widgets/js.php' ?>
    <!--jquery-->

</body>

</html>
<?php
ob_end_flush();
?>