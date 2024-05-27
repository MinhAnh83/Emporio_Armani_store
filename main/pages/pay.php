<?php
include './core/order.php';
$cus_id = $_SESSION['login_id'] ?? '';
$total = $_SESSION['sum'] ?? '';
$order = (new order())->add_order($cus_id, $total);
$find = (new order())->find_order($cus_id, $total);
$a = $find->id;
// check_array($a);
// die();
for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
    $product_name = $_SESSION['cart'][$i][0];
    $qty = $_SESSION['cart'][$i][3];
    $detail = (new order())->order_detail($a, $product_name, $qty);
}
if ($find) {
    $thongbao = 'Payment success';
    unset($_SESSION['cart']);
    unset($_SESSION['sum']);
    unset($_SESSION['login_id']);
} else {
    $thongbao = 'Payment failed';
}
?>
<div class="container-fluid text-center" style="background-image: url('./public/src//img/bg.jpg');min-height: 1920px;">
    <h1 style="padding-top:10%"><?= $thongbao ?? '' ?></h1>
    <h4 class="pt-2"><a href="index.php?view=home">Continue shopping</a></h4>
</div>