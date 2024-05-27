<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_GET['recart']) && ($_GET['recart']) == 1) {
    unset($_SESSION['cart']);
    next_page('index.php?view=mycart');
}
if (isset($_GET['recartid']) && ($_GET['recartid']) >= 0) {
    array_splice($_SESSION['cart'], $_GET['recartid'], 1);
    next_page('index.php?view=mycart');
}

if (isset($_POST['add'])) {
    $id = $_POST['pro_id'];
    $name = $_POST['pro_name'];
    $price = $_POST['pro_price'];
    $img = $_POST['pro_image'];
    $qty = $_POST['qty'];

    $flag = 0;
    //check product
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $name) {
            $flag = 1;
            $qtynew = $qty +  $_SESSION['cart'][$i][3];
            $_SESSION['cart'][$i][3] = $qtynew;
            break;
        }
    }

    if ($flag == 0) {
        // add product
        $cart = [$name, $price, $img, $qty, $id];
        $_SESSION['cart'][] = $cart;
    }
}
?>
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">My Cart - <?php echo sizeof($_SESSION['cart']) ?> Product
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->
                        <?php
                        if (isset($_SESSION['cart'])) {
                            if (sizeof($_SESSION['cart']) > 0) {
                                $sumitem = 0;
                                for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                                    $sum = $_SESSION['cart'][$i][1] * $_SESSION['cart'][$i][3];
                                    $sumitem += $sum;
                                    $sumitems = currency_format($sumitem)

                        ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                    data-mdb-ripple-color="light">
                                    <img src="<?= $_SESSION['cart'][$i][2] ?>" class="w-50" alt="Blue Jeans Jacket"
                                        style="width: 30px;" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p style="font-weight:bold; color:black">
                                    <strong><?= $_SESSION['cart'][$i][0] ?></strong>
                                </p>
                                <a href="index.php?view=mycart&recartid=<?= $i ?>" type="button"
                                    class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                                    title="Remove Product" style="color:aliceblue">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <!-- Data -->
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <!-- Quantity -->
                                <p class="text-start text-md-center" style="font-weight:bold; color:black">
                                    <strong>Quantity: <?= $_SESSION['cart'][$i][3] ?></strong>
                                </p>
                                <!-- Quantity -->

                                <!-- Price -->
                                <p class="text-start text-md-center" style="font-weight:bold; color:black">
                                    <strong>$<?= $_SESSION['cart'][$i][1] ?></strong>
                                </p>
                                <!-- Price -->
                            </div>
                        </div>
                        <!-- Single item -->

                        <hr class="my-4" />
                        <?php
                                }
                                $_SESSION['sum'] = $sumitem ?? 0;
                            } else {
                                echo '<h3>Shopping cart is empty</h3>';
                            }
                        }
                        ?>
                        <div class="text-right">
                            <a href="index.php?view=product" type="button" class="btn btn-primary">Back</a>
                            <a href="index.php?view=mycart&recart=1" type="button" class="btn btn-danger">Remove
                                Cart</a>
                        </div>
                        <div class="text-right">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                <h5>Products</h5>
                                <span>$<?= $sumitems ?? 0 ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <h5>Shipping</h5>
                                <span>Gratis</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0" style="color:darkslategray">(Including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong><?= $sumitems ?? '0' ?></strong></span>
                            </li>
                        </ul>
                        <?php
                        if (!is_login()) {
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <h5><a href="./login.php">Sign in</a> to continue paying</h5>
                        </div>
                        <?php
                        } else {
                        ?>
                        <a href="index.php?view=pay" type="button" class="btn btn-primary btn-lg btn-block">Pay</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.gradient-custom {
    background-image: url('./public/src//img/bg.jpg');
    min-height: 1920px;
}
</style>