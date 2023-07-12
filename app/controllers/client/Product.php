<?php
class Product extends Controller
{
  public $data;
  public $model;
  function __construct()
  {
    $this->model = $this->model('ProductModel');
  }
  function index($id)
  {
    $this->data['productDetails'] = $this->model->productDetails($id);
    $this->data['review'] = $this->model->getReview($id);
    $this->data['getTopseller'] = $this->model->getTopseller($id);
    $view = $this->render('client/product',$this->data);
  }
  function buyProduct($id)
  {
    $row = $this->model('CartModel')->session($id);
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
      $_SESSION['cart'][$id] = $row;
      $_SESSION['cart'][$id]['qty'] = 1;
    } else {
      if (array_key_exists($id, $_SESSION['cart'])) {
        $_SESSION['cart'][$id]['qty'] += 1;
      } else {
        $_SESSION['cart'][$id] = $row;
        $_SESSION['cart'][$id]['qty'] = 1;
      }
    }
    $this->data['sessionCart'] = $_SESSION['cart'];
    $this->data['newPhone'] = $this->model('CartModel')->getNewproduct();
    $view = $this->render('client/cart', $this->data);
  }

}