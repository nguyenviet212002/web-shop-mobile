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
                <form method="POST" action="<?php echo _FOLDER_ROOT_."/admin/them-san-pham"?>" enctype="multipart/form-data" class="form" id="sign-up" >
                    <h3 class="heading" style="padding-bottom: 30px;">Thêm sản phẩm</h3>
                    <!-- <p class="desc">Thêm sản phẩm </p> -->
                    <div class="row" style="width: 800px;">
                        <div class="col">
                            <div class="form-group">
                                <label for="fullname" class="form-label">Tên sản Phẩm (*)</label>
                                <input id="fullname" name="name" type="text" rules="required" placeholder="Nhập tên sản phẩm" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="username" class="form-label">Giá sản phẩm (*)</label>
                                <input id="username" name="price" type="number" rules="required|min:3|max:10" placeholder="Nhập giá sản phẩm" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">Giảm giá (*)</label>
                                <select name="discount">
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
                                <?php foreach($categorys as $category){?>
                                    <option value="<?php echo $category['category_id'] ?>"><?php echo $category['name_category'] ?></option>
                                  <?php }  ?>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="avatar" class="form-label">Ảnh sản phẩm</label>
                                    <input id="avatar" name="image" type="file" class="form-radio-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Mô tả sản phẩm (*)</label>
                                    <input id="email" name="description" type="text"  placeholder="Nhập mô tả tả phẩm" class="form-control">
                                    <span class="form-message"></span>
                                </div>
                                <button class="form-submit" type="submit" name="submit">thêm sản phẩm</button>
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