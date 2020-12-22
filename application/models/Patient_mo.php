<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_mo extends CI_Model {

	public function site_details()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()->result_array();
		return $res[0];
	}

	public function login($email,$password)
	{
		$res = $this->db->get_where('patients',array('email'=>$email,'password'=>$password));
		
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function register($data)
	{
		$this->db->insert('patients',$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}

	public function auth_patient_details()
	{
		if(isset($_SESSION['lockinfo']) && !isset($_SESSION['patientinfo'])){
			$session_data = $_SESSION['lockinfo'];
		}else{
			$session_data = $_SESSION['patientinfo'];
		}
		$patient_info = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();

		return $patient_info[0];
	}

	public function update_profile($data)
	{
		$session_data = $_SESSION['patientinfo'];
		$this->db->set('p_name',$data['p_name']);
		$this->db->set('email',$data['email']);
		$this->db->set('phone',$data['phone']);
		$this->db->where('email',$session_data['email']);
		$this->db->update('patients');
		$data = array('email'=>$data['email']);
		$this->session->set_userdata('patientinfo',$data);
		return true;
	}
	
	public function update_password($data)
	{
		$session_data = $_SESSION['patientinfo'];
		$pwd = $this->db->query("SELECT patient_id from patients where password ='".$data['cpass']."' and email = '".$session_data['email']."'");

		if(count($pwd->result_array()) == 1)
		{
			$this->db->query("update patients set password='".$data['password']."' where email='".$session_data['email']."'");
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_photo($data)
	{
		$this->db->set('profile_photo',$data);
		$this->db->update('patients');
		return true;
	}

	public function doctor_list()
	{
		$this->db->select('*');
		$this->db->from('doctors');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function appointment_list()
	{
		$session_data = $_SESSION['patientinfo'];
		$patient_details = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();
		$patient_details = $patient_details[0];

		$res = $this->db->query("SELECT appointments.*, patients.p_name FROM appointments, patients WHERE patients.patient_id = appointments.patient_id AND date = DATE_FORMAT(CURDATE(),'%Y/%m/%d') AND appointments.patient_id ='" .$patient_details["patient_id"]."'");
		return $res->result_array();
	}

	public function chkappointment($data)
	{
		
		$session_data = $_SESSION['patientinfo'];

        $patient_details = $this->db->select('*')
        ->from('patients')
        ->where('email',$session_data['email'])
        ->get()->result_array();
		// print_r($patient_details[0]['patient_id']);
		// exit;
		
		$res = $this->db->query("select patient_id from appointments where patient_id=".$patient_details[0]['patient_id']." and date='".$data['date']."'");
		if(count($res->result_array())==1){
			return 1;
		}else{
			$res1 = $this->db->query("select patient_id from appointments where time='".$data['time']."' and date='".$data['date']."'");
			
			if(count($res1->result_array())==1)
			{
				return 2;
			}
			else
			{
				$this->db->insert('appointments',$data);
			}
		}
	}

	public function appointment_list_by_date($date)
	{
		$session_data = $_SESSION['patientinfo'];
		$patient_details = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();

		$res = $this->db->select('p_name,appointments.time')
		->from('appointments')
		->join('patients','appointments.patient_id=patients.patient_id')
		->where('appointments.date',$date)
		->where('appointments.patient_id',$patient_details[0]["patient_id"])
		->get();
		return $res->result_array();
	}

	public function get_prescription()
	{
		$session_data = $_SESSION['patientinfo'];
		$patient_details = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();
		
		$res = $this->db->query("select prescription_id, p_name, DATE_FORMAT(prescriptions.date, '%M %d,%Y') as date from patients,prescriptions where patients.patient_id = prescriptions.patient_id AND prescriptions.patient_id ='" .$patient_details[0]["patient_id"]."'");
		return $res->result_array();
	}

	public function get_invoice()
	{
		$session_data = $_SESSION['patientinfo'];
		$patient_details = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();

		$res = $this->db->query("select invoice_id, p_name, payment_status, invoice_amount, DATE_FORMAT(invoices.invoice_date, '%M %d,%Y') as date from patients,invoices where patients.patient_id = invoices.patient_id AND invoices.patient_id ='" .$patient_details[0]["patient_id"]."'");
		
		return $res->result_array();
	}

	public function getp_name($id)
	{
		$res = $this->db->select('*')
		->from('doctors')
		->where('doctor_id',$id)
		->get()
		->result_array();
		return $res[0];
	}

	public function getuser_for_invoice()
	{
		$session_data = $_SESSION['patientinfo'];

		$patient_details = $this->db->select('*')
		->from('patients')
		->where('email',$session_data['email'])
		->get()->result_array();
		
		return $patient_details[0];
	}

	public function getinvoicebyid($id)
	{
		$res = $this->db->select('*')
		->from('invoices')
		->where('invoice_id',$id)
		->get()
		->result_array();

		return $res;
	}

	//
    public function login_data($email,$password)
	{
		$res = $this->db->get_where('users',array('email'=>$email,'password'=>$password));
		
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function login_doctor($email,$password)
	{
		$res = $this->db->get_where('doctors',array('doctor_email'=>$email,'doctor_password'=>$password));
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function getuserprofile()
	{
		if(isset($_SESSION['doctorinfo']))
		{
			$data = $_SESSION['doctorinfo'];
			$res_doc = $this->db->select('*')
			->from('doctors')
			->where('doctor_email',$data['email'])
			->get()->result_array();

		}
		else if(isset($_SESSION['patientinfo']))
		{
			
			$data = $_SESSION['patientinfo'];
			
			$res_doc = $this->db->select('*')
			->from('patients')
			->where('email',$data['email'])
			->get()->result_array();
		
		}
		else
		{
			$data = $_SESSION['userinfo'];

			$res_doc = $this->db->select('*')
			->from('users')
			->where('email',$data['email'])
			->get()->result_array();
		}
		return $res_doc;
	}

	public function getpatientprofile()
	{
		$data = $_SESSION['userdata'];
		$res = $this->db->select('*')
		->from('users')
		->where('user_name',$data['username'])
		->get()->result_array();
		return $res;
	}

	public function getdoctorprofile()
	{
		$data = $_SESSION['userdata'];
		$res = $this->db->select('*')
		->from('users')
		->where('user_name',$data['username'])
		->get()->result_array();
		return $res;
	}

	public function get_user()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()->result_array();
		return $res;
	}

	public function getemail($email)
	{
		$res = $this->db->select('email,password')
		->from('users')
		->where('email',$email)
		->get()->result_array();
		return $res;
	}

	public function getPatientByEmail($email)
	{
		$res = $this->db->select('email,password')
		->from('patients')
		->where('email',$email)
		->get()->result_array();

		return $res;
	}
	
	public function patient_info()
	{
		$this->db->select('*');
		$this->db->from('patient');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function addpatient($data)
	{
		$this->db->insert('patient',$data);
		return true;
	}

	

	public function get_patient($id)
	{
		$data = $this->db->query('select * from patient where patient_id = '.$id);
		return $data->result_array();
	}
	
	public function editpatient($data)
	{
		$this->db->set('p_name',$data['p_name']);
		$this->db->set('age',$data['age']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('phone',$data['phone']);
		$this->db->set('add',$data['add']);
		$this->db->set('height',$data['height']);
		$this->db->set('weight',$data['weight']);
		$this->db->set('b_group',$data['b_group']);
		$this->db->set('b_pressure',$data['b_pressure']);
		$this->db->set('pulse',$data['pulse']);
		$this->db->set('respiration',$data['respiration']);
		$this->db->set('allergy',$data['allergy']);
		$this->db->set('diet',$data['diet']);
		$this->db->where('patient_id',$data['patient_id']);
		$this->db->update('patient');
		return true;
	}



	public function deletepatient($id)
	{
		$this->db->where('patient_id', $id);
		$this->db->delete('patient');
		return true;
	}

	public function get_appointment($id)
	{
		$datas = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$datas['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];

		$data = $this->db->select('*')
		->from('appointment')
		->where('patient_id',$id)
		->where('user_id',$doctor_id['user_id'])
		->get()->result_array();
		return $data;
	}

	public function get_prescription1($id)
	{
		$datas = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$datas['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];

		$data = $this->db->select('*')
					->from('prescription')
					->where('patient_id',$id)
					->where('user_id',$doctor_id['user_id'])
					->get()->result_array();
		return $data;
	}

	public function addprescription($data)
	{
		$this->db->insert('prescription',$data);
		return true;
	}

	public function getprescriptionbyid($id)
	{
		$res = $this->db->select('*')
		->from('prescription')
		->where('prescription_id',$id)
		->get()
		->result_array();
		return $res;
	}

	public function deleteprescription($id)
	{
		$this->db->where('prescription_id', $id);
		$this->db->delete('prescription');
		return true;
	}

	public function createinvoice($data)
	{
		$this->db->insert('invoice',$data);
		return true;
	}

	public function deleteinvoice($id)
	{
		$this->db->where('invoice_id', $id);
		$this->db->delete('invoice');
		return true;
	}

	public function get_invoice1($id)
	{
		$datas = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$datas['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];

		
		$data = $this->db->select('*')
		->from('invoice')
		->where('patient_id',$id)
		->where('user_id',$doctor_id['user_id'])
		->get()->result_array();

		return $data;
	}

	public function user_info()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()
		->result_array();
		return $res[0];
	}


	public function appointmentchart()
	{
		if(isset($_SESSION['doctorinfo']))
		{
			$datas = $_SESSION['doctorinfo'];
			$res_doc = $this->db->select('*')
			->from('doctors')
			->where('doctor_email',$datas['email'])
			->get()->result_array();

			$id = $res_doc[0]['doctor_id'];
			$res = $this->db->select('MONTHNAME(appointment.date) AS month, Month(appointment.date) as num_month, count(*) AS total')
			->from('appointment')
			->where('doctor_id',$id)
			->get()->result_array();
		}
		else if(isset($_SESSION['patientinfo']))
		{
			
			$datas = $_SESSION['patientinfo'];
			
			$res_doc = $this->db->select('*')
			->from('patients')
			->where('email',$datas['email'])
			->get()->result_array();
		
			$id = $res_doc[0]['patient_id'];
			$res = $this->db->select('MONTHNAME(appointment.date) AS month, Month(appointment.date) as num_month, count(*) AS total')
			->from('appointment')
			->where('patient_id',$id)
			->get()->result_array();
		}else{
			$res = $this->db->select('MONTHNAME(appointment.date) AS month, Month(appointment.date) as num_month, count(*) AS total')
			->from('appointment')
			->get()->result_array();
		}
		
		return $res;
	}

	public function invoicechart()
	{
		$data = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$data['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];

		$res = $this->db->select('payment_status as status, count(*) as total')
		->from('invoice')
		->where('user_id',$doctor_id['user_id'])
		->group_by('status')
		->get()->result_array();

		// $res = $this->db->query("select payment_status as status, count(*) as total from invoice group by status");
		return $res;
	}

	public function patient_list()
	{
		if(isset($_SESSION['patientinfo']))
		{
			
			$datas = $_SESSION['patientinfo'];
			
			$res_doc = $this->db->select('*')
			->from('patients')
			->where('email',$datas['email'])
			->get()->result_array();
		
			$id = $res_doc[0]['patient_id'];
		}
		else if(isset($_SESSION['doctorinfo']))
		{
			
			$datas = $_SESSION['doctorinfo'];
			
			$res_doc = $this->db->select('*')
			->from('doctors')
			->where('doctor_email',$datas['email'])
			->get()->result_array();
		
			$id = $res_doc[0]['doctor_id'];
			
		}
		else
		{
			$datas = $_SESSION['userinfo'];

			$res_doc = $this->db->select('*')
			->from('users')
			->where('email',$datas['email'])
			->get()->result_array();

			$id = $res_doc[0]['user_id'];
		}
	
		$data = $this->db->select('*')
		->from('patients')
		->join('appointments','patients.patient_id=appointments.patient_id')
		->where('patients.patient_id',$id)
		->order_by('patients.patient_id', 'DESC')
		->limit(5)
		->get()->result_array();
		return $data;
	}
	public function doctorFrontCarousel()
	{
		$data = $this->db->query("select * from doctors order by doctor_id ASC limit 4");
		return $data->result_array();
	}

	public function patientTotal()
	{
		$patientTotal = $this->db->select('*')
		->from('patients')
		->get()->result_array();

		return count($patientTotal);
	}

	public function doctorTotal()
	{
		$doctorTotal = $this->db->select('*')
		->from('doctors')
		->get()->result_array();

		return count($doctorTotal);
	}

	public function adminDetails()
	{
		$adminDetails = $this->db->select('*')
		->from('users')
		->get()->result_array();

		return $adminDetails[0];;
	}
}