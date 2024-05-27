<?php
include 'core/customer.php';
$list = (new customer())->list_customer();
?>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">CUSTOMER MANAGEMENT (<?= count($list) ?>)</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                    ?>
                    <tr>
                        <td class="table-plus">
                            <div class="name-avatar d-flex align-items-center">
                                <div class="txt">
                                    <div class="weight-600"><?= $item->name ?></div>
                                </div>
                            </div>
                        </td>

                        <td><?= $item->address ?></td>
                        <td><?= $item->phone ?></td>
                        <td><?= $item->email ?></td>
                        <td>
                            <?= $item->status == 1 ? '<span class="badge badge-pill" data-bgcolor="#28A745" data-color="#FFFDFF">Activate</span>' : '<span class="badge badge-pill" data-bgcolor="#DC3545" data-color="#FFFDFF">Locked</span>' ?>
                        </td>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a onclick="return confirm('Bạn có muốn xóa dòng này không?')"
                                    href="index.php?view=customer_remove&id=<?= $item->id ?>" data-color="#e95959"><i
                                        class="icon-copy dw dw-delete-3" id=""></i></a>
                            </div>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>