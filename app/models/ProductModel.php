<?php
class ProductModel extends Database
{
    public function productDetails($id){
        $sql = 'SELECT * FROM  products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE id = '.$id;
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getTopseller()
    {
        return $this->all('products');
    }
    public function getReview($id)
    {
        $sql = 'SELECT * FROM  reviews
        INNER JOIN accounts ON reviews.account_id = accounts.account_id 
        INNER JOIN products ON products.id = reviews.id WHERE products.id = '.$id;
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
}
