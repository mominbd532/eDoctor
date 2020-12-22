<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		$this->session->sess_destroy();
		$data['patientTotal'] = $this->doctor_mo->patientTotal();
		$data['doctorTotal'] = $this->doctor_mo->doctorTotal();
		$data['site_details'] = $this->patient_mo->site_details();
		$this->load->view('patient/login',$data);
	}

	public function register()
	{
		$data['patientTotal'] = $this->patient_mo->patientTotal();
		$data['doctorTotal'] = $this->patient_mo->doctorTotal();
		$data['site_details'] = $this->patient_mo->site_details();
		$this->load->view('patient/register',$data);
	}

	public function dashboard()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Patient Dashboard";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['patient_details'] = $this->patient_mo->auth_patient_details();
		$this->load->view('patient/dashboard',$data);
	}

	public function profile()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}

		$data['title'] = "Patient Profile";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['patient_details'] = $this->patient_mo->auth_patient_details();
		$this->load->view('patient/profile',$data);
	}

	public function lock_screen()
	{
		if(!isset($_SESSION['lockinfo']) && !isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		if(isset($_SESSION['patientinfo'])){
			$session_data = $_SESSION['patientinfo'];
			$session = array('email'=>$session_data['email']);
			$this->session->set_userdata('lockinfo',$session);
		}
	
		$data['site_details'] = $this->patient_mo->site_details();
		$data['patient_details'] = $this->patient_mo->auth_patient_details();
		
		$this->session->unset_userdata('patientinfo');
		$this->load->view('patient/lockscreen',$data);
	}

	public function appointment()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Appointment List";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['info'] = $this->patient_mo->doctor_list();
		$data['ap_list'] = $this->patient_mo->appointment_list();
		$this->load->view('patient/appointment',$data);
	}

	public function prescription()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Prescription List";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['info'] = $this->patient_mo->get_prescription();
		$this->load->view('patient/prescription',$data);
	}

	public function billing()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Billing List";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['info'] = $this->patient_mo->get_invoice();
		$this->load->view('patient/billing',$data);
	}

	public function print_prescription()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Print Prescription";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['info'] = $this->patient_mo->auth_patient_details();
		$this->load->view('patient/printprescription',$data);
	}

	public function print_invoice()
	{
		if(!isset($_SESSION['patientinfo'])){
			redirect(base_url().'patient');
		}
		$data['title'] = "Print Invoice";
		$data['site_details'] = $this->patient_mo->site_details();
		$data['user'] = $this->patient_mo->getuser_for_invoice();
		$this->load->view('patient/printinvoice',$data);
	}

	// public function patient_recoverpassword()
	// {
	// 	$data['title'] = "Recover Password";
	// 	$data['patientTotal'] = $this->patient->patientTotal();
	// 	$data['doctorTotal'] = $this->patient->doctorTotal();
	// 	$data['adminDetails'] = $this->patient->adminDetails();
	// 	$this->load->view('patient_recoverpassword',$data);
	// }
}