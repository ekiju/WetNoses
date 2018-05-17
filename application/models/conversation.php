<?php
class Conversation extends CI_Model {
    public function find_convo($sender_id, $recipient_id)
    {
        $query = "SELECT conversations.id AS convo_id, messages.sender_id, messages.content, messages.recipient_id, messages.created_at, conversations.created_at FROM conversations LEFT JOIN messages ON conversations.id = messages.conversations_id WHERE (messages.recipient_id = ? OR messages.recipient_id = ?) AND (messages.sender_id = ? OR messages.sender_id = ?)";
        $values = array($recipient_id, $sender_id, $sender_id, $recipient_id);
        return $this->db->query($query, $values)->result_array();

    }
    public function create()
    {
        $query = "INSERT INTO conversations (created_at, updated_at) VALUES (NOW(), NOW())";

        $values = array(); 
        return $this->db->query($query, $values);
    }
    public function get_last()
    {
        $query = "SELECT * FROM conversations ORDER BY ID DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }
    public function get_user_convos($userid)
    {
        // find all convos where sender or recipient is userid
        $query = "SELECT conversations.id AS convo_id, messages.sender_id, messages.content, messages.recipient_id, messages.created_at, conversations.created_at FROM conversations LEFT JOIN messages ON conversations.id = messages.conversations_id WHERE messages.recipient_id = ? OR messages.sender_id = ? ORDER BY messages.created_at DESC ";
        $values = array($userid, $userid);
        return $this->db->query($query, $values)->result_array();
    }
}
?>
