<?php
class Payment extends Home
{
  public $data;
  public $model;
  function __construct()
  {
    $this->model = $this->model('PaymentModel');
  }
  function index($id = [''])
  {
    if (isset($_SESSION['login']) == true) {
      if (isset($_SESSION['cart']) && $_SESSION['cart'] == true) {
        if (is_string($id)) {
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
        }
        $view = $this->render('client/payment');
      } else {
        echo 'chua co san pham trong gio hang';
      }
    } else {
      echo 'ban can phai dang nhap de mua hang';
    }
  }
  function bill()
  {
    $fullName = $_REQUEST['fullname'];
    $address = $_REQUEST['address'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $city = $_REQUEST['city'];
    $desiption = $_REQUEST['desiption'];

    $this->model->createBill($fullName, $address, $phone, $email, $city, $desiption);
    return $view = $this->home();
  }
}
