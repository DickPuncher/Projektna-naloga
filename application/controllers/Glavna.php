<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glavna extends CI_Controller {

	public function index()
	{
		$this->load->view('ustno2');
	}

	public function ustno()
	{
		$this->load->view('ustno');
	}

}
