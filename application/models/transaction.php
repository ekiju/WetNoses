<?php
class Transaction extends CI_Model {
    public function create($post, $request_id)
    {
        $query = "INSERT INTO transactions (notes, status, request_id, caretaker_id,created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
        $values = array($post['notes'], $post['status'], $request_id, $this->session->userdata('current_user_id'));
        return $this->db->query($query, $values);
    }
    public function cancel($request_id)
    {
        $query = "DELETE FROM transactions WHERE request_id = ?";
        $values = array($request_id);
        return $this->db->query($query, $values);
    }

}

?>

