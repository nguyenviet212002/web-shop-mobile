<?php

// form DB Mysqli

class Database extends ConnectDB
{
    // lay tat ca cac gia tri theo dieu kien
    public function fetchAll($table, $collum = ['*'], $orderBY = '', $limit = 0)
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = cot can select(['array'])(khong bat buoc)
        // ($collum = string lay tat ca || $collum = array lay gia tri duoc chon  )
        // $orderBY = sap xep theo cot('string DESC||ASC')(khong bat buoc)
        // $limit = so ban ghi muon lay (number)(khong bat buoc)($limit<0 = all||$limit>=1 =so muon lay)

        if (is_numeric($limit) && !is_string($limit) && !is_array($limit)) {
            $collum = implode(',', $collum);
            if (is_numeric($orderBY) == true) {
                $limit = $orderBY;
            }
            if ($limit == 0) {
                if ($orderBY == '') {
                    $getQuery = "SELECT $collum FROM $table ";
                } else {
                    $getQuery = "SELECT $collum FROM $table ORDER BY $orderBY ";
                }
            } else {
                if ($orderBY == '' || !is_string($orderBY)) {
                    $getQuery = "SELECT $collum FROM $table LIMIT $limit";
                } else {
                    $getQuery = "SELECT $collum FROM $table ORDER BY $orderBY LIMIT $limit";
                }
            }

            $query = $this->_query($getQuery);
            $data = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }
        } else {
            echo ('ban can phai truyen vao gia tri so');
            exit;
        }
        return $data;
    }

    // sap xep theo cot
    public function all($table)
    {
        // $table = ten bang (string)(batBuoc)

        $getQuery = "SELECT * FROM $table";
        $query = $this->_query($getQuery);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // chon cac gia tri muon lay
    public function select($table, $collum = ['*'])
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = cot can select(['array'])(khong bat buoc)
        // ($collum = string lay tat ca || $collum = array lay gia tri duoc chon  )

        if (is_array($collum)) {
            $collum = implode(',', $collum);
        } else {
            $collum = '*';
        }
        $getQuery = "SELECT $collum FROM $table";
        $query = $this->_query($getQuery);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // chon cac gia tri muon lay
    public function orderBY($table, $collum = ['*'], $orderBY = '')
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = cot can select(['array'])(khong bat buoc)
        // ($collum = string lay tat ca || $collum = array lay gia tri duoc chon )
        // $orderBY = sap xep theo cot('string DESC||ASC')(khong bat buoc)

        if (is_array($collum)) {
            $collum = implode(',', $collum);
        } else {
            $collum = '*';
        }
        if ($orderBY == '') {
            $getQuery = "SELECT $collum FROM $table ";
        } else {
            $getQuery = "SELECT $collum FROM $table ORDER BY $orderBY ";
        }
        $query = $this->_query($getQuery);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // $limit = so ban ghi muon lay 
    public function limit($table, $collum = ['*'], $limit = 1)
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = cot can select(['array'])(khong bat buoc)
        // ($collum = string lay tat ca || $collum = array lay gia tri duoc chon  )
        // $limit = so ban ghi muon lay (number)(khong bat buoc)($limit<0 = 1||$limit>=1 =so muon lay)

        if (is_numeric($collum) == true) {
            $limit = $collum;
        }
        if (is_array($collum) && !is_numeric($collum)) {
            $collum = implode(',', $collum);
        } else {
            $collum = '*';
        }
        $getQuery = "SELECT $collum FROM $table LIMIT $limit";
        $query = $this->_query($getQuery);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // them du lieu vao trong DB
    public function create($table, $data)
    {
        // $table = ten bang (string)(batBuoc)
        // $data = ten cot && gia tri muon them (['array'])(bat buoc)

        $key = implode(',', array_keys($data));
        $value = implode(',', array_values($data));
        $str_value = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));
        $str_value = implode(',', $str_value);
        $insert = "INSERT INTO $table ($key) VALUES ($str_value)";
        $query = $this->_query($insert);
        echo ('them du lieu thanh cong');
    }

    // tim kiem theo id
    public function find($table, $collum, $id)
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = ten cot id (string)(bat buoc)
        // $id = id can tim (number)||(number->string)(bat buoc)

        if (is_numeric($id) && !is_array($id)) {
            $findID = "SELECT * FROM $table where $collum = $id";
            $query = $this->_query($findID);
            $data =  mysqli_fetch_array($query);
        } else {
            echo ('ban can phai truyen vao gia tri so');
            exit;
        }
        return $data;
    }

    // sua gia tri theo id
    public function edit($table, $data, $id)
    {
        // $table = ten bang (string)(batBuoc)
        // $data = ten cot can sua && gia tri sua (['array'])(bat buoc)
        // $id = id can sua (number)(bat buoc)

        $dataSet = [];
        foreach ($data as $key => $value) {
            array_push($dataSet, "${key} = '" . $value . "'");
        }
        $dataSetstring = (implode(',', $dataSet));
        $sql = "UPDATE $table SET $dataSetstring WHERE id = $id";
        $query = $this->_query($sql);
        echo 'update thanh cong';
    }

    // xoa theo id
    public function delete($table, $collum_id, $id)
    {
        // $table = ten bang (string)(batBuoc)
        // $collum_id = ten cot id can xoa (string)(bat buoc)
        // $id = id can xoa (number)(bat buoc)

        $sql = "DELETE FROM $table WHERE $collum_id = $id";
        $query = $this->_query($sql);
        echo 'xoa thanh cong';
    }

    // lay du lieu theo dieu kien
    public function where($table, $collum, $operator, $data)
    {
        // $table = ten bang (string)(batBuoc)
        // $collum = ten cot can so sanh (string)(bat buoc)
        // $operator = toan tu so sanh (><=)(bat buoc)
        // $data = du lieu so sanh (><=)(bat buoc)

        $sql = "SELECT * FROM $table WHERE $collum $operator '$data'";
        var_dump($sql);
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // lay du lieu theo dieu kien giong nhau
    public function whereLike($table, $collum, $data)
    {
        // $table = ten bang (string)(batBuoc)  
        // $collum = ten cot can so sanh (string)(bat buoc)
        // $data = du lieu so sanh (><=)(bat buoc)

        $sql = "SELECT * FROM $table WHERE $collum LIKE '%$data%' ";
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    // ket noi va query mysql
    private function _query($sql)
    {
        $conn = $this->connect();
        $query =  mysqli_query($conn, $sql);
        return $query;
    }
}
