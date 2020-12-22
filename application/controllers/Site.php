<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		$this->session->sess_destroy();
		$data['doctors'] = $this->site_mo->doctorFrontCarousel();
		$data['patientTotal'] = $this->site_mo->patientTotal();
		$data['doctorTotal'] = $this->site_mo->doctorTotal();
		$data['site_details'] = $this->site_mo->site_details();
		$this->load->view('index',$data);
	}
}