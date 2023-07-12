<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sumQty = 0;
$sumPrice = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $data) {
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

<style>
    .form-radio-control,
    .form-checkbox-control {
        align-items: flex-start;
        justify-content: flex-start;
    }
</style>

<body>
    <!-- start #header -->
    <?php $this->render('blocks/header') ?>

    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site">
        <!-- start register -->
        <section class="register">
            <div class="main py-3">
                <!-- sign up -->
                <form method="POST" action="<?php echo _FOLDER_ROOT_ . '/thanh-toan-thanh-cong'?>" class="form" id="sign-up">
                    <h3 class="heading">Thanh toán</h3>
                    <p class="desc">Điền địa chỉ và thanh toán </p>
                    <div class="row" style="width: 1250px;">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="fullname" class="form-label">Họ và tên (*)</label>
                                <input id="fullname" name="fullname" type="text" rules="required" placeholder="Nhập tên của bạn" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <!-- <div class="form-group">
                                <label for="username" class="form-label">Username (*)</label>
                                <input id="username" name="username" type="text" rules="required|min:3|max:10" placeholder="Chọn tên tài khoản của bạn" class="form-control">
                                <span class="form-message"></span>
                            </div> -->
                            <div class="form-group">
                                <label for="phone" class="form-label">Số điện thoại (*)</label>
                                <input id="phone" name="phone" type="number" rules="required|min:10|max:10" placeholder="Nhập số điện thoại" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email (*)</label>
                                <input id="email" name="email" type="text" rules="required|email" placeholder="Nhập email đăng ký" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="desiption" class="form-label">Ghi chú (*)</label>
                                <input id="desiption" name="desiption" type="desiption" rules="required|min:3" placeholder="Nhập ghi chú" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <!-- </div> -->
                            <!-- <div class="col"> -->

                            <div class="form-group">
                                <label for="city" class="form-label">Thành phố (*)</label>
                                <select id="city" rules="required" name="city" class="form-control">
                                    <option value="">Chọn tỉnh/thành phố</option>
                                    <option value="0">--- Chọn tỉnh/TP ---</option>
                                    <option value="01">Hà Nội</option>
                                    <option value="02">Hà Giang</option>
                                    <option value="04">Cao Bằng</option>
                                    <option value="06">Bắc Kạn</option>
                                    <option value="08">Tuyên Quang</option>
                                    <option value="10">Lào Cai</option>
                                    <option value="11">Điện Biên</option>
                                    <option value="12">Lai Châu</option>
                                    <option value="14">Sơn La</option>
                                    <option value="15">Yên Bái</option>
                                    <option value="17">Hòa Bình</option>
                                    <option value="19">Thái Nguyên</option>
                                    <option value="20">Lạng Sơn</option>
                                    <option value="22">Quảng Ninh</option>
                                    <option value="24">Bắc Giang</option>
                                    <option value="25">Phú Thọ</option>
                                    <option value="26">Vĩnh Phúc</option>
                                    <option value="27">Bắc Ninh</option>
                                    <option value="30">Hải Dương</option>
                                    <option value="31">Hải Phòng</option>
                                    <option value="33">Hưng Yên</option>
                                    <option value="34">Thái Bình</option>
                                    <option value="35">Hà Nam</option>
                                    <option value="36">Nam Định</option>
                                    <option value="37">Ninh Bình</option>
                                    <option value="38">Thanh Hóa</option>
                                    <option value="40">Nghệ An</option>
                                    <option value="42">Hà Tĩnh</option>
                                    <option value="44">Quảng Bình</option>
                                    <option value="45">Quảng Trị</option>
                                    <option value="46">Thừa Thiên Huế</option>
                                    <option value="48">Đà Nẵng</option>
                                    <option value="49">Quảng Nam</option>
                                    <option value="51">Quảng Ngãi</option>
                                    <option value="52">Bình Định</option>
                                    <option value="54">Phú Yên</option>
                                    <option value="56">Khánh Hòa</option>
                                    <option value="58">Ninh Thuận</option>
                                    <option value="60">Bình Thuận</option>
                                    <option value="62">Kon Tum</option>
                                    <option value="64">Gia Lai</option>
                                    <option value="66">Đắk Lắk</option>
                                    <option value="67">Đắk Nông</option>
                                    <option value="68">Lâm Đồng</option>
                                    <option value="70">Bình Phước</option>
                                    <option value="72">Tây Ninh</option>
                                    <option value="74">Bình Dương</option>
                                    <option value="75">Đồng Nai</option>
                                    <option value="77">Bà Rịa - Vũng Tàu</option>
                                    <option value="79">Hồ Chí Minh</option>
                                    <option value="80">Long An</option>
                                    <option value="82">Tiền Giang</option>
                                    <option value="83">Bến Tre</option>
                                    <option value="84">Trà Vinh</option>
                                    <option value="86">Vĩnh Long</option>
                                    <option value="87">Đồng Tháp</option>
                                    <option value="89">An Giang</option>
                                    <option value="91">Kiên Giang</option>
                                    <option value="92">Cần Thơ</option>
                                    <option value="93">Hậu Giang</option>
                                    <option value="94">Sóc Trăng</option>
                                    <option value="95">Bạc Liêu</option>
                                    <option value="96">Cà Mau</option>
                                </select>
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">Địa chỉ </label>
                                <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <button class="form-submit" type="submit" name="register-submit" style="width: 350px;">Thanh Toán</button>
                        </div>
                        <div class="col-sm-4">
                            <!-- <div class="sub-total border text-center mt-2">
                                <h6 class="font-size-12  text-success py-3">
                                    <i class="fas fa-check"></i>
                                    Your order is eligible for FREE Delivery.
                                </h6>
                                <div class="border-top py-4">
                                <img src="http://localhost/web-ban-hang-mvc/public/acssets/storage/productphotos/4.png" style="height: 120px;" alt="cart1" class="img-fluid">
                                    <h5 class="font-size-20">Subtotal ( item):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price"> VND</span>
                                        </span> </h5>
                                    <a href=""><button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button></a>
                                </div>
                            </div> -->
                            <div class="col-sm-12 ">
                                <?php foreach ($_SESSION['cart'] as $data) { ?>
                                    <div class="row border">
                                        <div class="col-sm-4">
                                            <img src="<?php echo _FOLDER_ROOT_ . $data['product_avatar'] ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                        </div>
                                        <div class="col-sm-8 ">
                                            <div class="font-size-18 text-danger">
                                                <span class="product_price" style="color: black;">
                                                    <span style="font-size: 16px;font-weight: 600;">tên sản phẩm:</span><?php echo $data['name_product'] ?>
                                                </span><br>
                                                <span style="color: black;" class="product_price"> <span style="font-size: 16px;font-weight: 600;">giá tiền:</span><?php echo formatPrice($data['price']) ?> VND</span><br>
                                                <span style="color: black;" class="product_price"> <span style="font-size: 16px;font-weight: 600;">số lượng:</span><?php echo $data['qty'] ?> sản phẩm</span><br>
                                                <span style="color: black;" class="product_price"> <span style="font-size: 16px;font-weight: 600;">tổng tiền:</span><?php echo formatPrice($data['price'] * $data['qty']) ?> VND</span><br>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <br>
                                <label for="">Tổng số lượng: <?php echo $sumQty ?></label>
                                <br>
                                <label>Tổng tiền tất cả: <?php echo  formatPrice($sumPrice) ?> VND</label>
                            </div>
                        </div>
                    </div>
            </div>


            </form>

            </div>
        </section>
        <!-- !start register -->
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>


    <!-- !start #footer -->


    <!-- validate script -->
    <script>
        var signUpForm = new Validator('#sign-up');
        signUpForm.onSubmit = function(data) {
            alert(JSON.stringify(data));
        }
    </script>
</body>

</html>