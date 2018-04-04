<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function preveri_registracijo(){
        $upor_ime = $_POST['upor_ime'];
        $geslo = $_POST['pass'];
        $query = $this->db->get_where('uporabnik', array('uporabnisko_ime' => $upor_ime, 'geslo' => md5($geslo)));
        if($query->num_rows() == 0){
            $data = array(
                'uporabnisko_ime' => $upor_ime,
                'geslo' => md5($geslo),
                'admin_pravice' => FALSE
            );
            $this->db->insert('uporabnik', $data);
            sleep(1);
            header("Location: ../glavna/prijava");
        }
        else{
            sleep(1);
            header("Location: ../glavna/registracija");
        }
    }

    public function preveri_prijavo(){
        $upor_ime = $_POST['upor_ime'];
        $geslo = $_POST['pass'];
        $query = $this->db->get_where('uporabnik', array('uporabnisko_ime' => $upor_ime, 'geslo' => md5($geslo)));
    
        if ($query->num_rows() == 1) {
            $_SESSION['upor_ime'] = $upor_ime;
            $_SESSION['prijavljen'] = TRUE;
            header("Location: ../glavna/domov");
            } else {
            return FALSE;
        }

    }
    
}
