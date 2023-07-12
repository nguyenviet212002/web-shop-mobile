<?php 
class AdminManageModel extends Database{
    public function getProduct(){
        $sql = 'SELECT * FROM  products
        INNER JOIN categorys ON products.category_id = categorys.category_id ';
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function deleteProduct($id){
        $data = $this->delete('products','id',$id);
       return $data;
    }

    public function editProduct($id)
    {
        $sql = 'SELECT * FROM  products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE id = '.$id;
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function doEditProduct($id,$product,$nameImg)
    {
        $nameImg = "/" . $nameImg;
        $this->edit('products', [
            'name_product' => $product['name'],
            'price' => $product['price'],
            'discount' => $product['discount'],
            'description' => $product['description'],
            'product_avatar' => $nameImg,
            'update_at' => date("Y/m/d"),
            'category_id' => $product['brand'],
        ],$id);
    }
   
}