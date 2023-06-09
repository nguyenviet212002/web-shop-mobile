<?php
class ConnectDB
{
    const HOST = 'localhost';
    const USERS = 'root';
    const PASSWORD = '';
    const DB_NAME = 'web_ban_hang';

    private $connect;
    public function connect()
    {
        $this->connect = new mysqli(self::HOST, self::USERS, self::PASSWORD,self::DB_NAME);

        // Check connection
        if ($this->connect->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connect->connect_error;
            exit();
        }
        return $this->connect;
        // $this->connect = new mysqli(self::HOST, self::USERS, self::PASSWORD,self::DB_NAME);
        // mysqli_set_charset($this->connect,'utf8');
        // // Check connection
        // if ($this->connect->connect_error) {
        //     die("Connection failed: " . $this->connect->connect_error);
        // }
    }
   
}
