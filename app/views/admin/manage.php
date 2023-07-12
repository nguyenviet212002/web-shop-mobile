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
<?php $this->render('blocks/header') ?>
    
    <!-- !start #header -->
    <!-- start #main-site -->
    <main id="main-site"  style="padding-bottom:30px;">
        <!-- start #manage -->
        <section id="manage-product" class="py-3">
            <div class="container">
                    <div class="form-group">
                        <table class="table table-bordered table-data">
                            <thead>
                                <tr>
                                    <th scope="colgroup rowgroup">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Thương hiệu</th>
                                    <th scope="col">Giá sản phẩm</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Ảnh sản phẩm</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Add item</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($product_lists as $product_list){ ?>
                                <tr data-id="1">
                                    <td>
                                        <p><?php echo $product_list['id'] ?></p>
                                    </td>
                                    <td>
                                       <p><?php echo $product_list['name_product'] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $product_list['name_category'] ?></p>
                                    </td>
                                    <td>
                                    <p><?php echo $product_list['price'] ?></p>
                                    </td>
                                    <td>
                                    <p><?php echo $product_list['discount'] ?></p>
                                    </td>
                                    <td >
                                            <img style="width: 50px;height: 60px;" src="<?php echo _FOLDER_ROOT_.$product_list['product_avatar'] ?>" alt="preview">
                                    </td>
                                    <td>
                                    <p><?php echo $product_list['create_at'] ?></p>
                                    </td>
                                    <td>
                                    <p><?php echo $product_list['update_at'] ?></p>
                                    </td>
                                    <td>
                                        <a href="<?php echo _FOLDER_ROOT_."/admin/form-sua-san-pham/".$product_list['id']?>"><button type="submit" name="manage-update" formaction="manage.html?id=1"
                                            class="btn btn-warning">Update</button></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo _FOLDER_ROOT_."/admin/xoa-san-pham/".$product_list['id']?>"><button type="submit" name="manage-delete" formaction="manage.html?id=1"
                                            class="btn btn-danger">Delete</button></a>
                                    </td>
                                    <td>
                                    <a href="<?php echo _FOLDER_ROOT_.'/admin/them-san-pham'?>"><button type="button" class="btn btn-secondary" >Add Item</button></a> 
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