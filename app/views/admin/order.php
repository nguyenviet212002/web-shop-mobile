<?php

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
    <main id="main-site" style="padding-bottom: 60px;">
        <!-- start #manage -->
        <section id="manage-product" class="py-3">
            <div class="container">
                <div class="form-group">

                    <h2 style="padding: 20px 0 40px 0;" for="">Thông tin đơn hàng</h2>


                    <table class="table table-bordered table-data">
                        <thead>
                            <tr>
                                <th scope="colgroup rowgroup">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại </th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày mua hàng</th>
                                <th scope="col">Action</th>

                            </tr>


                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) { ?>
                                <tr data-id="1">
                                    <td>
                                        <p><?php echo $order['code_order'] ?> </p>
                                    </td>
                                   
                                    <td>
                                        <p><?php echo $order['fullname'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['address'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['phone'] ?> </p>
                                    </td>
                                    <td>
                                        <p><?php echo $order['email'] ?></p>
                                    </td>
                                 
                                    <td>
                                        <p><?php echo $order['purchase_date'] ?></p>
                                    </td>
                                    <td>
                                        <a href="<?php echo _FOLDER_ROOT_ . "/admin/chi-tiet-don-hang/" . $order['code_order'] ?>"><button type="submit" name="manage-delete" class="" style="background-color: #0d8efd;padding: 5px 10px;border-radius: 5px;border: 0;">Chi tiết</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


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