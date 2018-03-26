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
		$this->load->view('ustno');
	}

	public function odjava(){
		
	}

}
