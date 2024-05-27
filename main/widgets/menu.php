    <!--Layout-->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <!--Navbar-->
    <div class="container-fluid px-0">
        <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center position-relative">
                    <div class="col-2">
                        <!-- <div class="site-logo"> -->
                        <a href="index.php" class="text-black"><span class="text-primary"><img
                                    src="public/src/img/logo/ax2.png" alt="" style="height: 65px; width: auto;"></a>
                        <!-- </div> -->
                    </div>
                    <div class="col-8">
                        <nav class="site-navigation text-center ml-auto " role="navigation">
                            <ul class="hover-custom site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="index.php?view=home" class="nav-link">Home</a></li>
                                <li><a href="index.php?view=product" class="nav-link">Product</a></li>
                                <li><a href="index.php?view=about" class="nav-link">About us</a></li>
                                <li><a href="index.php?view=contact" class="nav-link">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-2">
                        <nav class="site-navigation text-right ml-auto " role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li><a href="#c" class="nav-link"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                                <li>
                                    <a href="index.php?view=mycart" class="nav-link"><i
                                            class="fa-solid fa-cart-shopping"></i></a>
                                </li>
                                <?php
                                if (is_login()) {
                                ?>

                                <li class="nav-item dropdown">
                                    <a href="login.php" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fa-solid fa-user"></i>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark bg-dark">
                                            <a class="dropdown-item" style="color:aliceblue"
                                                href="index.php?view=profile">Profile</a>
                                            <a class="dropdown-item" style="color:aliceblue"
                                                href="index.php?view=logout">Log out</a>
                                        </div>
                                    </a>
                                </li>


                                <?php
                                } else {
                                ?>
                                <li><a href="login.php" class="nav-link"><i class="fa-solid fa-user"></i></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                            class="site-menu-toggle py-5 js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>
    </div>