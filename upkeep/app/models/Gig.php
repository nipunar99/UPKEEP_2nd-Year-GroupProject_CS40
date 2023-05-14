<?php

class Gig
{
    private $table = "gigs";
    use Model;


    public function getGigsOfTechnician($technician_id)
    {
        $query = "SELECT 
                        g.*,
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture,                        
                        GROUP_CONCAT(i.image_name) AS images
                    FROM gigs g
                    INNER JOIN users u ON u.user_id = g.user_id
                    LEFT JOIN gig_images i ON i.gig_id = g.gig_id
                    WHERE g.user_id = " . $technician_id . "
                    GROUP BY g.gig_id";

        $gig = $this->query($query);
        return $gig;
    }

    public function getGig($gigId)
    {
        $query = "SELECT 
                        g.*,
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture,                        
                        GROUP_CONCAT(i.image_name) AS images
                    FROM gigs g
                    INNER JOIN users u ON u.user_id = g.user_id
                    LEFT JOIN gig_images i ON i.gig_id = g.gig_id
                    WHERE g.gig_id = " . $gigId[0] . "
                    GROUP BY g.gig_id";

        $gig = $this->query($query);
        return $gig;
    }



    public function createGig($details, $technician_id)
    {
        echo "in the gig model";
        $details['user_id'] = $technician_id;

        show($details);

        return $this->insertAndGetLastIndex($details);
    }

    public function findGigs()
    {
        $query = "select u.first_name ,u.last_name ,g.gig_id,g.title,g.items,g.location,g.user_id from gigs g inner JOIN users u on u.user_id=g.user_id";
        return $this->query($query);
    }

    public function getUserId($Gig_id)
    {
        $query = "select user_id FROM gigs WHERE gig_id = " . $Gig_id . "";
        return $this->query($query);
    }

    public function deleteGig($Gig_id)
    {
        $query = "DELETE FROM gigs WHERE gig_id = " . $Gig_id;
        return $this->query($query);
    }

    public function addGigImages($gigID, array $fileNames)
    {
        $query = "INSERT INTO gig_images (gig_id, image_name) VALUES ";
        $values = [];
        foreach ($fileNames as $fileName) {
            $values[] = "($gigID, '$fileName')";
        }
        show($values);
        $query .= implode(',', $values);
        $this->query($query);
    }

    public function filtergigs($items, $location)
    {
        $query = "select u.first_name ,u.last_name ,g.gig_id,g.title,g.items,g.location,g.user_id from gigs g inner JOIN users u on u.user_id=g.user_id where g.location = '$location' and g.items like '%" . $items . "%'";
        return $this->query($query);
        // return $query;
    }

    public function editGig(array $arr, $gig_id)
    {
        return $this->update($gig_id,$arr, 'gig_id');
    }
}
