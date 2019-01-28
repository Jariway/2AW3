<?php
class Kontaktuak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllContacts() {
        $query = $this->db->query("CALL spGetContacts()");
        $this->db->close();

        return $query->result();

    }
    public function getContactInfo($contactId) {
        $query = $this->db->query("CALL spGetContactInfo($contactId)");
        $query->row();
        $this->db->close();

        return $query->row();
    }
    public function getContactEmails($contactId) {
        $query = $this->db->query("CALL spGetUserEmails($contactId)");
        $this->db->close();

        return $query->result();
    }
    public function getContactGroups($contactId) {
        $query = $this->db->query("CALL spGetUserGroups($contactId)");
        $this->db->close();

        return $query->result();
    }
    public function getAllGroups() {
        $query = $this->db->query("CALL spGetAllGroups()");
        $this->db->close();

        return $query->result();
    }
    public function updateSingleEmail($pid,$pemail) {
        $query = $this->db->query("CALL spUpdateEmail($pid,'$pemail')");
        $this->db->close();
    }
    public function addEmail($pid,$pemail) {
        $query = $this->db->query("CALL spInsertEmail('$pemail',$pid)");
        $this->db->close();

    }
    public function changeUserInfo($name,$surname,$tlf,$userId) {
        $query = $this->db->query("CALL spUpdateUserInfo('$name','$surname','$tlf','$userId')");
        $this->db->close();
    }
    public function deleteGroups($pid) {
        $query = $this->db->query("CALL spDeleteGroups($pid)");
        $this->db->close();
    }
    public function insertGroups($pid,$pgroup) {
        $query = $this->db->query("CALL spInsertGroups($pid,$pgroup)");
        $this->db->close();
    }
}
