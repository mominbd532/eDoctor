<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mo extends CI_Model {

	public function site_details()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()->result_array();
		return $res[0];
	}

	public function total_count()
    {
		$res = $this->db->select('*')
		->from('appointments')
		->get()->result_array();

		$res1 = $this->db->select('*')
		->from('patients')
		->get()->result_array();
	

		$res2 = $this->db->select('*')
		->from('invoices')
		->get()->result_array();

		$res3 = $this->db->select('*')
		->from('invoices')
		->get()->result_array();
		
		$total = 0;
		for($i=0; $i< count($res3); $i++) :
				$amount = json_decode($res3[$i]['invoice_amount']);
				$total += array_sum($amount);
		endfor;
		
		return array('appointment'=>count($res),'patient'=>count($res1),'invoice'=>count($res2),'total'=>$total);
	}

	public function patient()
	{
		$data = $this->db->select('*')
		->from('patients')
		->order_by('patients.patient_id', 'DESC')
		->limit(5)
		->get()->result_array();
		return $data;
	}

    public function login($email,$password)
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

	public function appointmentchart()
	{
		$res = $this->db->select('MONTHNAME(appointments.date) AS month, Month(appointments.date) as num_month, count(*) AS total')
		->from('appointments')
		->get()->result_array();
		
		return $res;
	}

	public function invoicechart()
	{
		$res = $this->db->select('payment_status as status, count(*) as total')
		->from('invoices')
		->group_by('status')
		->get()->result_array();
		return $res;
	}

	public function get_admin_profile()
	{
		$session_data = $_SESSION['userinfo'];

		$doctor_details = $this->db->select('*')
		->from('users')
		->where('email',$session_data['email'])
		->get()->result_array();

		return $doctor_details[0];
	}
	
	public function login_patient($email,$password)
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

	public function getuser($id)
	{
		$res = $this->db->select('*')
		->from('doctors')
		->where('doctor_id',$id)
		->get()->result_array();
		return $res[0];
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
		$this->db->from('patients');
		$data = $this->db->get();
		return $data->result_array();
	}
	public function doctor_info_list()
	{
		$this->db->select('*');
		$this->db->from('doctors');
		$data = $this->db->get();
		return $data->result_array();
	}

    public function medicine_info_list()
    {
        $this->db->select('*');
        $this->db->from('medicines');
        $data = $this->db->get();
        return $data->result_array();
    }

	public function doctor_info()
	{
		$this->db->select('*');
		$this->db->from('users');
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

	public function updatelogo($data)
	{
		$this->db->set('logo',$data);
		$this->db->update('users');
		return true;
	}
	
	public function updatefavicon($data)
	{
		$this->db->set('favicon',$data);
		$this->db->update('users');
		return true;
	}

	public function updateprofilepic($data)
	{
		$this->db->set('profile_photo',$data);
		$this->db->update('users');
		return true;
	}

	public function activate_doctor($data)
	{
		$this->db->set('doctor_status',$data['doctor_status']);
		$this->db->where('doctor_id',$data['doctor_id']);
		$this->db->update('doctors');
		return true;
	}

	public function deletepatient($id)
	{
		$this->db->where('patient_id', $id);
		$this->db->delete('patients');
		return true;
	}

	public function deletedoctor($id)
	{
		$this->db->where('doctor_id', $id);
		$this->db->delete('doctors');
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
		$data = $this->db->select('*')
		->from('appointments')
		->where('patient_id',$id)
		->get()->result_array();
		return $data;
	}

	public function get_prescription($id)
	{
		$data = $this->db->select('*')
		->from('prescriptions')
		->where('patient_id',$id)
		->get()->result_array();
		return $data;
	}

	public function addprescription($data)
	{
		$this->db->insert('prescription',$data);
		return true;
	}

	public function getprescription()
	{
		$res = $this->db->query("select prescription_id, p_name, DATE_FORMAT(prescriptions.date, '%M %d,%Y') as date from patients,prescriptions where patients.patient_id = prescriptions.patient_id");
		return $res->result_array();
	}

	public function getprescriptionbyid($id)
	{
		$res = $this->db->select('*')
		->from('prescriptions')
		->where('prescription_id',$id)
		->get()
		->result_array();
		return $res;
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
		$this->db->delete('prescription');
		return true;
	}

	public function createinvoice($data)
	{
		$this->db->insert('invoice',$data);
		return true;
	}

	public function getinvoice()
	{
		
		$res = $this->db->query("select invoice_id, p_name, payment_status, invoice_amount, DATE_FORMAT(invoices.invoice_date, '%M %d,%Y') as date from patients,invoices where patients.patient_id = invoices.patient_id");
		return $res->result_array();
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
		$this->db->delete('invoice');
		return true;
	}

	public function get_invoice($id)
	{
		$data = $this->db->select('*')
		->from('invoices')
		->where('patient_id',$id)
		->get()->result_array();

		return $data;
	}

	public function updateprofile($data)
	{
	    $session_data = $_SESSION['userinfo'];
		$this->db->set('user_name',$data['user_name']);
		$this->db->set('email',$data['email']);
		$this->db->set('user_phone',$data['user_phone']);
		$this->db->where('address',$data['address']);
		$this->db->where('title',$data['title']);
		$this->db->where('email',$session_data['email']);
		$this->db->update('users');
		$data = array('email'=>$data['email']);
		$this->session->set_userdata('userinfo',$data);
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

	public function updatepassword($data)
	{
		$pwd = $this->db->query("SELECT user_id from users where password ='".$data['cpass']."'");
		if(count($pwd->result_array()) == 1)
		{
			$this->db->query("update users set password='".$data['password']."' where user_name='".$data['user_name']."'");
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function appointment_list()
	{

		$res = $this->db->query("SELECT appointments.*, patients.p_name FROM appointments, patients WHERE patients.patient_id = appointments.patient_id AND date = DATE_FORMAT(CURDATE(),'%Y/%m/%d')");
		return $res->result_array();
	}

	public function appointmentlist($date)
	{
		$res = $this->db->select('p_name,appointments.time')
		->from('appointments')
		->join('patients','appointments.patient_id=patients.patient_id')
		->where('appointments.date',$date)
		->get();
	
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

	public function save_medicine($data){
        $this->db->insert('medicines', $data);
    }

    public function medicineInfo($id){
        $this->db->select('*');
        $this->db->from('medicines');
        $this->db->where('medicine_id',$id);
        $qresule=$this->db->get();
        $result =$qresule->row();
        return $result;
    }

    public function update_medicine($data){
        $this->db->set('name',$data['name']);
        $this->db->set('generic_name',$data['generic_name']);
        $this->db->set('company_name',$data['company_name']);
        $this->db->where('medicine_id',$data['medicine_id']);
        $this->db->update('medicines');

    }

    public function delete_medicine($medicineId){
        $this->db->where('medicine_id',$medicineId);
        $this->db->delete('medicines');
    }
}