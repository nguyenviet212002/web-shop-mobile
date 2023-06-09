<?php
class ProductModel extends Database
{

    const TABLE = 'products';

    public function getAll()
    {
        return $this->select(self::TABLE,['id','ten_san_pham','gia_san_pham']);
    }
    public function editSP($id)
    {   
        $table = self::TABLE;
        return $this->find($table,'id',$id);
    }
    public function doEditSP($id,$data)
    {   
        $table = self::TABLE;
        return $this->edit($table,$data,$id);
    }
    public function deleteSP($id)
    {   
        $table = self::TABLE;
        return $this->delete($table,'id',$id);
    }
    // public function searchSP($data)
    // {   
    //     $table = self::TABLE;
    //     return $this->whereLike($table,'gia_san_pham',$data);
    // }
    public function searchSP($data)
    {   
        $table = self::TABLE;
        return $this->where($table,'gia_san_pham','>',$data);
    }
}
