<?php
if (!isset($_GET['id']) || !$_GET['id']) {
    netx_page('index.php?view=customer_list');
}
include 'core/customer.php';
$rs = (new customer())->delete_customer($_GET['id']);
netx_page('index.php?view=customer_list');