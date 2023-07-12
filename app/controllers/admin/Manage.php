<?php
class Manage extends Controller
{
  public $data;
  public $model;
  function __construct()
  {
    $this->model = $this->model('AdminManageModel');
  }
  function index()
  {
    $this->data['product_lists'] = $this->model('AdminManageModel')->getProduct();
    $view = $this->render('admin/manage', $this->data);
  }

  function editProduct($id)
  {
    $this->data['data'] = $this->model->editProduct($id);
    $this->data['categorys'] = $this->model('AdminProductModel')->getCategory();
    $view = $this->render('admin/edit_product', $this->data);
  }

  function doEditProduct($id)
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
          $ex = ['jpg', 'img', 'jpeg'];
          if (in_array($img_ex, $ex)) {
            $new_img_name  = uniqid('IMG-', true) . '.' . $img_ex_lc;
            $img_upload_path = 'public/acssets/storage/productphotos/'.$new_img_name;
            move_uploaded_file($fileTmpname, $img_upload_path);
          }
        }
      } else {
        echo 'upload file loi';
      }
    } else {
      header('location:http://localhost/web-ban-hang-mvc/admin/form-sua-san-pham');
    }
    $this->model->doEditProduct($id,$product, $img_upload_path);
    $this->data['product_lists'] = $this->model->getProduct();
    return $this->render('admin/manage', $this->data);
  }
  function delete($id)
  {
    $this->model->deleteProduct($id);
    $view = $this->index();
  }

  // function search()
  // {
  //    $searchSP = $_REQUEST['searchSP'];
  //    $this->data['product_list'] = $this->model->searchSP($searchSP);
  //    $view = $this->render('product/search', $this->data);
  // }

}
