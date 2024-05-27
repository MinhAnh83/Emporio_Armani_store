<?php
include 'core/product.php';
$list = (new product())->list_product();
?>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="pull-right mt-10">
            <a href="index.php?view=product_add" class="btn btn-primary btn-sm scroll-click" role="button"><i
                    class="icon-copy ion-plus-round"></i> Add new
                product</a>
        </div>
        <div class="card-box mb-30">
            <h2 class="h4 pd-20">PRODUCT MANAGEMENT (<?= count($list) ?>)</h2>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Product</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Categories</th>
                        <th>Supplier</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                    <tr>
                        <td class="table-plus">
                            <img src="<?= $item->image ?>" width="70" height="70" alt="">
                        </td>
                        <td>
                            <h5 class="font-16"><?= $item->name ?></h5>
                        </td>
                        <td><?= $item->sku ?></td>
                        <td><?= $item->price ?></td>
                        <td><?= $item->qty ?></td>
                        <td><?= $item->categories ?></td>
                        <td><?= $item->suppliers ?></td>
                        <td><?= $item->status == 1 ? '<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Online</span>' : '<span class="badge badge-pill" data-bgcolor="#6C757D" data-color="#FFFDFF">Offline</span>' ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="index.php?view=product_edit&id=<?= $item->id ?>"><i
                                            class="dw dw-edit2"></i> Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" class="dropdown-item"
                                        href="index.php?view=product_remove&id=<?= $item->id ?>"><i
                                            class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>