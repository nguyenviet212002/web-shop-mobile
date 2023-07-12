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
        <!-- start register -->
        <section class="register">
            <div class="main py-3">
                <!-- sign up -->
                <?php foreach ($data as $product) { ?>
                <form method="POST" action="<?php echo _FOLDER_ROOT_ . "/admin/sua-san-pham/".$product['id'] ?>" enctype="multipart/form-data" class="form" id="sign-up">
                    <h3 class="heading" style="padding-bottom: 30px;">Thêm sản phẩm</h3>
                    <!-- <p class="desc">Thêm sản phẩm </p> -->
                        <div class="row" style="width: 800px;">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fullname" class="form-label">Tên sản Phẩm (*)</label>
                                    <input id="fullname" name="name" type="text" rules="required" placeholder="Nhập tên sản phẩm" class="form-control" value="<?php echo $product['name_product'] ?>">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="form-label">Giá sản phẩm (*)</label>
                                    <input id="username" name="price" type="number" rules="required|min:3|max:10" placeholder="Nhập giá sản phẩm" class="form-control" value="<?php echo $product['price'] ?>">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Giảm giá (*)</label>
                                    <select name="discount" selected="selected">
                                        <option value="<?php echo $product['discount'] ?>" selected hidden><?php echo $product['discount'] ?>%</option>
                                        <option value="0">0%</option>
                                        <option value="20">20%</option>
                                        <option value="40">40%</option>
                                        <option value="60">60%</option>
                                        <option value="80">80&</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Thương hiệu (*)</label>
                                    <select name="brand">
                                        <?php foreach ($categorys as $category) { ?>
                                            <option value="<?php echo $product['category_id'] ?>" selected hidden><?php echo $product['name_category'] ?></option>
                                            <option value="<?php echo $category['category_id'] ?>"><?php echo $category['name_category'] ?>
                                            </option>
                                        <?php }  ?>
                                    </select>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="avatar" class="form-label">Ảnh sản phẩm</label>
                                        <input id="avatar" name="image" type="file" class="form-radio-control" value="<?php echo $product['product_avatar'] ?> ">
                                        <span class="form-message"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Mô tả sản phẩm (*)</label>
                                        <input id="email" name="description" value="<?php echo $product['description'] ?>" type="text" placeholder="Nhập mô tả tả phẩm" class="form-control">
                                        <span class="form-message"></span>
                                    </div>
                                    <button class="form-submit" type="submit" name="submit">thêm sản phẩm</button>
                                <?php }  ?>
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
        // var signUpForm = new Validator('#sign-up');
        // signUpForm.onSubmit = function(data) {
        //     alert(JSON.stringify(data));
        // }
    </script>
</body>

</html>