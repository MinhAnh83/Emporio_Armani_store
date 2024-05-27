<?php
if (isset($_POST['product_name'], $_POST['product_code'], $_FILES['product_image'], $_POST['product_price'], $_POST['product_qty'], $_POST['product_ct_code'], $_POST['product_supp_code'], $_POST['product_status'], $_POST['product_dscp'])) {
    $name = $_POST['product_name'];
    $sku = $_POST['product_code'];
    $price = $_POST['product_price'];
    $qty = $_POST['product_qty'];
    $category = $_POST['product_ct_code'];
    $supplier = $_POST['product_supp_code'];
    $status = $_POST['product_status'];
    $dscp = $_POST['product_dscp'];
    $avt = myupload($_FILES['product_image'] ?? '', './uploads/products', $msg);
    $images = substr($avt, 2);
    include 'core/product.php';
    $add = (new product())->add_product($sku, $name, $price, $qty, $images, $dscp, $category, $supplier, $status);
    if ($add) {
        $alert = msg('Successfully added product', 'success');
    } else {
        $alert = msg('Failed added product', 'success');
    }
} elseif (isset($_POST['sub'])) {
    $smsg = '';
    if (!isset($_POST['product_code']) || ($_POST['product_code']) == '') {
        $smsg = 'Product Code cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_name']) || ($_POST['product_name']) == '') {
        $smsg .= 'Product Name cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_price']) || ($_POST['product_price']) == '') {
        $smsg .= 'Product Price cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_qty']) || ($_POST['product_qty']) == '') {
        $smsg .= 'Product Quantity cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_ct_code']) || ($_POST['product_ct_code']) == '') {
        $smsg .= 'Product Categories Code cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_supp_code']) || ($_POST['product_supp_code']) == '') {
        $smsg .= 'Product Supplier Code cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['product_dscp']) || ($_POST['product_dscp']) == '') {
        $smsg .= 'Product Description cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_FILES['product_image'])) {
        $smsg .= 'Product image cannot be empty<br>';
        $alert = msg($smsg);
    }
}
?>
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- horizontal Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">ADD NEW PRODUCTS</h4>
                </div>
            </div>
            <?= $alert ?? '' ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Name</label>
                    <input name="product_name" class="form-control" type="text" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>Product Code</label>
                    <input name="product_code" class="form-control" type="text" placeholder="">
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input name="product_image" type="file" class="form-control-file form-control height-auto">
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input name="product_price" class="form-control" type="number" value="">
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input name="product_qty" class="form-control" type="number" value="">
                </div>
                <div class="form-group">
                    <label>Product Categories Code</label>
                    <input name="product_ct_code" class="form-control" type="text" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>Supplier Code</label>
                    <input name="product_supp_code" class="form-control" type="text" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="product_status" class="selectpicker form-control" data-size="5"
                        data-style="btn-outline-info">
                        <option value="1">Activate</option>
                        <option value="2">Lock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <textarea name="product_dscp" class="textarea_editor form-control border-radius-0"
                        placeholder="Enter text ..."></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="index.php?view=product_list" class="btn btn-outline-secondary ml-2" type=""
                        style="width: 95px;">Back</a>
                    <input class="btn btn-outline-primary" name="sub" type="submit" value="Add" style="width: 95px;">
                </div>
            </form>
            <!-- horizontal Basic Forms End -->
        </div>
    </div>