<?php
class HomeModel extends Database
{
    public function getBanner()
    {
        return $this->all('banners');
    }
    public function getTopseller()
    {
        $sql = "SELECT * FROM products
        INNER JOIN sell_products ON products.id = sell_products.id WHERE qty >= 10";
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function getProductdiscount()
    {
        $sql = 'SELECT * FROM products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE discount > 0 ';
        $query  = $this->_query($sql);
        $discountPrice = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($discountPrice, $row);
        }
        return $discountPrice;
    }
    public function brand()
    {
        return $this->all('categorys');
    }
    public function getNewproduct()
    {
        $lastMonth = date("m")-1;
        $formatDate = date("Y/".$lastMonth."/d");
        $sql = "SELECT * FROM products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE create_at >= '$formatDate'";
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
}
