<?php
class CartModel extends Database
{
    public function getNewproduct()
    {
        $sql = 'SELECT * FROM products
        INNER JOIN categorys ON products.category_id = categorys.category_id ';
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    function session($id)
    {
        $sql = 'SELECT * FROM products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE id = ' . $id;
        $query  = $this->_query($sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}
