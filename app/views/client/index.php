<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function formatPrice($sum)
{
    return number_format($sum, 0, '', ',');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/phone.png' ?>" type="image/x-icon">
    <title>Mobile Shop</title>
</head>

<body>
    <?php $this->render('blocks/header') ?>
    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site">
        <!-- Owl-carousel -->
        <section id="banner-area">
            <div class="owl-carousel owl-theme">
                <?php foreach ($photoBanner as $data) { ?>
                    <div class="item">
                        <img src="<?php echo _FOLDER_ROOT_ . $data['photo_banner'] ?>" alt="Banner0">
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- !Owl-carousel -->
        <!-- Top Sale -->
        <section id="top-sale">
            <div class="container py-5">
                <h4 class="font-size-20">Top Sale</h4>
                <hr>
                <!-- owl carousel -->
                <div class="owl-carousel owl-theme">
                    <?php foreach ($productTop as $data) { ?>
                        <div class="item py-2 border rounded-2 bg-light">
                            <div class="product">
                                <a href="<?php echo _FOLDER_ROOT_ . '/san-pham/' . $data['id'] ?>"><img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>"  alt="product1" class="img-fluid"></a>
                                <div class="text-center">
                                    <h6><?php echo $data['name_product'] ?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <div class="price py-2">
                                        <?php if ($data['discount'] > 0) { ?>
                                            <span style="color: red;padding-left: 40px;"><?php echo formatPrice($data['price'] - ($data['price'] * ($data['discount'] * 0.01))) ?> VND</span><span style="padding-left:20px;font-size: 13px;color: red;background-color: ;">-<?php echo $data['discount'] ?>%</span>
                                        <?php } else { ?>
                                            <span style="color: red;"><?php echo formatPrice($data['price'])?> VND</span>
                                        <?php } ?>
                                    </div>
                                    <a href="<?php echo _FOLDER_ROOT_ . '/them-gio-hang/' . $data['id']  ?>"><button type="submit" class="btn btn-warning font-size-12">Add to Cart</button></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- !owl carousel -->
            </div>
        </section>
        <!-- !Top Sale -->
        <!-- Special Price -->
        <section id="special-price">
            <div class="container">
                <h4 class="font-size-20">Special Price</h4>
                <div id="filters" class="button-group text-end  font-size-16">
                    <button class="btn is-checked" data-filter="*">All Brand</button>
                    <?php foreach ($brands as $data) { ?>
                        <button class="btn" data-filter=".<?php echo $data['name_category'] ?>"><?php echo $data['name_category'] ?></button>
                    <?php } ?>
                </div>
                <div class="product-filter">
                    <?php foreach ($discountPrice as $data) { ?>

                        <div class="product-filter-item <?php echo $data['name_category'] ?> border">
                            <div class="item py-2" style="width: 200px;">
                                <div class="product">
                                    <a href="<?php echo _FOLDER_ROOT_ . '/san-pham/' . $data['id'] ?>"><img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>" alt="product1" class="img-fluid"></a>
                                    <div class="text-center">
                                        <h6><?php echo $data['name_product'] ?></h6>
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <div class="price py-2">
                                             <?php if ($data['discount'] > 0) { ?>
                                            <span style="color: red;padding-left: 40px;"><?php echo formatPrice($data['price'] - ($data['price'] * ($data['discount'] * 0.01))) ?> VND</span><span style="padding-left:10px;font-size: 13px;color: red;background-color: ;">-<?php echo $data['discount'] ?>%</span>
                                        <?php } else { ?>
                                            <span style="color: red;"><?php echo formatPrice($data['price'])?> VND</span>
                                        <?php } ?>
                                        </div>
                                        <a href="<?php echo _FOLDER_ROOT_ . '/them-gio-hang/' . $data['id'] ?>"><button type="submit" class="btn btn-warning font-size-12">Add to Cart</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- !Special Price -->
        <!-- Banner Ads    -->
        <section id="banner_adds">
            <div class="container py-5 text-center">
                <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/otherphotos/discount.jpg' ?>" class="img-fluid px-3 py-2">
                <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/otherphotos/freeship.jpg' ?>" class="img-fluid px-3 py-2">
            </div>
        </section>
        <!-- !Banner Ads    -->
        <!-- New Phones -->
        <section id="new-phones">
            <div class="container">
                <h4 class="font-size-20">New Phones</h4>
                <hr>
                <!-- owl carousel -->
                <div class="owl-carousel owl-theme">
                    <?php foreach ($newPhone as $data) { ?>
                        <div class="item py-2 border rounded-2 bg-light">
                            <div class="product">
                                <a href="<?php echo _FOLDER_ROOT_ . '/san-pham/' . $data['id'] ?>"><img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>" alt="product1" class="img-fluid"></a>
                                <div class="text-center">
                                    <h6><?php echo $data['name_product'] ?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <div class="price py-2">
                                         <?php if ($data['discount'] > 0) { ?>
                                            <span style="color: red;padding-left: 40px;"><?php echo formatPrice($data['price'] - ($data['price'] * ($data['discount'] * 0.01))) ?> VND</span><span style="padding-left:20px;font-size: 13px;color: red;background-color: ;">-<?php echo $data['discount'] ?>%</span>
                                        <?php } else { ?>
                                            <span style="color: red;"><?php echo formatPrice($data['price'])?> VND</span>
                                        <?php } ?>
                                    </div>
                                    <a href="<?php echo _FOLDER_ROOT_ . '/them-gio-hang/' . $data['id'] ?>"><button type="submit" class="btn btn-warning font-size-12">Add to Cart</button></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- !owl carousel -->
            </div>
        </section>
        <!-- !New Phones -->
        <!-- Blogs -->
        <section id="blogs">
            <div class="container py-4">
                <h4 class="font-size-20">CHUỖI MỚI DEAL KHỦNG</h4>
                <hr>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card border-1 me-5">
                            <h5 class="card-title font-size-16 text-dark text-center mt-1">Táo xịn tết sang - Lì xì 2023 chỉ vàng</h5>
                            <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/blog/blog1.jpg' ?>" class="card-img-top">
                            <p class="card-text font-size-14 text-black-50 px-2">Từ ngày 16/12/-31/01 Táo xịn tết sang
                                giảm đến 11 triệu khi mua iPhone hoặc MacBook tại Topzone, mua iPad giảm 7 triệu, cùng
                                nhiều khuyến mãi hấp dẫn.</p>
                            <a href="#" class="color-second text-start ps-2 mb-2">Xem ngay</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-1 me-5">
                            <h5 class="card-title font-size-16 text-dark text-center mt-1">GIÁNG SINH GIẢM ĐỈNH 50%</h5>
                            <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/blog/blog2.jpg' ?>" class="card-img-top">
                            <p class="card-text font-size-14 text-black-50 px-2">SALE SỐC HÀNG LOẠT ĐẾN 50% - DUY NHẤT
                                TỪ 19 -25/12. MUA NGAY TẠI AVASPORT</p>
                            <a href="#" class="color-second text-start ps-2 mb-2">Xem ngay</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-1 me-5">
                            <h5 class="card-title font-size-16 text-dark text-center mt-1">Mùa giáng sinh, sinh lực phải sung giảm đến 30%</h5>
                            <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/blog/blog3.jpg' ?>" class="card-img-top">
                            <p class="card-text font-size-14 text-black-50 px-2">Từ ngày 01/12 đến 31/12 mua Yến sào
                                Win'snest khuyến mãi mua 1 tặng 1. Hàng loạt sản phẩm giảm ngay từ 5% đến 30%</p>
                            <a href="#" class="color-second text-start ps-2 mb-2">Xem ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- !Blogs -->
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>
    <!-- !start #footer -->
</body>

</html>