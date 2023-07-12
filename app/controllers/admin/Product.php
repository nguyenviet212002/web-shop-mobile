<?php
class Product extends Controller
{
   public $model;
   public $data;

   public function __construct()
   {
      $this->model = $this->model('AdminProductModel');
   }

   function Product()
   {
      $this->data['categorys'] = $this->model->getCategory();
      return $this->render('admin/product', $this->data);
   }
   function createProduct()
   {
      $product = [
         'name' => $_REQUEST['name'],
         'price' => $_REQUEST['price'],
         'discount' => $_REQUEST['discount'],
         'description' => $_REQUEST['description'],
         'brand' => $_REQUEST['brand']
      ];
      $fileImage = $_FILES['image']['name'];
      $fileError = $_FILES['image']['error'];
      $fileTmpname = $_FILES['image']['tmp_name'];
      $fileSize = $_FILES['image']['size'];
      if (isset($_POST['submit']) && isset($_FILES['image'])) {
         if ($fileError === 0) {
            if ($fileSize > 500000) {
               echo 'file qua lon';
            } else {
               $img_ex  = pathinfo($fileImage, PATHINFO_EXTENSION);
               $img_ex_lc = strtolower($img_ex);
               $ex = ['jpg', 'img', 'jpeg', 'png'];
               if (in_array($img_ex, $ex)) {
                  $new_img_name  = uniqid('IMG-', true) . '.' . $img_ex_lc;
                  $img_upload_path = 'public/acssets/storage/productphotos/' . $new_img_name;
                  move_uploaded_file($fileTmpname, $img_upload_path);
                  $this->model->createProduct($product, $img_upload_path);
               }
            }
         } else {
            echo 'upload file loi';
         }
      } else {
         header('location:http://localhost/web-ban-hang-mvc/admin/san-pham');
      }
      $this->data['product_lists'] = $this->model('AdminManageModel')->getProduct();
      return $this->render('admin/manage', $this->data);
   }
}
