<?php
class AuthModel extends Database
{
   public function checkLogin($username, $password)
   {
      if (session_status() == PHP_SESSION_NONE) {
         session_start();
      }
      $getUserName = $this->all('accounts');
      foreach ($getUserName as $data) {
         if ($username == $data['username']  && md5($password) == $data['password']) {
            if ($data['role'] == 1) {
               $_SESSION['role'] = 1;
            }
            $_SESSION['login'] = true;
            $_SESSION['fullName'] = $data['fullname'];
            $_SESSION['account_id'] = $data['account_id'];
            return true;
         } 
      }
   }
   public function register($account)
   {  
      $getUserName = $this->all('accounts');
      foreach ($getUserName as $data) {
      }
      if ($data['username'] != $account['username']) {
         $password = md5($account['password']);
         $data = $this->create(
            'accounts',
            [
               'fullname' => $account['fullname'],
               'address' => $account['address'],
               'email' => $account['email'],
               'city' => $account['city'],
               'phone' => $account['phone'],
               'gender' => $account['gender'],
               'username' => $account['username'],
               'password' => $password,
               'role' => 0,
               'create_at' => date("Y/m/d"),
               'updated_at' => date("Y/m/d"),
            ],
         );
         return $data;
      }else {
         echo 'đã có tài khoản';
      }
   }
}
