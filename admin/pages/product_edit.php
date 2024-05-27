<?php
//kiem tra du lieu dau vao
if (!isset($_GET['id']) || !$_GET['id']) {
    netx_page('index.php?view=product_list');
}
include 'core/product.php';
$product = (new product())->find_product($_GET['id']);
if (!$product) {
    netx_page('index.php?view=product_list');
}

if (isset($_POST['product_name'])) {
    $msg = '';
    $flag = true;
    if (!$_POST['product_name']) {
        $flag = false;
        $msg = 'Name can not empty<br>';
    }
    if (!$_POST['product_code']) {
        $flag = false;
        $msg .= 'Code can not empty<br>';
    }
    if (!$_POST['product_price']) {
        $flag = false;
        $msg .= 'Price can not empty<br>';
    }
    if (!$_POST['product_qty']) {
        $flag = false;
        $msg .= 'Quantity can not empty<br>';
    }
    if (!$_POST['product_ct_code']) {
        $flag = false;
        $msg .= 'Catagory code can not empty<br>';
    }
    if (!$_POST['product_supp_code']) {
        $flag = false;
        $msg .= 'Supplier code can not empty<br>';
    }
    if (!$_POST['product_dscp']) {
        $flag = false;
        $msg .= 'Description can not empty<br>';
    }

    if ($flag) {
        $avt = $product->image;
        $imgmsg = '';
        if (isset($_FILES['product_image']['error']) && $_FILES['product_image']['error'] == 0) {
            $avt2 =  myupload($_FILES['product_image'], './uploads/products', $imgmsg);
            $avt = substr($avt2, 2);
        } else {
            if (!$_POST['avt_2']) {
                $avt = '';
            }
        }
        $rs = (new product())->update_product($product->id, trim($_POST['product_name']), trim($_POST['product_code']), $avt, trim($_POST['product_price']), trim($_POST['product_qty']), trim($_POST['product_ct_code']), trim($_POST['product_supp_code']), trim($_POST['product_status']), trim($_POST['product_dscp']));
        if ($rs)
            $alert = msg('Update success ' . $imgmsg, 'success');
        else
            $alert = msg('Update Failed ' . $imgmsg);
        $user =  (new product())->find_product($product->id);
    } else {
        $alert = msg($msg);
    }
}
?>
<div class="main-container">
    <div class="pd-ltr-20">
        <!-- horizontal Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">EDIT PRODUCTS</h4>
                </div>
            </div>
            <?= $alert ?? '' ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Name</label>
                    <input name="product_name" class="form-control" type="text" placeholder=""
                        value="<?= $product->name ?>">
                </div>
                <div class="form-group">
                    <label>Product Code</label>
                    <input name="product_code" class="form-control" type="text" placeholder=""
                        value="<?= $product->sku ?>">
                </div>

                <div class="form-group">
                    <label>Product Image</label>
                    <img width="50" id="h_avt" src="<?= $product->image ? $product->image : 'images/noimg.png' ?>" />
                    <input type="hidden" name="avt_2" value="<?= $product->image ?>" id="avt_2">
                    <span
                        onclick="document.getElementById('avt_2').value='';document.getElementById('h_avt').src='images/noimg.png'"><i
                            class="icon-copy fa fa-window-close" aria-hidden="true"></i></span>
                    <input name="product_image" type="file" class="form-control-file form-control height-auto">
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input name="product_price" class="form-control" type="number" value="<?= $product->price ?>">
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input name="product_qty" class="form-control" type="number" value="<?= $product->qty ?>">
                </div>
                <div class="form-group">
                    <label>Product Categories Code</label>
                    <input name="product_ct_code" class="form-control" type="text" placeholder=""
                        value="<?= $product->category_id ?>">
                </div>
                <div class="form-group">
                    <label>Supplier Code</label>
                    <input name="product_supp_code" class="form-control" type="text" placeholder=""
                        value="<?= $product->supplier_id ?>">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="product_status" class="selectpicker form-control" data-size="5"
                        data-style="btn-outline-info">
                        <option <?= $product->status == 1 ? 'selected' : '' ?> value="1">Activate</option>
                        <option <?= $product->status == 2 ? 'selected' : '' ?> value="2">Lock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <textarea name="product_dscp" class="textarea_editor form-control border-radius-0"
                        placeholder="Enter text ..."><?= $product->content ?></textarea>
                </div>
                <div class="form-group text-right">
                    <a href="index.php?view=product_list" class="btn btn-outline-secondary ml-2" type=""
                        style="width: 95px;">Back</a>
                    <input class="btn btn-outline-primary" name="sub" type="submit" value="Update" style="width: 95px;">
                </div>
            </form>
            <!-- horizontal Basic Forms End -->
        </div>
    </div>