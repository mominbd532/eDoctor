<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		if(!isset($_SESSION['doctorinfo'])){
			$data['patientTotal'] = $this->doctor_mo->patientTotal();
			$data['doctorTotal'] = $this->doctor_mo->doctorTotal();
			$data['site_details'] = $this->doctor_mo->site_details();
			$this->load->view('doctor/login',$data);
		}else{
			$data['title'] = "Dashboard";
			$data['total'] = $this->doctor_mo->total_count();
			$data['info'] = $this->doctor_mo->doctorwise_patient();
			$data['profile'] = $this->doctor_mo->get_doctor_profile();
			$data['site_details'] = $this->doctor_mo->site_details();
			$this->load->view('doctor/dashboard',$data);
		}
		
	}

	public function register()
	{
		$data['patientTotal'] = $this->doctor_mo->patientTotal();
		$data['doctorTotal'] = $this->doctor_mo->doctorTotal();
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/register',$data);
	}

	public function dashboard()
	{
		if(!isset($_SESSION['doctorinfo'])){
			redirect(base_url().'doctor');
		}

		$data['title'] = "Dashboard";
		$data['total'] = $this->doctor_mo->total_count();
		$data['info'] = $this->doctor_mo->doctorwise_patient();
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['profile'] = $this->doctor_mo->get_doctor_profile();
		$this->load->view('doctor/dashboard',$data);
	}

	public function profile()
	{
		if(!isset($_SESSION['doctorinfo'])){
			redirect(base_url().'doctor');
		}

		$data['title'] = "Doctor Profile";
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['info'] = $this->doctor_mo->get_doctor_profile();
	
		$this->load->view('doctor/profile',$data);
	}

	public function lock_screen()
	{
		if(!isset($_SESSION['lockinfo']) && !isset($_SESSION['doctorinfo'])){
			redirect(base_url().'doctor');
		}
		if(isset($_SESSION['doctorinfo'])){
			$session_data = $_SESSION['doctorinfo'];
			$session = array('email'=>$session_data['email']);
			$this->session->set_userdata('lockinfo',$session);
		}
	
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['doctor_details'] = $this->doctor_mo->auth_doctor_details();
		
		$this->session->unset_userdata('doctorinfo');
		$this->load->view('doctor/lockscreen',$data);
	}

	public function appointment()
	{
		if(!isset($_SESSION['doctorinfo'])){
			redirect(base_url().'doctor');
		}
		$data['title'] = "Appointment List";
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['info'] = $this->doctor_mo->doctor_list();
		$data['ap_list'] = $this->doctor_mo->appointment_list();
		$this->load->view('doctor/appointment',$data);
	}

	public function prescription()
	{
		if(!isset($_SESSION['doctorinfo'])){
			redirect(base_url().'doctor');
		}
		$data['title'] = "Prescription List";
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['info'] = $this->doctor_mo->get_prescription();
		$this->load->view('doctor/prescription',$data);
	}

	public function addprescription()
	{
		$data['title'] = "Add Prescription";
		$data['info'] = $this->doctor_mo->patient_list();
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['medicines'] = $this->doctor_mo->medicines();

		$this->load->view('doctor/prescription_create',$data);
	}

	public function billing()
	{
		$data['title'] = "Billing List";
		$data['info'] = $this->doctor_mo->getinvoice();
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/billing',$data);
	}

	public function patients()
	{
		$data['title'] = "Patient List";
		$data['info'] = $this->doctor_mo->patient_list();
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/patient',$data);
	}

	public function patient_profile()
	{
		$data['title'] = "Patient Profile";
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/patientprofile',$data);
	}

	public function print_prescription()
	{
		$data['title'] = "Print Prescription";
		$data['site_details'] = $this->doctor_mo->site_details();
		$data['user'] = $this->doctor_mo->getuser();
		$this->load->view('doctor/printprescription',$data);
	}

	public function createinvoice()
	{
		$data['title'] = "Create New Invoice";
		$data['info'] = $this->doctor_mo->patient_list();
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/invoice_create',$data);
	}

	public function editpatient()
	{
		$data['title'] = "Edit Patient Profile";
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/editpatient',$data);
	}

	public function print_invoice()
	{
		$data['title'] = "Print Invoice";
		$data['site_details'] = $this->doctor_mo->site_details();
		$this->load->view('doctor/printinvoice',$data);
	}
}
