<?php
class AdminProductModel extends Database
{

    public function getCategory()
    {
        return $this->all('categorys');
    }
   
    public function createProduct($product, $nameImg)
    {
        $nameImg = "/" . $nameImg;
        $this->create('products', [
            'name_product' => $product['name'],
            'price' => $product['price'],
            'discount' => $product['discount'],
            'description' => $product['description'],
            'product_avatar' => $nameImg,
            'create_at' => date("Y/m/d"),
            'update_at' => date("Y/m/d"),
            'category_id' => $product['brand'],
        ]);
    }
}
