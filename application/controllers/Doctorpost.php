<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctorpost extends CI_Controller {

    public function register()
    {
        $this->form_validation->set_rules('doctor_name', 'Doctor_name', 'required');
        $this->form_validation->set_rules('doctor_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('doctor_phone', 'Phone', 'required');
        $this->form_validation->set_rules('doctor_hospital', 'Hospital', 'required');
        $this->form_validation->set_rules('doctor_designation', 'Designation', 'required');
        $this->form_validation->set_rules('doctor_qualification', 'Qualification', 'required');
        $this->form_validation->set_rules('doctor_password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm_Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
           
            $error['doctor_name'] = form_error('doctor_name');
            $error['doctor_email'] = form_error('doctor_email');
            $error['doctor_phone'] = form_error('doctor_phone');
            $error['doctor_hospital'] = form_error('doctor_hospital');
            $error['doctor_designation'] = form_error('doctor_designation');
            $error['doctor_qualification'] = form_error('doctor_qualification');
            $error['doctor_password'] = form_error('password');
            $error['cpassword'] = form_error('cpassword');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'doctor/register');
        }
        else
        {
            $config['upload_path']   = 'assets/images';
            $config['allowed_types'] = 'jpg|png|ico|jpeg';

            $this->load->library('upload', $config); 
            
            if(!$this->upload->do_upload('doctor_photo'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                $this->session->set_flashdata('image', $error);
                redirect(base_url().'doctor/register'); 
            }
            else{
                $data = $this->input->post(); 
                $dataup = array('upload_data' => $this->upload->data()); 
                $dataedit = array('doctor_name'=>$data['doctor_name'],'doctor_email'=>$data['doctor_email'],'doctor_phone'=>$data['doctor_phone'],'doctor_password'=>base64_encode($data['doctor_password']),'doctor_photo'=>$dataup['upload_data']['file_name'],'doctor_hospital'=>$data['doctor_hospital'],'doctor_designation'=>$data['doctor_designation'],'doctor_qualification'=>$data['doctor_qualification']);

                $res = $this->doctor_mo->register($dataedit);
                if($res){
                    $email = $this->input->post('doctor_email');
                    $password = base64_encode($this->input->post('doctor_password'));
        
                    if($this->doctor_mo->login($email,$password))
                    {
                        $loginData = array('email'=>$email);
                        $this->session->set_userdata('doctorinfo',$loginData);
                        redirect(base_url('doctor/dashboard'));
                    }
                }
                else
                {
                    redirect(base_url().'doctor/register');
                }
            }
        }
    }

    public function login()
	{
        $email = $this->input->post('email');
        $password = base64_encode($this->input->post('password'));
        
        if($this->doctor_mo->login($email,$password))
		{
            $data = array('email'=>$email);
            $this->session->set_userdata('doctorinfo',$data);
            $this->session->unset_userdata('lockinfo');
            redirect(base_url('doctor/dashboard'));
        }
        else
        {
            $this->session->set_flashdata('msg','Please Check Your Credentials!!');
            redirect(base_url('doctor'));
        }
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('doctor'));
    }

    public function update_profile()
    {
        $data['doctor_name'] = $this->input->post('doctor_name');
        $data['doctor_email'] = $this->input->post('doctor_email');
        $data['doctor_phone'] = $this->input->post('doctor_phone');
        $data['doctor_hospital'] = $this->input->post('doctor_hospital');
        $data['doctor_designation'] = $this->input->post('doctor_designation');
        $data['doctor_qualification'] = $this->input->post('doctor_qualification');

        if($this->doctor_mo->update_profile($data))
        {
            redirect(base_url('doctor/profile'));
        }
    }

    public function update_password()
    {
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));

        if($this->doctor_mo->update_password($data))
        {
            echo json_encode(array('status'=>1));   
        }
        else
        {
            echo json_encode(array('status'=>2));   
        }
    }

    public function update_photo()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico'; 

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('doctor_photo'))
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'doctor/profile');     
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data());
            $res = $this->doctor_mo->update_photo($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'doctor/profile');
            }
            else
            {
                redirect(base_url().'doctor/profile');
            }
        }
    }

    public function appointment_list()
    {
        $dt = $_GET['date'];
        $res = $this->security->xss_clean($this->doctor_mo->appointment_list_by_date($dt));
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

    // Prescription
    public function addprescription()
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required');
        $this->form_validation->set_rules('symptoms', 'Symptoms', 'required');
        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
        $this->form_validation->set_rules('medicine_name[]', 'Medicine_name', 'required');
        $this->form_validation->set_rules('medicine_note[]', 'Medicine_note', 'required');
        $this->form_validation->set_rules('m_dose[]', 'Medicine_note', 'required');
        $this->form_validation->set_rules('test_name[]', 'Test_name', 'required');
        $this->form_validation->set_rules('test_note[]', 'Test_note', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $error['patient_id'] = form_error('patient_id');
            $error['symptoms'] = form_error('symptoms');
            $error['diagnosis'] = form_error('diagnosis');
            $error['medicine_name'] = form_error('medicine_name[]');
            $error['medicine_note'] = form_error('medicine_note[]');
            $error['m_dose'] = form_error('m_dose[]');
            $error['test_name'] = form_error('test_name[]');
            $error['test_note'] = form_error('test_note[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'doctor/addprescription');
        }
        else
        {
            $session_data = $_SESSION['doctorinfo'];

            $doctor_details = $this->db->select('*')
            ->from('doctors')
            ->where('doctor_email',$session_data['email'])
            ->get()->result_array();
            
            $data['patient_id'] = $this->input->post('patient_id');
            $data['doctor_id'] = $doctor_details[0]['doctor_id'];
            $data['symptoms'] = $this->input->post('symptoms');
            $data['diagnosis'] = $this->input->post('diagnosis');
            $data['medicine'] = json_encode($this->input->post('medicine_name[]'));
            $data['m_note'] = json_encode($this->input->post('medicine_note[]'));
            $data['m_dose'] = json_encode($this->input->post('m_dose[]'));
            $data['test'] = json_encode($this->input->post('test_name[]'));
            $data['t_note'] = json_encode($this->input->post('test_note[]'));
            $data['date'] = date('Y-m-d');

            $doctor_insert = $this->doctor_mo->addprescription($data);
           
            if($doctor_insert)
            {
                redirect(base_url('doctor/print_prescription/').$doctor_insert);
            }
        }
    }

    public function deleteprescription()
    {
        $id = $this->uri->segment(3);
        if($this->doctor_mo->deleteprescription($id))
        {
            redirect(base_url('doctor/prescription'));
        }
    }

    //Dashboard
    public function appointmentchart()
    {
        $res = $this->security->xss_clean($this->doctor_mo->appointmentchart());
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
        $res = $this->security->xss_clean($this->doctor_mo->invoicechart());
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

    //Invoice Module
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
            redirect(base_url().'doctor/createinvoice');
        }
        else
        {
            $session_data = $_SESSION['doctorinfo'];

            $doctor_details = $this->db->select('*')
            ->from('doctors')
            ->where('doctor_email',$session_data['email'])
            ->get()->result_array();
            
            $data['patient_id'] = $this->input->post('patient_id');
            $data['doctor_id'] = $doctor_details[0]['doctor_id'];
            $data['payment_mode'] = $this->input->post('payment_mode');
            $data['payment_status'] = $this->input->post('payment_status');
            $data['invoice_title'] = json_encode($this->input->post('invoice_title[]'));
            $data['invoice_amount'] = json_encode($this->input->post('invoice_amount[]'));
            $data['invoice_date'] = date('Y-m-d');

            $doctor_insert = $this->doctor_mo->createinvoice($data);
           
            if($doctor_insert)
            {
                redirect(base_url('doctor/print_invoice/').$doctor_insert);
            }
        }
    }

    public function deleteinvoice()
    {
        $id = $this->uri->segment(3);
        if($this->doctor_mo->deleteinvoice($id))
        {
            redirect(base_url('doctor/billing'));
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

        if($this->doctor_mo->editpatient($data))
        {
            redirect(base_url('doctor/patient_profile/').$data['patient_id']);
        }
    }

    //

  

    public function deletepatient()
    {
        $id = $this->uri->segment(3);
        if($this->doctor->deletepatient($id))
        {
            redirect(base_url('user/patients'));
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
      
        $res = $this->doctor->chkappointment($data);
      
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


   

    public function doctor_updateprofile()
    {
        $user = $this->session->userdata('userinfo');
        $data['doctor_name'] = $this->input->post('doctor_name');
        $data['doctor_email'] = $this->input->post('doctor_email');
        $data['doctor_phone'] = $this->input->post('doctor_phone');
        $data['doctor_hospital'] = $this->input->post('doctor_hospital');
        $data['doctor_designation'] = $this->input->post('doctor_designation');
        $data['doctor_qualification'] = $this->input->post('doctor_qualification');

        if($this->doctor->doctor_updateprofile($data))
        {
            redirect(base_url('user/doctor_profile'));
        }
    }

    public function doctor_updatepassword()
    {
        $user = $this->session->userdata('doctorinfo');
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));
        $data['doctor_email'] = $user['email'];

        if($this->doctor->doctor_updatepassword($data))
        {
            echo json_encode(array('status'=>1));   
        }
        else
        {
            echo json_encode(array('status'=>2));   
        }
    }

    public function updatepassword()
    {
        $user = $this->session->userdata('userinfo');
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));
        $data['user_name'] = $user['username'];

        if($this->doctor->updatepassword($data))
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
            $res = $this->doctor->updatelogo($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'user/profile');
            }
            else
            {
                redirect(base_url().'user/profile');
            }
        }
    }

    public function updateprofilepic()
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
            $res = $this->doctor->updateprofilepic($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'user/profile');
            }
            else
            {
                redirect(base_url().'user/profile');
            }
        }
    }

    public function doctor_updateprofilepic()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico|jpeg';  

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('doctor_photo')) // file upload in folder
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'user/doctor_profile'); // user redirect          
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data()); /// file name 
            $res = $this->doctor->doctor_updateprofilepic($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'user/doctor_profile');
            }
            else
            {
                redirect(base_url().'user/doctor_profile');
            }
        }
    }

    public function appointmentlist()
    {
        $dt = $_GET['date'];
        $res = $this->security->xss_clean($this->doctor->appointmentlist($dt));
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }


    public function patient_recoverpassword()
    {
        $email = $this->input->post('email');
        $user = $this->doctor->getPatientByEmail($email);
        if(count($user) == 1)
        {
            $htmlContent = '<h1>eDoctor sent your password to login to System</h1>';
            $htmlContent .= '<p>Your password is : ';
            $htmlContent .= base64_decode($user[0]['password']);
            $htmlContent .= '</p>';
          
            $config =array(
                'protocol'=>'smtp', 
                'smtp_host'=>"smtp.gmail.com",
                'smtp_port'=>465,
                'smtp_user'=>"puskuuuu@gmail.com",
                'smtp_pass'=>"72874143:)",
                'smtp_crypto'=>'ssl',               
                'mailtype'=>'html');

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('puskuuuu@gmail.com');
            $this->email->to($email);
            $this->email->subject('eDoctor - Online Consultation');
            $this->email->message($htmlContent);
            if(!$this->email->send())
            {
                show_error($this->email->print_debugger());
            }
            else
            {
                echo json_encode(array('status'=>1));
            }
        }
        else
        {
            echo json_encode(array('status'=>0));
        }
    }
}