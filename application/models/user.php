<?php
class User extends CI_Model {
    public function get_user_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
    }
    public function get_user_by_id($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
    public function register($post)
	{
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encpass = md5($post["password"]. "secrethashing" .$salt);
        $query = "INSERT INTO users (first_name, last_name, email, salt, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
        
		$values = array($post["first_name"], $post["last_name"], $post["email"], $salt, $encpass);
		return $this->db->query($query, $values);
	}

}

?>