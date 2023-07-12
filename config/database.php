<?php
class ConnectDB
{
    const HOST = 'localhost'; //tên serve
    const USERS = 'root'; //tên user cơ sở dũ liệu
    const PASSWORD = '';//mật khẩu cơ sở dũ liệu
    const DB_NAME = 'web_ban_dt'; //tên data-base

    private $connect;
    public function connect() //kết nối đến cơ sở dũ liệu mysql
    {
        $this->connect = new mysqli(self::HOST, self::USERS, self::PASSWORD,self::DB_NAME);

        // Check connection
        if ($this->connect->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connect->connect_error;
            exit();
        }
        return $this->connect;
    }
   
}
