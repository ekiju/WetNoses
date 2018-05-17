<?php
class Message extends CI_Model {
    public function create($convoid, $post)
    {
        $query = "INSERT INTO messages (sender_id, recipient_id, conversations_id, archived, content, created_at, updated_at) VALUES (?, ?, ?,?, ?, NOW(), NOW())";
        $values = array($post['sender_id'], $post['recipient_id'], $convoid, $post['archived'], $post['content']);
        return $this->db->query($query, $values);
    }
    public function get_inbox_by_userid($id)
    {
        $query = "SELECT * FROM messages WHERE recipient_id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }
    public function get_outbox_by_userid($id)
    {
        $query = "SELECT * FROM messages WHERE sender_id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }


}

?>

