<?php
session_destroy();
setcookie('src_', false, 0);
setcookie('name_', '', 0);
next_page('login.php');