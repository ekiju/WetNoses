<?php
class Interest extends CI_Model {
    public function create($request_id)
    {
        $query = "INSERT INTO interests (requests_id, users_id, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
        $values = array($request_id, $this->session->userdata('current_user_id'));
        return $this->db->query($query, $values);
    }
    public function get_all_by_id($user_id)
    {
        // get all the interests of specific user, join on requests 
        $query = "SELECT requests_id, requests.id AS 'reqid',requests.title, requests.price, requests.owner_id, requests.date, requests.status, requests.details, requests.created_at, interests.users_id, interests.created_at FROM requests LEFT JOIN interests ON requests.id = interests.requests_id WHERE users_id=?";
        $values = array($user_id);
        return $this->db->query($query, $values)->result_array();

    }

}

?>

