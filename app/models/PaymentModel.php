<?php
class PaymentModel extends Database
{
    function session($id)
    {
        $sql = 'SELECT * FROM products
        INNER JOIN categorys ON products.category_id = categorys.category_id WHERE id = ' . $id;
        $query  = $this->_query($sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    function createBill($fullName, $address, $phone, $email, $city, $desiption)
    {
        $codeOrder = rand(0, 9999);
        $check = $this->select('sell_products', 'id');
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $this->create('orders', [
                    'quantity' => $cart['qty'],
                    'id' => $cart['id'],
                    'code_order' => $codeOrder,
                    'purchase_date' => date("Y/m/d"),
                    'create_at' => date("Y/m/d"),
                    'updated_at' => date("Y/m/d"),
                ]);
                if (isset($check)) {
                    $id = $cart['id'];
                    $sql  = "SELECT SUM(qty) FROM sell_products WHERE id = '$id'";
                    $query  = $this->_query($sql);
                    $row = mysqli_fetch_assoc($query);
                    foreach ($check as $checkid) {
                    }
                    if (is_array($check) != $cart['id']) {
                        $this->create(
                            'sell_products',
                            [
                                'qty' => $cart['qty'],
                                'id' => $cart['id'],
                                'created_at' => date("Y/m/d"),
                                'updated_at' => date("Y/m/d"),
                            ]
                        );
                    }

                    if (is_array($check) == $cart['id']) {
                        foreach ($row as $sumqty) {
                            $sumqty = $sumqty + $cart['qty'];
                            $this->edit('sell_products', ['qty' => $sumqty, 'updated_at' => date("Y/m/d")], $cart['id']);
                        }
                    }
                }
            }
            $this->create('payments', [
                'fullname' => $fullName,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'city' => $city,
                'description' => $desiption,
                'code_order' => $codeOrder
            ]);
            unset($_SESSION['cart']);
        }
    }
}
