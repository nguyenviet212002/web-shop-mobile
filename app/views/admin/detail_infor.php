<?php
$sumQty = 0;
$sumPrice = 0;
foreach ($orders as $order) {
    $priceDiscount  = $order['price'] - ($order['price'] * ($order['discount'] * 0.01));
    $sumQty += floatval($order['quantity']);
    $sumPrice += floatval($order['quantity'] * $priceDiscount);
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
    <?php $this->render('blocks/header') ?>

    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site">
        <!-- start #manage -->
        <section id="manage-product" class="py-3">
            <div class="container">
                <div class="form-group">
                    <h2 style="padding: 20px 0 40px 0;color: #0d8efd;" for="" >Thông tin khách hàng</h2>
                    <table class="table table-bordered table-data">
                        <thead>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($accounts as $account) { ?>
                                <tr>
                                    <td>
                                        <p><?php echo $account['payment_id'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $account['fullname'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $account['address'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $account['phone'] ?></p>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <h2 style="padding: 20px 0 40px 0;color: #0d8efd;" for="">Thông tin đơn hàng</h2>
                    <?php foreach ($accounts as $account) { ?>

                        <h6 style="padding: 0 0 10px 0;color: crimson;">Mã đơn hàng: <?php echo $account['code_order'] ?></h6>
                    <?php } ?>
                    <table class="table table-bordered table-data">
                        <thead>
                            <tr>
                                <th scope="colgroup rowgroup">Mã sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Ngày mua hàng</th>

                            </tr>


                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) { ?>
                                <tr data-id="1">
                                    <td>
                                        <p><?php echo $order['id'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['name_product'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['quantity'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo (formatPrice($order['price'])) ?> VND</p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['discount'] ?>%</p>
                                    </td>
                                    <td>
                                        <p><?php echo (formatPrice($order['quantity'] * ($order['price'] - ($order['price'] * ($order['discount'] * 0.01))))) ?> VND</p>
                                    </td>
                                    <td>
                                        <div class="preview-image">
                                            <img src="<?php echo _FOLDER_ROOT_ . $order['product_avatar'] ?>" alt="preview">
                                        </div>
                                    </td>
                                    <td>
                                        <p><?php echo $order['purchase_date'] ?></p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div >
                        <h6 style="padding: 0 0 10px 0;color: crimson;">Số lượng: <?php echo $sumQty ?></h6>
                        <h6 style="padding: 0 0 10px 0;color: crimson;">Tổng tiền đơn hàng: <?php echo (formatPrice($sumPrice)) ?> VND</h6>
                    </div>

                </div>
            </div>
        </section>
        <!-- !start #manage -->
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>


</body>

</html>