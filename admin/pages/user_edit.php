<?php
//kiem tra du lieu dau vao
if (!isset($_GET['id']) || !$_GET['id']) {
    netx_page('index.php?view=user_list');
}
include 'core/user.php';
$user = (new user())->find($_GET['id']);
if (!$user) {
    netx_page('index.php?view=user_list');
}

if (isset($_POST['username'])) {
    $msg = '';
    //kiem tra ton tai user và du lieu hop le
    $flag = true;
    if (!$_POST['username']) {
        $flag = false;
        $msg = 'Username can not empty<br>';
    }
    if (!$_POST['name']) {
        $flag = false;
        $msg .= 'Name can not empty <br>';
    }
    if ($flag) {
        $avt = $user->image;
        $pass = $user->password;
        $imgmsg = '';
        if (isset($_FILES['avt']['error']) && $_FILES['avt']['error'] == 0) {
            $avt2 =  myupload($_FILES['avt'], './uploads', $imgmsg);
            $avt = substr($avt2, 2);
        } else {
            if (!$_POST['avt_2']) {
                $avt = '';
            }
        }
        if (isset($_POST['password']) && $_POST['password']) {
            $pass = $_POST['password'];
        }
        $rs = (new user())->update($user->id, trim($_POST['name']), $avt, trim($_POST['gender']), trim($_POST['phone']), trim($_POST['email']), trim($_POST['status']), $pass);
        if ($rs)
            $alert = msg('Update success ' . $imgmsg, 'success');
        else
            $alert = msg('Update success failed ' . $imgmsg);
        $user =  (new user())->find($user->id);
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
                    <h4 class="text-blue h4">EDIT USER</h4>
                </div>
            </div>
            <?= $alert ?? '' ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" readonly class="form-control" type="text" placeholder=""
                        value="<?= $user->username ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" type="password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <img width="50" id="h_avt" src="<?= $user->image ? $user->image : 'images/noimg.png' ?>" />
                    <input type="hidden" name="avt_2" value="<?= $user->image ?>" id="avt_2">
                    <span
                        onclick="document.getElementById('avt_2').value='';document.getElementById('h_avt').src='images/noimg.png'"><i
                            class="icon-copy fa fa-window-close" aria-hidden="true"></i></span>
                    <input name="avt" type="file" class="form-control-file form-control height-auto">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" placeholder="" value="<?= $user->name ?>">
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input"
                        <?= $user->gender == 1 ? 'checked' : '' ?> value="1">
                    <label class="custom-control-label" for="customRadio4">Male</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="customRadio5" name="gender" class="custom-control-input"
                        <?= $user->gender == 0 ? 'checked' : '' ?> name="gender" id="" value="0">
                    <label class="custom-control-label" for="customRadio5">Female</label>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" class="form-control" type="text" value="<?= $user->phone ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" value="<?= $user->email ?>" type="email">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="selectpicker form-control" name="status" data-size="5" data-style="btn-outline-info">
                        <option <?= $user->status == 1 ? 'selected' : '' ?> value="1">Activate</option>
                        <option <?= $user->status == 2 ? 'selected' : '' ?> value="2">Lock</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <a href="index.php?view=user_list" class="btn btn-lg btn-outline-secondary ml-2" type=""
                        style="width: 95px;">Back</a>
                    <input class="btn btn-outline-primary btn-lg" type="submit" value="Update" style="width: 95px;">
                </div>
            </form>
            <!-- horizontal Basic Forms End -->
        </div>
    </div>