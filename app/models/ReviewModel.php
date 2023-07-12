<?php
class ReviewModel extends Database
{
    public function addReview($id, $review)
    {
        $account_id = $_SESSION['account_id'];
        $data = $this->create(
            'reviews',
            [
                'start' => $review['start'],
                'review' => $review['review'],
                'account_id' => $account_id,
                'id' => $id,
                'create_at' => date('Y/m/d'),
                'updated_at' => date('Y/m/d'),
            ]
        );
        return $data;
    }
}
