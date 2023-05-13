<?php

class Gigreviews
{

    use Model;
    private $table = 'gig_reviews';

    private $allowed_columns = [
        'review_id',
        'gig_id',
        'technician_id',
        'rating',
        'content',
    ];

    private $validation_rules = [
        'rating' => [
            'required',
        ],
        'content' => [
            'required',
        ],
    ];

    public function getGigReviews($gig_id)
    {
        $query = "SELECT 
                        gr.*,
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture
                    FROM gig_reviews gr
                    INNER JOIN users u ON u.user_id = gr.gig_id
                    WHERE gr.gig_id = " . $gig_id . "
                    ORDER BY gr.review_id DESC";

        $gigReviews = $this->query($query);
        return $gigReviews;
    }

}