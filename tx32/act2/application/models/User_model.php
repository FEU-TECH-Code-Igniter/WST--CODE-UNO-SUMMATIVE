<?php
class User_model extends CI_Model {
    public function get_users() {
        $query = $this->db->get("codeuno");
        $result = $query->result_array();
        return $result;
    }

    public function get_user($username,$password) {
        $this->db->where('uname', $username);
        $this->db->where('password', $password);
        $query = $this->db->get("codeuno");
        //$result = $query->array();
        $result = $query->row_array();
        return $result;
    }

    public function get_userbyID($userid) {
        $this->db->where('id', $userid);
        $query = $this->db->get("codeuno");
        //$result = $query->array();
        $result = $query->row_array();
        return $result;
    }
}
?>