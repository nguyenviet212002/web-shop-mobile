<?php
class Product extends Controller
{
   public $model;
   public $data;

   public function __construct()
   {
      $this->model = $this->model('ProductModel');
   }
   function edit($id)
   {
      $this->data['value'] = $this->model->editSP($id);
      $view = $this->render('product/product', $this->data);
   }
   function doEdit($id)
   {
      $nameProduct = $_REQUEST['tenSP'];
      $priceProduct = $_REQUEST['giaSP'];
      $datas = [
         "ten_san_pham" => $nameProduct,
         "gia_san_pham" => $priceProduct
      ];
      $this->data['product_list'] = $this->model->getAll();
      $this->data['value'] = $this->model->doEditSP($id, $datas);
      return $view = $this->render('home/home', $this->data);
   }
   function delete($id)
   {
      $this->data['value'] = $this->model->deleteSP($id);
      $this->data['product_list'] = $this->model->getAll();
      $view = $this->render('home/home', $this->data);
   }
   function search()
   {
      $searchSP = $_REQUEST['searchSP'];
      $this->data['product_list'] = $this->model->searchSP($searchSP);
      $view = $this->render('product/search', $this->data);
   }
}
