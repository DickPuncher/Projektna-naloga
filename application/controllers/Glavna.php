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

	public function sprasevanje(){
		if(isset($_POST['sklop'])){
			$query = $this->db->query('SELECT * FROM vprasanja'); /* spremeni */
			$data = array();
			for($i = 0; $i<4; $i+=1){
				$data['vprasanje'.$i] = $query->result()[$i]->vprasanje;
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
