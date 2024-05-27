<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?view=home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class=" col-6 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="<?= $_SESSION['login_avt'] ?>" alt="" class="avatar-photo">
                        </div>
                        <h5 class="text-center h5 mb-0"><?= $_SESSION['login_name'] ?></h5>
                        <p class="text-center text-muted font-14"> Username: <?= $_SESSION['login_us'] ?></p>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    <span>Email Address:</span>
                                    <?= $_SESSION['login_mail'] ?>
                                </li>
                                <li>
                                    <span>Phone Number:</span>
                                    <?= $_SESSION['login_phone'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
</div>