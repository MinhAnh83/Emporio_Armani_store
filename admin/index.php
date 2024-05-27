<?php
include 'config.php';
include 'libs/funcs.php';
include 'core/database.php';
if (!is_login())
	netx_page('login.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?= include 'widgets/header.php' ?>
</head>

<body>
    <?= include 'widgets/menu.php'; ?>
    <?php
	$view  = $_GET['view'] ?? 'home';
	$path = 'pages/' . $view . '.php';
	if (file_exists($path))
		include $path;
	else
		netx_page('404.php');
	?>
    <!-- js -->
    <?= include 'widgets/script.php' ?>
</body>

</html>
<?php
ob_end_flush();
?>