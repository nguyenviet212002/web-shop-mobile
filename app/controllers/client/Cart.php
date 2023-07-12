<?php
class Cart extends Controller
{
  public $data;
  public $model;
  function __construct()
  {
    $this->model = $this->model('CartModel');
  }
  function index()
  {
    $this->data['newPhone'] = $this->model->getNewproduct();
    if (isset($_SESSION['cart'])) {
      $this->data['sessionCart'] = $_SESSION['cart'];
      $view = $this->render('client/cart', $this->data);
    } else {
      $view = $this->render('client/cart', $this->data);
    }
  }
  function cart($id)
  {
    $row = $this->model->session($id);
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
    $this->data['newPhone'] = $this->model->getNewproduct();
    $view = $this->render('client/cart', $this->data);
  }
  function minus($id)
  {
    $this->data['newPhone'] = $this->model->getNewproduct();
    if ( isset($_SESSION['cart'][$id]['qty']) && $_SESSION['cart'][$id]['qty'] != NULL) {
      if ($_SESSION['cart'][$id]['qty'] > 1) {
        $_SESSION['cart'][$id]['qty'] -= 1;
        $this->data['sessionCart'] = $_SESSION['cart'];
        $view = $this->render('client/cart', $this->data);
      } else {
        unset($_SESSION['cart'][$id]);
        if (isset($_SESSION['cart'])) {
          $this->data['sessionCart'] = $_SESSION['cart'];
          return $view = $this->render('client/cart', $this->data);
        } else {
          return $view = $this->render('client/cart', $this->data);
        }
      }
    }else{
      return $view = $this->render('client/cart', $this->data);
    }
  }
  function plus($id)
  {
    $_SESSION['cart'][$id]['qty'] += 1;
    $this->data['sessionCart'] = $_SESSION['cart'];
    $this->data['newPhone'] = $this->model->getNewproduct();
    $view = $this->render('client/cart', $this->data);
  }
  function delete($id)
  {
    unset($_SESSION['cart'][$id]);
    $this->data['sessionCart'] = $_SESSION['cart'];
    $this->data['newPhone'] = $this->model->getNewproduct();
    $view = $this->render('client/cart', $this->data);
  }
}
