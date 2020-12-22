<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_mo extends CI_Model
{
	public function site_details()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()->result_array();
		return $res[0];
	}

	public function register($data)
	{
		$this->db->insert('doctors',$data);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}

	public function login($email,$password)
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

	public function total_count()
    {
		$data = $_SESSION['doctorinfo'];
		$res_doc = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$data['email'])
		->get()->result_array();

		$id = $res_doc[0]['doctor_id'];
	
		$res = $this->db->select('*')
		->from('appointments')
		->where('doctor_id',$id)
		->get()->result_array();

		$res1 = $this->db->select('*')
		->from('patients')
		->join('appointments','patients.patient_id=appointments.patient_id')
		->where('appointments.doctor_id',$id)
		->get()->result_array();
	

		$res2 = $this->db->select('*')
		->from('invoices')
		->where('doctor_id',$id)
		->get()->result_array();

		$res3 = $this->db->select('*')
		->from('invoices')
		->where('payment_status','Paid')
		->where('doctor_id',$id)
		->get()->result_array();
		
		$total = 0;
		for($i=0; $i< count($res3); $i++) :
				$amount = json_decode($res3[$i]['invoice_amount']);
				$total += array_sum($amount);
		endfor;
		
		return array('appointment'=>count($res),'patient'=>count($res1),'invoice'=>count($res2),'total'=>$total);
	}

	public function doctorwise_patient()
	{	
		$session_data = $_SESSION['doctorinfo'];
		
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();
			
		$data = $this->db->select('*')
		->from('patients')
		->join('appointments','patients.patient_id=appointments.patient_id')
		->where('appointments.doctor_id',$doctor_details[0]['doctor_id'])
		->order_by('patients.patient_id', 'DESC')
		->limit(5)
		->get()->result_array();
		return $data;
	}

	public function get_doctor_profile()
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		return $doctor_details[0];
	}

	public function update_profile($data)
	{
		$session_data = $_SESSION['doctorinfo'];
		$this->db->set('doctor_name',$data['doctor_name']);
		$this->db->set('doctor_email',$data['doctor_email']);
		$this->db->set('doctor_phone',$data['doctor_phone']);
		$this->db->set('doctor_hospital',$data['doctor_hospital']);
		$this->db->set('doctor_designation',$data['doctor_designation']);
		$this->db->set('doctor_qualification',$data['doctor_qualification']);
		$this->db->where('doctor_email',$session_data['email']);
		$this->db->update('doctors');
		$data = array('email'=>$data['doctor_email']);
		$this->session->set_userdata('doctorinfo',$data);
		return true;
	}
	
	public function update_password($data)
	{
		$session_data = $_SESSION['doctorinfo'];
		$pwd = $this->db->query("SELECT doctor_id from doctors where doctor_password ='".$data['cpass']."' and doctor_email = '".$session_data['email']."'");

		if(count($pwd->result_array()) == 1)
		{
			$this->db->query("update doctors set doctor_password='".$data['password']."' where doctor_email='".$session_data['email']."'");
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_photo($data)
	{
		$this->db->set('doctor_photo',$data);
		$this->db->update('doctors');
		return true;
	}

	public function auth_doctor_details()
	{
		if(isset($_SESSION['lockinfo']) && !isset($_SESSION['doctorinfo'])){
			$session_data = $_SESSION['lockinfo'];
		}else{
			$session_data = $_SESSION['doctorinfo'];
		}
		$doctor_info = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		return $doctor_info[0];
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
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();
		$doctor_details = $doctor_details[0];

		$res = $this->db->query("SELECT appointments.*, patients.p_name FROM appointments, patients WHERE patients.patient_id = appointments.patient_id AND date = DATE_FORMAT(CURDATE(),'%Y/%m/%d') AND appointments.doctor_id ='" .$doctor_details["doctor_id"]."'");
		return $res->result_array();
	}

	public function get_prescription()
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();
		
		$res = $this->db->query("select prescription_id, p_name, DATE_FORMAT(prescriptions.date, '%M %d,%Y') as date from patients,prescriptions where patients.patient_id = prescriptions.patient_id AND prescriptions.doctor_id ='" .$doctor_details[0]["doctor_id"]."'");
		return $res->result_array();
	}

	public function get_invoice()
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$res = $this->db->query("select invoice_id, p_name, payment_status, invoice_amount, DATE_FORMAT(invoices.invoice_date, '%M %d,%Y') as date from patients,invoices where patients.patient_id = invoices.patient_id AND invoices.doctor_id ='" .$doctor_details[0]["doctor_id"]."'");
		
		return $res->result_array();
	}

	public function patient_list()
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$data = $this->db->select('*')
		->from('patients')
		->join('appointments','patients.patient_id=appointments.patient_id')
		->where('appointments.doctor_id',$doctor_details[0]['doctor_id'])
		->order_by('patients.patient_id', 'DESC')
		->limit(5)
		->get()->result_array();
		return $data;
	}
	public function medicines()
	{
		$data = $this->db->select('*')
		->from('medicines')
		->get()->result_array();
		return $data;
	}

	public function patient_info($id)
	{
		$data = $this->db->query('select * from patients where patient_id = '.$id);
		return $data->result_array();
	}

	public function patient_appointment_details($id)
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$data = $this->db->select('*')
		->from('appointments')
		->where('patient_id',$id)
		->where('doctor_id',$doctor_details[0]['doctor_id'])
		->get()->result_array();
		return $data;
	}

	public function patient_prescription_details($id)
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$data = $this->db->select('*')
		->from('prescriptions')
		->where('patient_id',$id)
		->where('doctor_id',$doctor_details[0]['doctor_id'])
		->get()->result_array();
		return $data;
	}

	public function patient_invoice_details($id)
	{
		$session_data = $_SESSION['doctorinfo'];
		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		
		$data = $this->db->select('*')
		->from('invoices')
		->where('patient_id',$id)
		->where('doctor_id',$doctor_details[0]['doctor_id'])
		->get()->result_array();

		return $data;
	}

	public function getinvoice()
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();
	
		$res = $this->db->query("select invoice_id, p_name, payment_status, invoice_amount, DATE_FORMAT(invoices.invoice_date, '%M %d,%Y') as date from patients,invoices where patients.patient_id = invoices.patient_id AND invoices.doctor_id ='" .$doctor_details[0]["doctor_id"]."'");
		
		return $res->result_array();
	}

	public function appointment_list_by_date($date)
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$res = $this->db->select('p_name,appointments.time')
		->from('appointments')
		->join('patients','appointments.patient_id=patients.patient_id')
		->where('appointments.date',$date)
		->where('appointments.doctor_id',$doctor_details[0]["doctor_id"])
		->get();
		return $res->result_array();
	}

	public function addprescription($data)
	{
		$this->db->insert('prescriptions',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function getuser()
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();
		
		return $doctor_details[0];
	}

	public function getprescriptionbyid($id)
	{
		$res = $this->db->select('*')
		->from('prescriptions')
		->where('prescription_id',$id)
		->get()
		->result_array();
		return $res[0];
	}

	public function getp_name($id)
	{
		$res = $this->db->select('*')
		->from('patients')
		->where('patient_id',$id)
		->get()
		->result_array();
		return $res[0];
	}

	public function deleteprescription($id)
	{
		$this->db->where('prescription_id', $id);
		$this->db->delete('prescriptions');
		return true;
	}

	public function appointmentchart()
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$id = $doctor_details[0]['doctor_id'];
		$res = $this->db->select('MONTHNAME(appointments.date) AS month, Month(appointments.date) as num_month, count(*) AS total')
		->from('appointments')
		->where('doctor_id',$id)
		->get()->result_array();
		
		return $res;
	}

	public function invoicechart()
	{
		$session_data = $_SESSION['doctorinfo'];

		$doctor_details = $this->db->select('*')
		->from('doctors')
		->where('doctor_email',$session_data['email'])
		->get()->result_array();

		$res = $this->db->select('payment_status as status, count(*) as total')
		->from('invoices')
		->where('doctor_id',$doctor_details[0]['doctor_id'])
		->group_by('status')
		->get()->result_array();
		return $res;
	}

	public function createinvoice($data)
	{
		$this->db->insert('invoices',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
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

	public function deleteinvoice($id)
	{
		$this->db->where('invoice_id', $id);
		$this->db->delete('invoices');
		return true;
	}

	public function get_patient($id)
	{
		$data = $this->db->query('select * from patients where patient_id = '.$id);
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
		$this->db->update('patients');
		return true;
	}


	//

	

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

	public function doctor_info()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_type',0);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function addpatient($data)
	{
		$this->db->insert('patient',$data);
		return true;
	}

	public function regiterPatient($data)
	{
		$this->db->insert('patients',$data);
		$insert_id = $this->db->insert_id();

   		return  $insert_id;
	}


	public function updatelogo($data)
	{
		$this->db->set('logo',$data);
		$this->db->update('users');
		return true;
	}

	public function updateprofilepic($data)
	{
		$this->db->set('profile_photo',$data);
		$this->db->update('users');
		return true;
	}

	public function doctor_updateprofilepic($data)
	{
		$this->db->set('doctor_photo',$data);
		$this->db->update('doctors');
		return true;
	}

	public function deletepatient($id)
	{
		$this->db->where('patient_id', $id);
		$this->db->delete('patient');
		return true;
	}

	public function chkappointment($data)
	{
	
		$res = $this->db->query("select patient_id from appointment where patient_id=".$data['patient_id']." and date='".$data['date']."'");
		if(count($res->result_array())==1){
			return 1;
		}else{
			$res1 = $this->db->query("select patient_id from appointment where time='".$data['time']."' and date='".$data['date']."'");
			
			if(count($res1->result_array())==1)
			{
				return 2;
			}
			else
			{
				$this->db->insert('appointment',$data);
			}
		}
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

	public function getprescription()
	{
		$datas = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$datas['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];
		
		if($doctor_id['user_type'] == 0){
			$res = $this->db->query("select prescription_id, p_name, DATE_FORMAT(prescription.date, '%M %d,%Y') as date from patient,prescription where patient.patient_id = prescription.patient_id AND prescription.user_id ='" .$doctor_id["user_id"]."'");
		}else{
			$res = $this->db->query("select prescription_id, p_name, DATE_FORMAT(prescription.date, '%M %d,%Y') as date from patient,prescription where patient.patient_id = prescription.patient_id AND prescription.patient_id ='" .$doctor_id["patient_id"]."'");
		}
		return $res->result_array();
	}

	public function updateprofile($data)
	{
		$this->db->set('doctor_name',$data['name']);
		$this->db->set('email',$data['email']);
		$this->db->set('mobile',$data['phone']);
		$this->db->where('user_name',$data['user_name']);
		$this->db->update('users');
		return true;
	}
	
	public function doctor_updateprofile($data)
	{
		$this->db->set('doctor_name',$data['doctor_name']);
		$this->db->set('doctor_email',$data['doctor_email']);
		$this->db->set('doctor_phone',$data['doctor_phone']);
		$this->db->where('doctor_hospital',$data['doctor_hospital']);
		$this->db->where('doctor_designation',$data['doctor_designation']);
		$this->db->where('doctor_qualification',$data['doctor_qualification']);
		$this->db->update('doctors');
		return true;
	}

	public function user_info()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()
		->result_array();
		return $res[0];
	}

	
	public function appointment_list2()
	{
		$data = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$data['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];

		$res = $this->db->query("SELECT appointment.*, patient.p_name FROM appointment, patient WHERE patient.patient_id = appointment.patient_id AND date = DATE_FORMAT(CURDATE(),'%Y/%m/%d') AND appointment.user_id ='" .$doctor_id["user_id"]."'");
		return $res->result_array();
	}

	public function appointmentlist($date)
	{
		$data = $_SESSION['userdata'];
		$res_doc = $this->db->select('*')
		->from('users')
		->where('user_name',$data['username'])
		->get()->result_array();
		$doctor_id = $res_doc[0];
		
		if($doctor_id['user_type'] == 0){
			$res = $this->db->select('p_name,appointment.time')
			->from('appointment')
			->join('patient','appointment.patient_id=patient.patient_id')
			->where('appointment.date',$date)
			->where('appointment.user_id',$doctor_id["user_id"])
			->get();
		}else{
			$res = $this->db->select('p_name,appointment.time')
			->from('appointment')
			->join('patient','appointment.patient_id=patient.patient_id')
			->where('appointment.date',$date)
			->where('appointment.patient_id',$doctor_id["patient_id"])
			->get();
		}
		
	
		return $res->result_array();
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