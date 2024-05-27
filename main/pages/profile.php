<?php
if (!is_login()) {
    next_page('index.php');
}
?>
<section class="vh-100" style="background-image: url('./public/src//img/bg.jpg');min-height: 1920px;">
    <div class="container py-5 h-100">
        <div class="container text-center">
            <h1>Profile</h1>
        </div>
        <div class="row d-flex justify-content-center h-100 pt-3">
            <div class="col col-lg-6 mb-4 mb-lg-0 ">
                <div class="card mb-3" style="border-radius: .5rem; width:800px; height:400px">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; height:400px">
                            <img src="./public/src/img/profile.png" alt="Avatar" class="img-fluid my-5"
                                style="width: 170px;" />
                            <h5><?= $_SESSION['login_name'] ?></h5>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h5><b>Information</b></h5>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6><b>Email</b></h6>
                                        <p class="text-muted"><?= $_SESSION['login_us'] ?></p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6><b>Phone</b></h6>
                                        <p class="text-muted"><?= $_SESSION['login_phone'] ?></p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <h6><b>Address</b></h6>
                                        <p class="text-muted"><?= $_SESSION['login_add'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.gradient-custom {
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>