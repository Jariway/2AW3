<?php
class Kontaktuak_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper("url");

    }
    public function index() {
        $this->load->model("Kontaktuak_model");
        $data['kontaktuak'] = $this->Kontaktuak_model->getAllContacts();
        $this->load->view("combobox", $data);
    }
    public function aldatu() {
        $aukera = $this->input->post("aukera");
        $this->load->model("Kontaktuak_model");
        $data['contactInfo'] = $this->Kontaktuak_model->getContactInfo($aukera);
        $data['contactEmails'] = $this->Kontaktuak_model->getContactEmails($aukera);
        $data['contactGroups'] = $this->Kontaktuak_model->getContactGroups($aukera);
        $data['allGroups'] = $this->Kontaktuak_model->getAllGroups();
        $this->load->view("userInfo", $data);
    }
    public function changeUser() {
        $this->load->model("Kontaktuak_model");
        $userId = $this->input->post("userId");
        $email1 = null;
        $email2 = null;
        $email3 = null;
        $idemail1 = null;
        $idemail2 = null;
        $idemail3 = null;
        if ($this->input->post("email1") != null) {
            $email1 = $this->input->post("email1");
            $idemail1 = $this->input->post("idEmail1");
            $this->Kontaktuak_model->updateSingleEmail($idemail1, $email1);
        } else {
            if ($this->input->post("email1berria") != null) {
                $email1 = $this->input->post("email1berria");
                $this->Kontaktuak_model->addEmail($userId,$email1);

            }
        }
        if ($this->input->post("email2") != null) {
            $email2 = $this->input->post("email2");
            $idemail2 = $this->input->post("idEmail2");
            $this->Kontaktuak_model->updateSingleEmail($idemail2, $email2);

        } else {
            if ($this->input->post("email2berria") != null) {
                $email2 = $this->input->post("email2berria");
                $this->Kontaktuak_model->addEmail($userId, $email2);

            }
        }
        if ($this->input->post("email3") != null) {
            $email3 = $this->input->post("email3");
            $idemail3 = $this->input->post("idEmail3");
            $this->Kontaktuak_model->updateSingleEmail($idemail3, $email3);

        } else {
            if ($this->input->post("email3berria") != null) {
                $email3 = $this->input->post("email3berria");
                $this->Kontaktuak_model->addEmail($userId, $email3);
            }
        }

        //Aldatu datu pertsonalak
        $izena = $this->input->post("izena");
        $abizena = $this->input->post("abizena");
        $telefonoa = $this->input->post("telefonoa");


        $this->Kontaktuak_model->changeUserInfo($izena,$abizena,$telefonoa,$userId);




        $checks = $this->input->post("checkaukera[]");

          $this->Kontaktuak_model->deleteGroups($userId);
          foreach($checks as $check){
            $this->Kontaktuak_model->insertGroups($userId,$check);
          }
          redirect("../..");

    }
}
