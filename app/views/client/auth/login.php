<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo _FOLDER_ROOT_ .'/public/acssets/storage/phone.png'?>" type="image/x-icon">
    <title>Mobile Shop</title>
</head>

<body>
    <!-- start #header -->
    <?php $this->render('blocks/header') ?>
    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site">
        <!-- start login -->
        <section class="login">
            <div class="main py-3">
                <!-- log in -->
                <form method="POST" action="<?php echo _FOLDER_ROOT_.'/check-dang-nhap'?>" class="form" id="sign-in">
                    <h3 class="heading">Sign in</h3>
                    <p class="desc">Log in to enjoy exclusive offers for you!</p>
                    <div class="row" style="width: 400px;">
                        <div class="col">
                            <div class="form-group">
                                <label for="username" class="form-label">Username (*)</label>
                                <input id="username" name="username" type="text" rules="required|min:3|max:10"
                                    placeholder="Nhập tên đăng nhập của bạn" class="form-control">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">Password (*)</label>
                                <input id="password" name="password" type="password" rules="required|min:3"
                                    placeholder="Nhập mật khẩu" class="form-control">
                                <span class="form-message"></span>
                            </div>
                        </div>
                    </div>

                    <button class="form-submit" name="login-submit">Sign in</button>
                    <p class="desc">Don't have an account? <a href="./register.html">Sign up</a></p>
                </form>

            </div>
        </section>
        <!-- !start login -->
    </main>
    <!-- !start #main-site -->
    <!-- start #footer -->
    <?php $this->render('blocks/footer') ?>
    <!-- !start #footer -->
    
    <script>
        var signInForm = new Validator('#sign-in');
        signInForm.onSubmit = function (data) {
            alert(JSON.stringify(data));
        }
    </script>
</body>

</html>