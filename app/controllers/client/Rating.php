<?php

class Rating extends Controller
{
    function review($id)
    {
        if (isset($_SESSION['login']) == true) {
            $reviews = [
                'start' => $_REQUEST['star'],
                'review' => $_REQUEST['review'],
            ];
            $this->model('ReviewModel')->addReview($id, $reviews);
            header('location:http://localhost/web-ban-hang-mvc/san-pham/'.$id);
        } else {
            echo 'bạn phải đăng nhập ';
        }
        
    }
}
