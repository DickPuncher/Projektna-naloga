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
        $query = $this->db->get_where('uporabniki', array('upor_ime' => $upor_ime, 'geslo' => md5($geslo)));
        if($query->num_rows() == 0){
            $data = array(
                'upor_ime' => $upor_ime,
                'geslo' => md5($geslo),
            );
            $this->db->insert('uporabniki', $data);
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
        $query = $this->db->get_where('uporabniki', array('upor_ime' => $upor_ime, 'geslo' => md5($geslo)));
    
        if ($query->num_rows() == 1) {
            $query2 = $this->db->get_where('admini', array('id_uporabnika' => $query->result()[0]->id_uporabnika));
            if($query2->num_rows() == 1){
                $_SESSION['admin'] = TRUE;
            }
            $_SESSION['id_upor'] = $query->result()[0]->id_uporabnika;
            $_SESSION['upor_ime'] = $upor_ime;
            $_SESSION['prijavljen'] = TRUE;
            header("Location: ../glavna/sprasevanje");
        }
        else{
            header("Location: ../glavna/prijava");
            return FALSE;
        }

    }
    
}
