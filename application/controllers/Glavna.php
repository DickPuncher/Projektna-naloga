<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glavna extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function domov(){
		$this->load->view('index');
	}

	public function upravljanje(){
		$this->load->view('upravljanje');
	}

	public function vnesi_vprasanje(){
		$data = array(
			'vprasanje' => $_POST['vprasanje'],
			'odgovor' => $_POST['odgovor'],
			'st_tock' => $_POST['tocke'],
			'id_predmeta' => $_POST['predmet'],
			'id_sklopa' => $_POST['sklop']
		);
		$this->db->insert('vprasanja', $data);
		redirect('glavna/upravljanje', 'refresh');
	}

	public function vnesi_predmet(){
		$data = array(
			'ime_predmeta' => $_POST['predmet']
		);
		$this->db->insert('predmeti', $data);
		redirect('glavna/upravljanje', 'refresh');
	}

	public function vnesi_sklop(){
		$data = array(
			'ime_sklopa' => $_POST['sklop']
		);
		$this->db->insert('sklopi', $data);
		redirect('glavna/upravljanje', 'refresh');
	}

	public function odstrani_vprasanje(){
		$query = $this->db->delete('vprasanja', array('id_vprasanja' => $_POST['vprasanje']));
		redirect('glavna/upravljanje', 'refresh');
	}

	public function odstrani_predmet(){
		$query = $this->db->delete('predmeti', array('id_predmeta' => $_POST['predmet']));
		redirect('glavna/upravljanje', 'refresh');
	}

	public function odstrani_sklop(){
		$query = $this->db->delete('sklopi', array('id_sklopa' => $_POST['sklop']));
		redirect('glavna/upravljanje', 'refresh');
	}

	public function sprasevanje(){
		if(isset($_POST['sklop'])){
			$sklop = $_POST['sklop'];
			$predmet = $_POST['predmet'];

			$query = $this->db->query("SELECT * FROM vprasanja WHERE id_sklopa = $sklop AND id_predmeta = $predmet"); /* spremeni */
			$data = array();
			for($i = 0; $i<4; $i+=1){
				$data['vprasanje'.$i] = $query->result()[$i]->vprasanje;
				$data['odgovor'.$i] = $query->result()[$i]->odgovor;
			}
			$this->load->view('sprasevanje', $data);
		}
		else{
			$this->load->view('sprasevanje');
		}
	}
	
	public function registracija(){
		$this->load->view('registracija');
	}

	public function prijava(){
		$this->load->view('prijava');
	}

	public function odjava(){
		$this->session->unset_userdata('prijavljen');
		$this->session->sess_destroy();
		$this->load->view('prijava');
	}
}
