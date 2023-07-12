<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sumQty = 0;
$sumPrice = 0;

if (isset($sessionCart) && is_array($_SESSION['cart'])) {
    foreach ($sessionCart as $data) {
        $sumQty += floatval($data['qty']);
        $sumPrice += floatval($data['qty'] * $data['price']);
    }
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/phone.png' ?>" type="image/x-icon">
    <title>Mobile Shop</title>

</head>

<body>
    <!-- start #header -->
    <?php $this->render('blocks/header') ?>
    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site">
        <!-- Shopping cart section  -->
        <section id="cart" class="py-3">
            <div class="container">
                <h5 class="font-size-20">
                    Shopping Cart <span>(Guest)</span>
                </h5>
                <!--  shopping cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <!-- cart item -->
                        <?php if (isset($sessionCart) && is_array($_SESSION['cart'])) { ?>
                            <?php foreach ($sessionCart as $data) { ?>
                                <div class="row border-top py-3 mt-3">
                                    <div class="col-sm-2">
                                        <img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-size-20"><?php echo $data['name_product'] ?></h5>
                                        <small><?php echo $data['name_category'] ?></small>
                                        <!-- product rating -->
                                        <div class="d-flex">
                                            <div class="rating text-warning font-size-12">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="far fa-star"></i></span>
                                            </div>
                                            <a href="#" class="px-2 font-size-14">20,534 ratings</a>
                                        </div>
                                        <!--  !product rating-->
                                        <!-- product qty -->
                                        <div class="qty d-flex pt-2">
                                            <div class="d-flex w-25">
                                                <button data-id="pro1" class="qty-down border bg-light w-25"><a href="<?php echo _FOLDER_ROOT_ . '/giam-so-luong/' . $data['id'] ?>"><i class="fas fa-minus"></i></a></button>
                                                <input type="text" data-id="pro1" class="qty_input text-center border px-2 w-100 bg-light" disabled value="<?php echo $data['qty'] ?>" placeholder="1">
                                                <button data-id="pro1" class="qty-down border bg-light w-25"><a href="<?php echo _FOLDER_ROOT_ . '/tang-so-luong/' . $data['id'] ?>"><i class="fas fa-plus"></i></a></button>
                                            </div>
                                            <a href="<?php echo _FOLDER_ROOT_ . '/xoa-gio-hang/' . $data['id'] ?>"><button type="submit" class="btn text-danger px-3 border-right">Delete</button></a>
                                            <button type="submit" class="btn  text-danger">Save for Later</button>
                                        </div>
                                        <!-- !product qty -->
                                    </div>
                                    <div class="col-sm-2 text-end">
                                        <div class="font-size-20 text-danger"> 
                                       <span class="product_price"><?php echo formatPrice($data['price'] * $data['qty']) ?>VND</span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <!-- !cart item -->
                        <!-- cart item -->
                        <!-- !cart item -->
                    </div>
                    <!-- subtotal section-->
                    <div class="col-sm-3">
                        <div class="sub-total border text-center mt-2">
                            <h6 class="font-size-12  text-success py-3">
                                <i class="fas fa-check"></i>
                                Your order is eligible for FREE Delivery.
                            </h6>
                            <div class="border-top py-4">
                                <h5 class="font-size-20">Subtotal ( <?php echo $sumQty ?> item):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price"><?php echo formatPrice($sumPrice) ?> VND</span>
                                    </span> </h5>
                           <!--  if($_SESSION['login'] == true).............................................. -->
                                <a href="<?php echo _FOLDER_ROOT_ . '/thanh-toan'  ?>"><button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- !subtotal section-->
                </div>
                <!-- !shopping cart items -->
            </div>
        </section>
        <!-- !Shopping cart section  -->
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
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>
    <!-- !start #footer -->


    
</body>

</html>