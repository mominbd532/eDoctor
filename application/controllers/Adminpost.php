<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPost extends CI_Controller
{

    public function login()
	{
        $email = $this->input->post('email');
        $password = base64_encode($this->input->post('password'));
        
        if($this->admin_mo->login($email,$password))
		{
            $data = array('email'=>$email);
			$this->session->set_userdata('userinfo',$data);
            redirect(base_url('admin/dashboard'));
        }
        else
        {
            $this->session->set_flashdata('msg','Please Check Your Credentials!!');
            redirect(base_url('admin'));
        }
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('admin'));
    }

    public function appointmentchart()
    {
        $res = $this->security->xss_clean($this->admin_mo->appointmentchart());
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

    public function invoicechart()
    {
        $res = $this->security->xss_clean($this->admin_mo->invoicechart());
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }


    public function editpatient()
    {
        $data['patient_id'] = $this->input->post('patient_id');
        $data['p_name'] = $this->input->post('name');
        $data['age'] = $this->input->post('age');
        $data['gender'] = $this->input->post('gender');
        $data['phone'] = $this->input->post('phone');
        $data['add'] = $this->input->post('add');
        $data['height'] = $this->input->post('height');
        $data['weight'] = $this->input->post('weight');
        $data['b_group'] = $this->input->post('blood_group');
        $data['b_pressure'] = $this->input->post('blood_pressure');
        $data['pulse'] = $this->input->post('pulse');
        $data['respiration'] = $this->input->post('respiration');
        $data['allergy'] = $this->input->post('allergy');
        $data['diet'] = $this->input->post('diet');

        if($this->admin_mo->editpatient($data))
        {
            redirect(base_url('admin/patient_profile/').$data['patient_id']);
        }
    }

    public function deletepatient()
    {
        $id = $this->uri->segment(3);
        if($this->admin_mo->deletepatient($id))
        {
            redirect(base_url('admin/patients'));
        }
    }
    public function deletedoctor()
    {
        $id = $this->uri->segment(3);
        if($this->admin_mo->deletedoctor($id))
        {
            redirect(base_url('admin/doctors'));
        }
    }

    public function chkappointment()
    {
        $datas = $_SESSION['userdata'];
        $res_doc = $this->db->select('*')
        ->from('users')
        ->where('user_name',$datas['username'])
        ->get()->result_array();

        $doctor_id = $res_doc[0];
        $data['patient_id'] = $doctor_id['patient_id'];
        $data['user_id'] = $this->input->post('p_id');
        $data['date'] = $this->input->post('date');
        $data['time'] = $this->input->post('time');
      
        $res = $this->admin->chkappointment($data);
      
        if($res ==1)
        {
            echo json_encode(array('status'=>1));
        }
        elseif($res == 2)
        {
            echo json_encode(array('status'=>2));
        }
        else
        {
            echo json_encode(array('status'=>0, 'res' => $res));
        }
    }

    public function addprescription()
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required');
        $this->form_validation->set_rules('symptoms', 'Symptoms', 'required');
        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
        $this->form_validation->set_rules('medicine_name[]', 'Medicine_name', 'required');
        $this->form_validation->set_rules('medicine_note[]', 'Medicine_note', 'required');
        $this->form_validation->set_rules('test_name[]', 'Test_name', 'required');
        $this->form_validation->set_rules('test_note[]', 'Test_note', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $error['patient_id'] = form_error('patient_id');
            $error['symptoms'] = form_error('symptoms');
            $error['diagnosis'] = form_error('diagnosis');
            $error['medicine_name'] = form_error('medicine_name[]');
            $error['medicine_note'] = form_error('medicine_note[]');
            $error['test_name'] = form_error('test_name[]');
            $error['test_note'] = form_error('test_note[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/addprescription');
        }
        else
        {
            $datas = $_SESSION['userdata'];
            $res_doc = $this->db->select('*')
            ->from('users')
            ->where('user_name',$datas['username'])
            ->get()->result_array();
            $doctor_id = $res_doc[0];
            
            $data['patient_id'] = $this->input->post('patient_id');
            $data['user_id'] = $doctor_id['user_id'];
            $data['symptoms'] = $this->input->post('symptoms');
            $data['diagnosis'] = $this->input->post('diagnosis');
            $data['medicine'] = json_encode($this->input->post('medicine_name[]'));
            $data['m_note'] = json_encode($this->input->post('medicine_note[]'));
            $data['test'] = json_encode($this->input->post('test_name[]'));
            $data['t_note'] = json_encode($this->input->post('test_note[]'));
            $data['date'] = date('Y-m-d');
            
            if($this->admin->addprescription($data))
            {
                $res = $this->db->query('select max(prescription_id) as id from prescription')->result_array();
                redirect(base_url('user/print_prescription/').$res[0]['id']);
            }
            else
            {
                
            }
        }
    }

    public function deleteprescription()
    {
        $id = $this->uri->segment(3);
        if($this->admin->deleteprescription($id))
        {
            redirect(base_url('user/prescription'));
        }
    }

    public function createinvoice()
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment_Mode', 'required');
        $this->form_validation->set_rules('payment_status', 'Payment_Status', 'required');
        $this->form_validation->set_rules('invoice_title[]', 'Invoice_Title', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('invoice_amount[]', 'Invoice_amount', 'required|numeric');
        if ($this->form_validation->run() == FALSE)
        {
            $error['patient_id'] = form_error('patient_id');
            $error['payment_mode'] = form_error('payment_mode');
            $error['payment_status'] = form_error('payment_status');
            $error['invoice_title'] = form_error('invoice_title[]');
            $error['invoice_amount'] = form_error('invoice_amount[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/createinvoice');
        }
        else
        {
            $datas = $_SESSION['userdata'];
            $res_doc = $this->db->select('*')
            ->from('users')
            ->where('user_name',$datas['username'])
            ->get()->result_array();
            $doctor_id = $res_doc[0];
            
            $data['patient_id'] = $this->input->post('patient_id');
            $data['user_id'] = $doctor_id['user_id'];
            $data['payment_mode'] = $this->input->post('payment_mode');
            $data['payment_status'] = $this->input->post('payment_status');
            $data['invoice_title'] = json_encode($this->input->post('invoice_title[]'));
            $data['invoice_amount'] = json_encode($this->input->post('invoice_amount[]'));
            $data['invoice_date'] = date('Y-m-d');
            
            if($this->admin->createinvoice($data))
            {
                $res = $this->db->query('select max(invoice_id) as id from invoice')->result_array();
                redirect(base_url('user/print_invoice/').$res[0]['id']);
            }
            else
            {
                
            }
        }
    }

    public function deleteinvoice()
    {
        $id = $this->uri->segment(3);
        if($this->admin->deleteinvoice($id))
        {
            redirect(base_url('user/billing'));
        }
    }

    public function updateprofile()
    {
        $user = $this->session->userdata('userinfo');
        $data['user_name'] = $this->input->post('user_name');
        $data['email'] = $this->input->post('email');
        $data['user_phone'] = $this->input->post('user_phone');
        $data['title'] = $this->input->post('title');
        $data['address'] = $this->input->post('address');

        if($this->admin_mo->updateprofile($data))
        {
            redirect(base_url('admin/profile'));
        }
    }


    public function updatepassword()
    {
        $user = $this->session->userdata('userinfo');
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));
        $data['user_name'] = $user['username'];

        if($this->admin_mo->updatepassword($data))
        {
            echo json_encode(array('status'=>1));   
        }
        else
        {
            echo json_encode(array('status'=>2));   
        }
    }

    public function updatelogo()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico'; 
        $config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 1280;  

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('logo')) // file upload in folder
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'user/profile'); // user redirect          
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data()); /// file name 
            $res = $this->admin_mo->updatelogo($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'admin/profile');
            }
            else
            {
                redirect(base_url().'admin/profile');
            }
        }
    }
    
     public function updatefavicon()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico'; 
        $config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 1280;  

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('favicon')) // file upload in folder
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'user/profile'); // user redirect          
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data()); /// file name 
            $res = $this->admin_mo->updatefavicon($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'admin/profile');
            }
            else
            {
                redirect(base_url().'admin/profile');
            }
        }
    }

    public function updateprofilepic()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico'; 

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('profile_photo')) // file upload in folder
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'user/profile'); // user redirect          
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data()); /// file name 
            $res = $this->admin_mo->updateprofilepic($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'admin/profile');
            }
            else
            {
                redirect(base_url().'admin/profile');
            }
        }
    }


    public function activate_doctor($id)
    {
            $dataup = array('doctor_status' => '1', 'doctor_id' => $id);
            $res = $this->admin_mo->activate_doctor($dataup);
            if($res) {
                redirect(base_url().'admin/doctors');
            }
            else
            {
                redirect(base_url().'admin/doctors');
            }
    }


    public function appointmentlist()
    {
        $dt = $_GET['date'];
        $res = $this->security->xss_clean($this->admin_mo->appointmentlist($dt));
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }
}