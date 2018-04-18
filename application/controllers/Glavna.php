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
		if(isset($_POST['izberi_sklop'])){
            $id_predmeta = $_POST['predmet'];
            $query = $this->db->query("SELECT * FROM sklopi WHERE id_predmeta = $id_predmeta");
            $data = array();
            $sklopi = array();
            foreach($query->result() as $row){
                $sklopi[$row->ime_sklopa] = $row->ime_sklopa;
            }
            $data['sklopi'] = $sklopi;
            $data['id_predm'] = $id_predmeta;
            
            $this->load->view('upravljanje', $data);
            return;
        }
		else{
			$this->load->view('upravljanje');
		}
	}

	public function vnesi_vprasanje(){
		if (!empty($_POST['vprasanje']) AND !empty($_POST['odgovor']) AND !empty($_POST['tocke'])) {
            if(isset($_POST['dodaj'])){
				$id_predmeta = $_POST['predm'];
				$ime_sklopa = $_POST['sklop'];
				$query = $this->db->query("SELECT * FROM sklopi WHERE id_predmeta = $id_predmeta AND ime_sklopa = '$ime_sklopa'");
				$id_sklopa = $query->result()[0]->id_sklopa;

            	$data = array(
                	'vprasanje' => $_POST['vprasanje'],
                	'odgovor' => $_POST['odgovor'],
                	'st_tock' => $_POST['tocke'],
                	'id_predmeta' => $id_predmeta,
                	'id_sklopa' => $id_sklopa
            	);
            	$this->db->insert('vprasanja', $data);
            	redirect('glavna/upravljanje', 'refresh');
			}
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
		if (!empty($_POST['ime_sklopa'])){
			$data = array(
				'ime_sklopa' => $_POST['ime_sklopa'],
                'id_predmeta' => $_POST['id_predmeta']
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
		$id_predmeta = $_POST['predmet'];
		$query = $this->db->query("DELETE FROM vprasanja WHERE id_predmeta = $id_predmeta");
		$query = $this->db->query("DELETE FROM sklopi WHERE id_predmeta = $id_predmeta");
		$query = $this->db->delete('predmeti', array('id_predmeta' => $id_sklopa));

		redirect('glavna/upravljanje', 'refresh');
	}

	public function odstrani_sklop(){
		$id_sklopa = $_POST['sklop'];
		$query = $this->db->query("DELETE FROM vprasanja WHERE id_sklopa = $id_sklopa");
		$query = $this->db->delete('sklopi', array('id_sklopa' => $id_sklopa));
		redirect('glavna/upravljanje', 'refresh');
	}

    
    
    
    
    
    
    
    
    
	public function sprasevanje(){
        if(isset($_POST['izberi_sklop'])){
            $id_predmeta = $_POST['predmet'];
            $query = $this->db->query("SELECT * FROM sklopi WHERE id_predmeta = $id_predmeta");
            $data = array();
            $sklopi = array();
            foreach($query->result() as $row){
                $sklopi[$row->ime_sklopa] = $row->ime_sklopa;
            }
            $data['sklopi'] = $sklopi;
            $data['id_predm'] = $id_predmeta;
            
            $this->load->view('sprasevanje', $data);
			
			return;

        }
		if(isset($_POST['generiraj'])){
            $id_predmeta = $_POST['predm'];
            $ime_sklopa = $_POST['sklop'];
            $query = $this->db->query("SELECT * FROM sklopi WHERE ime_sklopa = '$ime_sklopa' AND id_predmeta = $id_predmeta");
            $id_sklopa = $query->result()[0]->id_sklopa;

            $query = $this->db->query("SELECT * FROM vprasanja WHERE id_sklopa = $id_sklopa AND id_predmeta = $id_predmeta ORDER BY rand() LIMIT 4");

			$data = array();
			$uporabnik = $_SESSION['id_upor'];
			$query2 = $this->db->query("SELECT * FROM evidenca WHERE id_uporabnika=$uporabnik");
			if($query2->num_rows() == 0){
				for($i = 0; $i<4; $i+=1){
					$id = $query->result()[$i]->id_vprasanja;
					$query3 = $this->db->query("INSERT INTO evidenca VALUES ('', '$uporabnik', $id)");
				}
			}
			else{
				$query = $this->db->query("SELECT * FROM vprasanja WHERE id_vprasanja NOT IN (SELECT id_vprasanja FROM evidenca WHERE id_uporabnika=$uporabnik) ORDER BY rand() LIMIT 4");
				$this->db->query("DELETE FROM evidenca WHERE id_uporabnika = $uporabnik");
				for($i = 0; $i<4; $i+=1){
					$id = $query->result()[$i]->id_vprasanja;
					$query3 = $this->db->query("INSERT INTO evidenca VALUES ('', '$uporabnik', $id)");
				}
			}
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
