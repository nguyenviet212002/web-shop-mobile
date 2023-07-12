<?php
class Home extends Controller
{
  public $data;

  function home()
  {
    $this->data['photoBanner'] = $this->model('HomeModel')->getBanner();
    $this->data['brands'] = $this->model('HomeModel')->brand();
    $this->data['productTop'] = $this->model('HomeModel')->getTopseller();
    $this->data['discountPrice'] = $this->model('HomeModel')->getProductdiscount();
    $this->data['newPhone'] = $this->model('HomeModel')->getNewproduct();
    $view = $this->render('client/index', $this->data);
  }

}
