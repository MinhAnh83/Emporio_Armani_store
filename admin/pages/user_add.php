<?php
if (isset($_POST['username'], $_POST['password'], $_POST['gender'], $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['status'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $status = $_POST['status'];
    $avt = myupload($_FILES['images'] ?? '', './uploads', $msg);
    $images = substr($avt, 2);
    include 'core/user.php';
    $add = (new user())->add($user, $pass, $name, $gender, $mail, $phone, $images, $status);
    if ($add) {
        $alert = msg('Successfully added account', 'success');
    } else {
        $alert = msg('Failed added account', 'success');
    }
} elseif (isset($_POST['sub'])) {
    $smsg = '';
    if (!isset($_POST['username']) || ($_POST['username']) == '') {
        $smsg = 'Username cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['password']) || ($_POST['username']) == '') {
        $smsg .= 'Password cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['gender'])) {
        $smsg .= 'Gender cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['name']) || ($_POST['name']) == '') {
        $smsg .= 'Name cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['phone']) || ($_POST['phone']) == '') {
        $smsg .= 'Phone number cannot be empty<br>';
        $alert = msg($smsg);
    }
    if (!isset($_POST['email']) || ($_POST['email']) == '') {
        $smsg .= 'Email cannot be empty<br>';
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
                    <h4 class="text-blue h4">ADD NEW USER</h4>
                </div>
            </div>
            <?= $alert ?? '' ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" type="text" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" type="password" placeholder="">
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input name="images" type="file" class="form-control-file form-control height-auto">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" placeholder="" value="">
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="customRadio4">Male</label>
                </div>
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="customRadio5" name="gender" class="custom-control-input" name="gender" id=""
                        value="0">
                    <label class="custom-control-label" for="customRadio5">Female</label>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" class="form-control" type="number" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" value="" type="email">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="selectpicker form-control" data-size="5" data-style="btn-outline-info">
                        <option value="1">Activate</option>
                        <option value="2">Lock</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <a href="index.php?view=user_list" class="btn btn-outline-secondary ml-2" type=""
                        style="width: 95px;">Back</a>
                    <input class="btn btn-outline-primary" name="sub" type="submit" value="Add" style="width: 95px;">
                </div>
            </form>
            <!-- horizontal Basic Forms End -->
        </div>
    </div>