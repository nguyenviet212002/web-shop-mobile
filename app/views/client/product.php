<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sumQty = 0;
$sumPrice = 0;
// foreach ($sessionCart as $data) {
//     $sumQty += floatval($data['qty']);
//     $sumPrice += floatval($data['qty']*$data['price']);
// }
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
<style>
    .fa-star {
        color: #FFD700;
        font-size: 13px;
    }

    .txt-center {
        text-align: center;
    }

    .hide {
        display: none;
    }

    .clear {
        float: none;
        clear: both;
    }

    .rating-1 {
        width: 90px;
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
    }

    .rating-1>label {
        float: right;
        display: inline;
        padding: 0;
        margin: 0;
        position: relative;
        width: 1.1em;
        cursor: pointer;
        color: #000;
    }

    .rating-1>label:hover,
    .rating-1>label:hover~label,
    .rating-1>input.radio-btn:checked~label {
        color: transparent;
    }

    .rating-1>label:hover:before,
    .rating-1>label:hover~label:before,
    .rating-1>input.radio-btn:checked~label:before,
    .rating-1>input.radio-btn:checked~label:before {
        content: "\2605";
        position: absolute;
        left: 0;
        color: #FFD700;
    }

    .heading {
        font-size: 25px;
        margin-right: 25px;
    }

    .fa {
        font-size: 25px;
    }

    .checked {
        color: orange;
    }

    /* Three column layout */
    .side {
        float: left;
        width: 15%;
        margin-top: 10px;
    }
</style>

