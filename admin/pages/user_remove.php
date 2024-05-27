<?php
if (!isset($_GET['id']) || !$_GET['id']) {
    netx_page('index.php?view=user_list');
}
include 'core/user.php';
$rs = (new user())->delete($_GET['id'], $_SESSION['login_us']);
netx_page('index.php?view=user_list');