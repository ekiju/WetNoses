<?php
class Request extends CI_Model {
    public function create_request($post)
    {
        $query = "INSERT INTO requests (title, price, date, status, details, owner_id, created_at, updated_at) VALUES (?,?,?,?,?,?, NOW(), NOW())";
        $values = array($post["title"], $post["price"], $post["date"], $post["status"], $post["details"], $post["owner_id"]);
        return $this->db->query($query, $values);
    }
    public function get_all()
    {
        $query = "SELECT * FROM requests";
		return $this->db->query($query)->result_array();
    }
    public function remove($id)
    {
        $query = "DELETE FROM requests WHERE id=?";
		$values = array($id);
		return $this->db->query($query, $values);
    }
    public function update($id, $post)
    {
        $query = "UPDATE requests SET title=?, price=?, date=?, status=?, owner_id=?, details=? WHERE id=?";
        $values = array($post['title'], $post['price'], $post['date'], $post['status'], $post['owner_id'], $post['details'], $id);
		return $this->db->query($query, $values);
    }
    public function get_active()
    {
        $query = "SELECT * FROM requests WHERE owner_id=? ";
        $values = array($this->session->userdata['current_user_id']);
        return $this->db->query($query, $values)->result_array();
    }
    public function get_last()
    {
        $query = "SELECT * FROM REQUESTS ORDER BY ID DESC LIMIT 1";
        return $this->db->query($query)->row_array();

    }
    public function change_status_to_pending($reqid)
    {
        $query = "UPDATE requests SET status=? WHERE id=?";
        $values = array('pending', $reqid);
        return $this->db->query($query, $values);

    }
}

?>