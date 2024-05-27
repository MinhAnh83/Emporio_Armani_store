<?php
//kiem tra du lieu dau vao
if (!isset($_GET['id']) || !$_GET['id']) {
    netx_page('index.php?view=product_list');
}
include 'core/product.php';
$rs = (new product())->delete_product($_GET['id']);
netx_page('index.php?view=product_list');