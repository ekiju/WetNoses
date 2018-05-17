<?php
class Request_Has_Doggo extends CI_Model {
    public function create($request_id, $doggo_id)
    {
        $query = "INSERT INTO requests_has_doggos (request_id, doggo_id) VALUES (?,?)";
        $values = array($request_id, $doggo_id);
        return $this->db->query($query, $values);
    }
    public function get_request($id)
    {
        $query = "SELECT request_id, doggo_id, users.first_name, users.last_name, users.email,requests.id AS 'reqid',requests.title, requests.price, requests.owner_id, requests.date, requests.status, requests.details, requests.created_at, doggos.name, doggos.breed, doggos.age, doggos.description, doggos.image FROM requests_has_doggos JOIN requests ON requests.id = requests_has_doggos.request_id JOIN users ON requests.owner_id = users.id JOIN doggos on requests_has_doggos.doggo_id = doggos.id WHERE request_id=? ";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }
    public function get_all()
    {
        $query = "SELECT request_id, doggo_id, users.first_name, users.last_name, users.email,requests.id AS 'reqid',requests.title, requests.price, requests.owner_id, requests.date, requests.status, requests.details, requests.created_at, doggos.name, doggos.breed, doggos.age, doggos.description, doggos.image FROM requests_has_doggos JOIN requests ON requests.id = requests_has_doggos.request_id JOIN users ON requests.owner_id = users.id JOIN doggos on requests_has_doggos.doggo_id = doggos.id";
        $values = array();
        return $this->db->query($query, $values)->result_array();
    }

}

?>