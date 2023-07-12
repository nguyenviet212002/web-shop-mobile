<?php
class Register extends Home
{
  public $model;

  function index()
  {
    $view = $this->render('client/auth/register');
  }

  function createAccount()
  {

    $account = [
      'fullname' => $_REQUEST['fullname'],
      'username' => $_REQUEST['username'],
      'password' => $_REQUEST['password'],
      'phone' => $_REQUEST['phone'],
      'email' => $_REQUEST['email'],
      'city' => $_REQUEST['city'],
      'gender' => $_REQUEST['gender'],
      'address' => $_REQUEST['address'],
    ];
    $this->model('AuthModel')->register($account);
    $view = $this->home();
  }
}
