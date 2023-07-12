<?php
class AdminOrderModel extends Database
{

    public function getAllOrder()
    {
       
        $sql = 'SELECT * FROM  orders
        INNER JOIN payments ON payments.code_order = orders.code_order GROUP BY orders.code_order ORDER BY  orders.code_order ASC';
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function getOrder($codeOrder)
    {
        $sql = 'SELECT * FROM  orders
        INNER JOIN products ON products.id = orders.id INNER JOIN payments ON payments.code_order = orders.code_order WHERE  payments.code_order = ' . $codeOrder;
        $query  = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }


    public function getInfor($codeOrder)
    {
        $data = $this->where('payments' , 'code_order','=',$codeOrder);
        return $data;
    
    }
}
