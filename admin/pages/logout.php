<?php
session_destroy();
setcookie('src', false, 0);
setcookie('name', '', 0);
netx_page('login.php');