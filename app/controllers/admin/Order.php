<?php
class Order extends Controller
{

    public $data;
    public $model;

    public function __construct()
    {
        $this->model = $this->model('AdminOrderModel');
    }

    function allOrder()
    {
        $this->data['orders'] = $this->model->getAllOrder();
        return $this->render('admin/order',$this->data);
    }
    function detailInfor($codeOrder)
    {   
        $this->data['orders'] = $this->model->getOrder($codeOrder);
        $this->data['accounts'] = $this->model->getInfor($codeOrder);
        return $this->render('admin/detail_infor',$this->data);
    }
}
