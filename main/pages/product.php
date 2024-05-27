<?php
include 'core/product.php';
$list = (new product())->list_product();
?>
<!--Slide-->
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="public/src/img/Content/EA7_1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/src/img/Content/EA7_2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/src/img/Content/EA7_3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
    <div class="title-men-shops"
        style="padding-top: 30px; padding-bottom: 30px; text-align:center; font-family: 'Julius Sans One', sans-serif;">
        <b style="font-size: 3.0rem;">FASHION PRODUCT</b>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light"
        style="justify-content: center; height:150px; margin-bottom:5px; 
        background-color:#e8e8e8!important;margin-left: 8px; margin-right: 8px; font-family: 'Julius Sans One', sans-serif;">
        <div class="navbar-nav" style=" font-weight:bold;">
            <a class="nav-item nav-link active" href="#" style="padding-left: 8.5rem ;padding-right: 8.5rem;"><b>VIEW
                    ALL PRODUCTS</b><span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#" style="padding-right: 8.5rem;"><b>T-SHIRTS</b></a>
            <a class="nav-item nav-link" href="#" style="padding-right: 8.5rem;"><b>PANTS</b></a>
            <a class="nav-item nav-link" href="#" style="padding-right: 8.5rem;"><b>WACTHS</b></a>
        </div>
    </nav>
</div>
<div class="container-fluid" style="margin-top: 0px; ">
    <div class="row items">
        <?php
        foreach ($list as $product) {
        ?>
        <div class="col-md-3 col-sm-6 px-0 item">
            <div class="item">
                <div class="box-img">
                    <a href="#"><img src="../admin/<?= $product->image ?>" alt="" style="width:100%;"></a>
                </div>
                <div class="item-info-title">
                    <b><?= $product->name ?></b>
                    <div class="row pt-4">
                        <div class="col-4 text-center pt2">
                            <p>US$ <?= $product->price ?></p>
                        </div>
                        <div class="col-8 text-center pt-2">
                            <form action="index.php?view=mycart" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-7 text-center">
                                        <div class="d-flex mb-4" style="max-width: 150px">
                                            <button type="button" class="btn btn-sm px-3 me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="0" name="qty" value="1" type="number"
                                                    class="form-control" />
                                                <label class="form-label" for="form1">Quantity</label>
                                            </div>

                                            <button type="button" class="btn btn-sm px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-5 text-center">
                                        <a href=""><button name="add" class="btn btn-light btn-sm">+Cart</button></a>
                                    </div>
                                    <input type="hidden" name="pro_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="pro_name" value="<?= $product->name ?>">
                                    <input type="hidden" name="pro_price" value="<?= $product->price ?>">
                                    <input type="hidden" name="pro_image" value="<?= '../admin/' . $product->image ?>">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>