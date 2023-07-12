<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $sumQty = 0;
    foreach ($_SESSION['cart'] as $data) {
        $sumQty += floatval($data['qty']);
    }
} else {
    $sumQty = 0;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="./assets/phone.png" type="image/x-icon">
    <title>Mobile Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/7860568151.js" crossorigin="anonymous"></script>
    <!-- form validate -->
    <link rel="stylesheet" href="https://ltp.crfnetwork.cyou/form-validate/css/style.css">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo _FOLDER_ROOT_ . '/public/acssets/clients/css/style.css' ?>">
</head>

<body>
    <div class="form-check form-switch ms-auto mt-3 me-3" id="formSwitch">
        <label class="form-check-label ms-3" for="inputSwicher">
            <i class="fas fa-sun light-mode"></i>
            <i class="fas fa-moon dark-mode d-none"></i>
        </label>
        <input class="form-check-input" type="checkbox" id="inputSwicher" />
    </div>
    <span id="top"></span>
    <a class="scroll-up" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- start #header -->
    <header id="header">
        <div class="topnav d-flex justify-content-end px-4 py-1">
            <div class="font-size-14">
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                <?php } else { ?>
                    <a href="<?php echo _FOLDER_ROOT_ . '/dang-nhap' ?>" class="px-3 border-start text-dark">Login</a>
                <?php } ?>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                <?php } else { ?>
                    <a href="<?php echo _FOLDER_ROOT_ . '/dang-ky' ?>" class="px-3 border-start text-dark">Register</a>
                <?php } ?>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
                <a href="<?php echo _FOLDER_ROOT_ . '/tai-khoan' ?>" class="px-3 border-start text-dark" style="text-transform: capitalize;"><?php echo $_SESSION['fullName'] ?></a>
                <?php } else { ?>
                    <a href="" class="px-3 border-start text-dark">Account</a>
                <?php } ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 1) {?>
                    <a href="<?php echo _FOLDER_ROOT_ . '/admin/quan-ly' ?>" class="px-3 border-start text-dark">Quản lý sản phẩm</a>
                <?php } ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 1) {?>
                    <a href="<?php echo _FOLDER_ROOT_ . '/admin/don-hang' ?>" class="px-3 border-start text-dark">Quản lý đơn hàng</a>
                <?php } ?>
                <a href="<?php echo _FOLDER_ROOT_ . '/log-out' ?>" class="px-3 border-start text-dark">Log-out</a>
            </div>
        </div>
        <!-- Primary Navigation -->
        <nav class="navbar navbar-expand-lg px-3 navbar-dark color-second-bg">
            <img src="<?php echo _FOLDER_ROOT_ . '/public/acssets/storage/phone.png' ?>" class="logo">
            <a class="navbar-brand" href="<?php echo _FOLDER_ROOT_ . '/trang-chu' ?>">Mobile Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo _FOLDER_ROOT_ . '/trang-chu' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#top-sale">Top sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#special-price">Special Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#new-phones">New Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo _FOLDER_ROOT_ . '/gio-hang' ?>">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Coming Soon</a>
                    </li>
                </ul>
                <form action="#" class="font-size-12">
                    <a href="<?php echo _FOLDER_ROOT_ . '/gio-hang' ?>" class="d-flex align-items-center rounded-pill bg-primary">
                        <span class="font-size-14 px-2 py-2 text-white">
                            <i class="fas fa-shopping-cart" aria-hidden="true" style="color: #ffff;"></i>
                        </span>
                        <div class="px-3 py-2 font-size-14 rounded-pill text-black bg-white"><?php echo $sumQty ?></div>
                    </a>
                </form>
            </div>
        </nav>
        <!-- !Primary Navigation -->
    </header>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!-- isotope plugin cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

    <!-- Custom Javascript -->

    <script src="<?php echo _FOLDER_ROOT_ . '/public/acssets/clients/js/main.js' ?>"></script>
    <script src="https://ltp.crfnetwork.cyou/form-validate/js/validator2.js"></script>
    <script src="https://cdn.crfnetwork.cyou/js/dark-mode-switch.js"></script>
    <script>
        $(document).ready(function() {
            // banner owl carousel
            $("#banner-area .owl-carousel").owlCarousel({
                dots: true,
                items: 1
            });

            // top sale owl carousel
            $("#top-sale .owl-carousel").owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            // isotope filter
            var $productFilter = $(".product-filter").isotope({
                itemSelector: '.product-filter-item',
                layoutMode: 'fitRows'
            });

            // filter items on button click
            $(".button-group").on("click", "button", function() {
                var filterValue = $(this).attr('data-filter');
                $productFilter.isotope({
                    filter: filterValue
                });
            })


            // new phones owl carousel
            $("#new-phones .owl-carousel").owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            // blogs owl carousel
            $("#blogs .owl-carousel").owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    }
                }
            })

            // are you sure to delete
            $(".btn-danger").click(function(event) {
                if (!confirm("Are you sure?")) {
                    // Prevent default behavior of the button if user clicks "Cancel"
                    event.preventDefault();
                    return;
                }
            });

            // select all input type file
            var imgInputs = $('input[type="file"][accept="image/*"]');
            imgInputs.each(function() {
                $(this).change(function() {
                    var img = $(this).get(0).files[0];
                    if (img) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            $(this).parent().find('img').attr("src", reader.result);
                        }.bind(this);
                        reader.readAsDataURL(img);
                    }
                });
            });

            // insert product row
            $manageProductTable = $("#manage-product .table-data");
            $manageProductTableBtn = $("#manage-product .btn.addItem");
            $manageProductItems = $("#manage-product .table-data tr[data-id]").length;
            $manageProductTableBtn.on("click", function() {
                $manageProductItems++;
                var html =
                    `<tr data-id="${$manageProductItems}">
                <td>
                    <input type="number" value="${$manageProductItems}" readonly name="id-${$manageProductItems}">
                </td>
                <td>
                    <input type="text" value="" name="name-${$manageProductItems}">
                </td>
                <td>
                    <select name="brand-${$manageProductItems}">
                        <option value="1">Samsung</option>
                        <option value="2">Redmi</option>
                        <option value="3">Apple</option>
                        <option value="4">Oppo</option>
                        <option value="5">Nokia</option>
                    </select>
                </td>
                <td>
                    <input type="text" value="" disabled name="origin-${$manageProductItems}">
                </td>
                <td>
                    <input type="number" step="0.01" value="0.00" name="price-${$manageProductItems}">
                </td>
                <td>
                    <div class="preview-image">
                        <img src="#" alt="preview">
                        <input type="file" name="image-${$manageProductItems}" accept="image/*">
                    </div>
                </td>
                <td>
                    <button type="submit" name="manage-insert" formaction="manage.php?id=${$manageProductItems}"
                        class="btn btn-success">Insert</button>
                </td>
                <td>
                    <button type="submit" name="manage-delete" formaction="manage.php?id=${$manageProductItems}"
                        class="btn btn-danger">Delete</button>
                </td>
            </tr>`;

                $manageProductRow = $("#manage-product .table-data tbody").get(0).insertRow(-1);
                $manageProductRow.innerHTML = html;
            });

            // insert product row
            $accMemberTable = $("#account-member .table-data");
            $accMemberTableBtn = $("#account-member .btn.addItem");
            $accMemberItems = $("#account-member .table-data tr[data-id]").length;
            $accMemberTableBtn.on("click", function() {
                $accMemberItems++;
                var html =
                    `<tr data-id="${$accMemberItems}">
                <td>
                    <input type="number" value="${$accMemberItems}" readonly name="id-${$accMemberItems}">
                </td>
                <td>
                    <input type="text" value="" name="username-${$accMemberItems}" class="text-center">
                </td>
                <td>
                    <input type="text" value="" name="password-${$accMemberItems}" class="text-center">
                </td>
                <td>
                    <select name="privilege-1">
                        <option value="1">Admin</option>
                        <option value="0" selected>User</option>
                    </select>
                </td>
                <td>
                    <button type="submit" name="account-insert" formaction="account.php?id=${$accMemberItems}"
                        class="btn btn-success">Insert</button>
                </td>
                <td>
                    <button type="submit" name="account-delete" formaction="account.php?id=${$accMemberItems}"
                        class="btn btn-danger">Delete</button>
                </td>
            </tr>`;

                $accMemberRow = $("#account-member .table-data tbody").get(0).insertRow(-1);
                $accMemberRow.innerHTML = html;
            });

        });
    </script>
</body>

</html>