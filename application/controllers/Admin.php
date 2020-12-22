<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		if(!isset($_SESSION['userinfo'])){
			$data['site_details'] = $this->admin_mo->site_details();
			$this->load->view('admin/login',$data);
		}else{
			$data['title'] = "Dashboard";
			$data['total'] = $this->admin_mo->total_count();
			$data['info'] = $this->admin_mo->patient();
			$data['site_details'] = $this->admin_mo->site_details();
			$this->load->view('admin/dashboard',$data);
		}
	
	}

	public function dashboard()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Dashboard";
		$data['total'] = $this->admin_mo->total_count();
		$data['info'] = $this->admin_mo->patient();
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/dashboard',$data);
	}

	public function appointment()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Appointment List";
		$data['info'] = $this->admin_mo->doctor_info();
		$data['ap_list'] = $this->admin_mo->appointment_list();
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/appointment',$data);
	}

	public function prescription()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Prescription List";
		$data['info'] = $this->admin_mo->getprescription();
		$data['site_details'] = $this->admin_mo->site_details();

		$this->load->view('admin/prescription',$data);
	}

	public function billing()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Billing List";
		$data['info'] = $this->admin_mo->getinvoice();
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/billing',$data);
	}

	public function patients()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Patient List";
		$data['info'] = $this->admin_mo->patient_info();
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/patient',$data);
	}

	public function doctors()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Doctor List";
		$data['info'] = $this->admin_mo->doctor_info_list();
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/doctor',$data);
	}

	public function lockscreen()
	{
		$data['user'] = $this->admin->getuser();
		$this->load->view('lockscreen',$data);
	}

	public function recoverpassword()
	{
		$data['title'] = "Recover Password";
		$this->load->view('recoverpassword',$data);
	}

	public function patient_recoverpassword()
	{
		$data['title'] = "Recover Password";
		$data['patientTotal'] = $this->admin->patientTotal();
		$data['doctorTotal'] = $this->admin->doctorTotal();
		$data['adminDetails'] = $this->admin->adminDetails();
		$this->load->view('patient_recoverpassword',$data);
	}

	public function profile()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Your Profile";
    	$data['site_details'] = $this->admin_mo->site_details();
		$data['info'] = $this->admin_mo->get_admin_profile();
		$this->load->view('admin/profile',$data);
	}

	public function doctor_profile()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Doctor Profile";
		$data['info'] = $this->admin->getuserprofile();
	
		$this->load->view('doctor_profile',$data);
	}
	
	public function addpatient()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Add New Patient";
		$this->load->view('addpatient',$data);
	}

	public function patient_profile()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Patient Profile";
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/patientprofile',$data);
	}

	public function editpatient()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Edit Patient Profile";
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/editpatient',$data);
	}

	public function addprescription()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Add Prescription";
		$data['info'] = $this->admin->patient_info();
		$this->load->view('addprescription',$data);
	}

	public function print_prescription()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Print Prescription";
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/printprescription',$data);
	}

	public function createinvoice()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Create New Invoice";
		$data['info'] = $this->admin->patient_info();
		$this->load->view('createinvoice',$data);
	}

	public function print_invoice()
	{
		if(!isset($_SESSION['userinfo'])){
			redirect(base_url().'admin');
		}
		$data['title'] = "Print Invoice";
		$data['site_details'] = $this->admin_mo->site_details();
		$this->load->view('admin/printinvoice',$data);
	}
}
