<?php
class Home extends Controller
{
  public $data;
  public $model;
  function __construct()
  {
    $this->model = $this->model('HomeModel');
  }
  function index()
  {
    $this->data['product_list'] = $this->model->getList();
    $view = $this->render('home/home', $this->data);
  }
  // function index()
  // {
  //   $this->data['content'] = 'home/home';
  //   $view = $this->render('layouts/client_layouts', $this->data);
  // }
}
