<?php
include 'core/user.php';
$list = (new user())->_list();
?>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="pull-right mt-10">
            <a href="index.php?view=user_add" class="btn btn-primary btn-sm scroll-click" role="button"><i
                    class="icon-copy ion-plus-round"></i> Add new
                user</a>
        </div>
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">USER MANAGEMENT (<?= count($list) ?>)</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Name</th>
                        <th>Gender</th>
                        <th>Username</th>
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
                                <div class="avatar mr-2 flex-shrink-0">
                                    <img src="<?= $item->image ? $item->image : 'images/noimg.png' ?>"
                                        class="border-radius-100 shadow" width="40" height="40" alt="">
                                </div>
                                <div class="txt">
                                    <div class="weight-600"><?= $item->name ?></div>
                                </div>
                            </div>
                        </td>
                        <td><img src="images/n<?= $item->gender ?>.png" width="40px" class="img-fluid rounded-circle"
                                alt="<?= $item->name ?>"></td>
                        <td><?= $item->username ?></td>
                        <td><?= $item->phone ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->status == 1 ? '<span class="badge badge-pill" data-bgcolor="#28A745" data-color="#FFFDFF">Activate</span>' : '<span class="badge badge-pill" data-bgcolor="#DC3545" data-color="#FFFDFF">Locked</span>' ?>
                        </td>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="index.php?view=user_edit&id=<?= $item->id ?>" data-color="#265ed7"><i
                                        class="icon-copy dw dw-edit2"></i></a>
                                <a onclick="return confirm('Bạn có muốn xóa dòng này không?')"
                                    href="index.php?view=user_remove&id=<?= $item->id ?>" data-color="#e95959"><i
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