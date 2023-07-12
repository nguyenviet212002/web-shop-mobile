<?php
class Login extends Home
{
  public $data;
  public $model;

  function __construct()
  {
    $this->model = $this->model('AuthModel');
  }

  function index()
  {
    $view = $this->render('client/auth/login');
  }

  public function checkAuth()
  {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $this->model->checkLogin($username, $password);
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      return $view = $this->home();
    }
  }
  public function logout()
  {
    unset($_SESSION['login']);
    unset($_SESSION['fullName']);
    unset($_SESSION['account_id']);
    unset($_SESSION['role']);
    $view = $this->home();
  }
}
