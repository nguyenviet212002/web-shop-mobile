<?php

class HomeModel extends Database
{
    const TABLE = 'products';
    public function getList()
    {   
        return $this->select(self::TABLE,['id','ten_san_pham','gia_san_pham']);
    }
}
