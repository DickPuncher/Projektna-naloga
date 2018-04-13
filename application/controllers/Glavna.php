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
		if (!empty($_POST['vprasanje']) AND !empty($_POST['odgovor']) AND !empty($_POST['tocke'])) {
		
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

		else{
			echo "<script type='text/javascript'>alert('Preverite, če ste izpolnili vsa polja');</script>";
			redirect('glavna/upravljanje', 'refresh');
		}
	}

	public function vnesi_predmet(){
		if (!empty($_POST['predmet'])){
			$data = array(
				'ime_predmeta' => $_POST['predmet']
			);
			$this->db->insert('predmeti', $data);
			redirect('glavna/upravljanje', 'refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('Preverite, če ste izpolnili vsa polja');</script>";
			redirect('glavna/upravljanje', 'refresh');
		}
	}

	public function vnesi_sklop(){
		if (!empty($_POST['sklop'])){
			$data = array(
				'ime_sklopa' => $_POST['sklop']
			);
			$this->db->insert('sklopi', $data);
			redirect('glavna/upravljanje', 'refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('Preverite, če ste izpolnili vsa polja');</script>";
			redirect('glavna/upravljanje', 'refresh');
		}
	}

	public function odstrani_vprasanje(){
		$query = $this->db->delete('vprasanja', array('id_vprasanja' => $_POST['vprasanje']));
		redirect('glavna/upravljanje', 'refresh');
	}




	public function spremeni_vprasanje(){
		if (!empty($_POST['vprasanje']) OR !empty($_POST['odgovor']) OR !empty($_POST['tocke'])){
			$id_vprasanja = $_POST['id_vprasanja'];
			$vprasanje = $_POST['vprasanje'];
			$odgovor = $_POST['odgovor'];
			$st_tock = $_POST['tocke'];
			$query = $this->db->query("UPDATE vprasanja SET vprasanje='$vprasanje', odgovor='$odgovor', st_tock='$st_tock' WHERE id_vprasanja='$id_vprasanja'");
			redirect('glavna/upravljanje', 'refresh');
		}
		else{
			echo "<script type='text/javascript'>alert('Preverite, če ste izpolnili vsa polja');</script>";
			redirect('glavna/upravljanje', 'refresh');
		}
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

			$query = $this->db->query("SELECT * FROM vprasanja WHERE id_sklopa = $sklop AND id_predmeta = $predmet ORDER BY rand() LIMIT 4");
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
