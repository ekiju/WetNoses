<?php
class Doggo extends CI_Model {
    public function get_all_doggos()
    {
        return $this->db->query("SELECT * FROM doggos")->result_array();
    }
    public function get_doggo_by_id($id)
    {
        return $this->db->query("SELECT * FROM doggos WHERE id = ?", array($id))->row_array();
    }
    public function get_doggos_by_owner_id($owner_id)
    {
        return $this->db->query("SELECT * FROM doggos WHERE owner_id = ?", array($owner_id))->result_array();
    }
    public function add_doggo($post)
    {
        $query = "INSERT INTO doggos (name, breed, age, likes, dislikes, description, owner_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,NOW(), NOW())";

        $values = array($post['name'], $post['breed'], $post['age'], $post['likes'],$post['dislikes'],$post['description'], $this->session->userdata['current_user_id']); 
        return $this->db->query($query, $values);
    }
    public function remove_doggo($doggo_id)
    {
        $query = "DELETE FROM doggos WHERE id=?";
		$values = array($doggo_id);
		return $this->db->query($query, $values);
    }
    public function add_image($doggo_id, $image, $image_caption)
    {
        $query = "UPDATE doggos SET image=?, image_caption=? WHERE id=?";
        $values = array($image, $image_caption, $doggo_id);
        return $this->db->query($query, $values);
    }
}


?>