<body>
    <?php $this->render('blocks/header') ?>
    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site" style="background-color: white;">
        <!-- start product -->
        <section id="product" class="py-3">
            <div class="container">
                <?php foreach ($productDetails as $data) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>" alt="product" class="img-fluid">
                            <div class="pt-4 font-size-16">
                                <div class="col">
                                    <a href="<?php echo _FOLDER_ROOT_ . '/mua-san-pham/' . $data['id'] ?>"><button type="submit" class="btn btn-success form-control">Proceed to Buy</button></a>
                                </div>
                                <div class="col">
                                    <a href="<?php echo _FOLDER_ROOT_ . '/them-gio-hang/' . $data['id']  ?>"><button type="submit" class="btn btn-warning form-control">Add to Cart</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-size-20"><?php echo $data['name_product'] ?></h5>
                            <small>by <?php echo $data['name_category'] ?></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-size-14">20,534 ratings | 1000+ answered
                                    questions</a>
                            </div>
                            <hr class="m-0">
                            <!--- product price -->
                            <table class="my-3 font-size-14">
                                <?php if ($data['discount'] > 0) { ?>
                                    <tr>
                                        <td>Discount:</td>
                                        <td style="color: red;"><?php echo $data['discount'] ?>%</td>
                                    </tr>
                                <?php } ?>

                                <?php if ($data['discount'] > 0) { ?>
                                    <tr>
                                        <td>Initial price:</td>
                                        <td style="font-size: 18px;"><strike><?php echo formatPrice($data['price']) ?>VND</strike></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>Deal Price:</td>
                                    <td class="font-size-20 text-danger">
                                        <span>
                                            <?php echo (formatPrice($data['price'] - ($data['price'] * ($data['discount'] * 0.01)))) ?> VND</span>
                                    </td>
                                    <td>
                                        <span class="font-size-12">&nbsp;&nbsp;Inclusive of all taxes</span>
                                    </td>
                                </tr>
                                <?php if ($data['discount'] > 0) { ?>
                                    <tr>
                                        <td>You Save:</td>
                                        <td><span class="font-size-16 text-danger"><?php echo (formatPrice($data['price'] * ($data['discount'] * 0.01))) ?> VND</span></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <!--- !product price -->
                            <!--    #policy -->
                            <div id="policy">
                                <div class="d-flex">
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-size-12">10 Days <br> Replacement</a>
                                    </div>
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-size-12">About <br>Our</a>
                                    </div>
                                    <div class="return text-center me-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-size-12">1 Year <br>Warranty</a>
                                    </div>
                                </div>
                            </div>
                            <!-- !policy -->
                            <hr>
                            <!-- order-details -->
                            <div id="order-details" class="d-flex flex-column">
                                <small>Delivery by : Mar 29 - Apr 1</small>
                                <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                                <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                                    424201</small>
                            </div>
                            <!-- !order-details -->
                            <div class="row">
                                <div class="col-6">
                                    <!-- color -->
                                    <div class="color my-3">
                                        <div class="d-flex justify-content-between">
                                            <h6>Color:</h6>
                                            <div class="p-2 color-yellow-bg rounded-circle" style="background-color: red;"><button class="btn font-size-14"></button></div>
                                            <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                            <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        </div>
                                    </div>
                                    <!-- !color -->
                                </div>
                                <div class="col-6">
                                    <!-- product qty section -->
                                    <div class="qty d-flex">
                                        <h6>Quantity</h6>
                                        <div class="px-4 d-flex">
                                            <button class="qty-up border bg-light w-25" onclick="qty_down()" data-id="pro1"><i class="fas fa-minus"></i></button>
                                            <input type="text" data-id="pro1" class="qty_input text-center border px-2 w-50" disabled value="1" placeholder="1">
                                            <button data-id="pro1" onclick="qty_up()" class="qty-down border bg-light w-25"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <!-- !product qty section -->
                                </div>
                            </div>
                            <!-- size -->
                            <div class="size my-3">
                                <h6>Size :</h6>
                                <div class="d-flex justify-content-between w-75">
                                    <div class="border p-2">
                                        <button type="button" class="btn p-0 font-size-14">4GB RAM</button>
                                    </div>
                                    <div class="border p-2">
                                        <button type="button" class="btn p-0 font-size-14">6GB RAM</button>
                                    </div>
                                    <div class="border p-2">
                                        <button type="button" class="btn p-0 font-size-14">8GB RAM</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- !size -->

                    </div>
                    <div class="col-12" style="padding-top:100px; ;">
                        <h6>Product Description</h6>
                        <hr>
                        <p class="font-size-14"><?php echo $data['description'] ?></p>
                    </div>

                    <label for="" style="padding:30px 0 30px 0; font-weight: 500;">Bình luận</label>

                    <div class="review" style="width: 100%;height: 250px; overflow-y: scroll;background-color: #e9e9e9 ;">
                        <div style="padding: 10px 0 10px 15px;">
                            <?php foreach ($review as $data) { ?>
                                <h5><?php echo $data['fullname'] ?></h5>
                                <?php
                                switch ($data['start']) {
                                    case '5': ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <?php break; ?>

                                    <?php
                                    case '4': ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <?php break; ?>
                                    <?php
                                    case '3': ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <?php break; ?>
                                    <?php
                                    case '2': ?>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <?php break; ?>
                                    <?php
                                    case '1': ?>
                                        <i class="fas fa-star"></i>
                                        <?php break; ?>

                                <?php } ?>

                                <br>
                                <span><?php echo $data['review'] ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <label for="" style="padding-top: 30px;font-weight: 500;">Viết đánh giá</label>
                    <form action="<?php echo _FOLDER_ROOT_ . '/danh-gia/' . $data['id'] ?>" method="POST">
                        <div class="col-12 " style="padding:10px 0 20px 0;">
                            <div class="txt-center" style="padding-left: 18px;">
                                <div class="rating-1" style="display: flex;">
                                    <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                                    <label for="star5" style="font-size: 25px;">☆</label>
                                    <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                                    <label for="star4" style="font-size: 25px;">☆</label>
                                    <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                                    <label for="star3" style="font-size: 25px;">☆</label>
                                    <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                                    <label for="star2" style="font-size: 25px;">☆</label>
                                    <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                                    <label for="star1" style="font-size: 25px;">☆</label>
                                    <div class="clear"></div>

                                </div>
                            </div>
                            <input type="text" name="review" class="review" style="width: 100%;height: 200px;" placeholder="  Hãy viết đánh giá của bạn..."><br>
                        </div>
                        <button type="submit" class="btnReview" style="padding: 0 5px;border: 0;background-color: #0d9efd;width: 150px;height: 30px;color: white;">Viết đánh giá </button>
                    </form>
            </div>
        <?php } ?>
        </div>
        </section>
        <!-- !start product -->
        <!-- Top Sale -->
        <section id="top-sale">
            <div class="container py-5">
                <h4 class="font-size-20">Top Sale</h4>
                <hr>
                <!-- owl carousel -->
                <div class="owl-carousel owl-theme">
                    <?php foreach ($getTopseller as $data) { ?>
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
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>
    <!-- !start #footer -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
    <script>
        var qty = document.querySelector('.qty_input').value
        var sum = 0

        function qty_down() {
            if (sum > 1) {
                sum -= 1
                document.querySelector('.qty_input').value = sum
            }
        }

        function qty_up() {
            sum += 1
            document.querySelector('.qty_input').value = sum
        }
        $('#s1').click(function() {
            $('.rating-start').css('color', 'black')
            $('#s1').css('color', 'yellow')
        })
        $('#s2').click(function() {
            $('.rating-start').css('color', 'black')
            $('#s1,#s2').css('color', 'yellow')
        })
        $('#s3').click(function() {
            $('.rating-start').css('color', 'black')
            $('#s1,#s2,#s3').css('color', 'yellow')
        })
        $('#s4').click(function() {
            $('.rating-start').css('color', 'black')
            $('#s1,#s2,#s3,#s4').css('color', 'yellow')
        })
        $('#s5').click(function() {
            $('.rating-start').css('color', 'yellow')
        })

        $('.rating-start').click(function() {
            rating = $(this).attr('data-rating');
        })

        $('.btnReview').click(function() {
            if (rating == null) {
                review = $('.review').val();
                sessionStorage.setItem('rating', rating)
                sessionStorage.setItem('review', review)
            } else {
                alert('ban can danh gia sao')
            }
        })
    </script>

</body>

</html>