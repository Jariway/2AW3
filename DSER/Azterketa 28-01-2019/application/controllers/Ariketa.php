<?php
class Ariketa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper("url");
        $this->load->helper("html");

    }

    public function ariketa1() {
        if (!isset($this->session->sesioa)) {
            $this->session->set_userdata("sesioa", true);
            //Enviar a la vista con el options
            $this->load->view('kontaktuak');

        } else {
            if (is_null(get_cookie('sesioa'))) {
                $cookie = array(
                    'name' => 'kontadorea',
                    'value' => 0,
                    'expire' => '3700',
                );
                $this->input->set_cookie($cookie);
            } else {
                echo "HOLA";
                $kontadoreaZenbakia = $this->input->cookie('kontadorea');
                $cookie = array(
                    'name' => 'kontadorea',
                    'value' => $kontadoreaZenbakia + 1,
                    'expire' => '3700',
                );
            }
            // Enviar a la vista de contador de visitas
            $this->load->view("kontadorea");

        }

    }

    public function logout() {
        $this->session->unset_userdata("sesioa");
       //$this->load->view("sarrera");
redirect("../../../..");

    }

}
