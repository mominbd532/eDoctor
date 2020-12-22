<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patientpost extends CI_Controller
{
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9\+-]+$/]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('add', 'Address', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $error['name'] = form_error('name');
            $error['email'] = form_error('email');
            $error['age'] = form_error('age');
            $error['password'] = form_error('password');
            $error['gender'] = form_error('gender');
            $error['phone'] = form_error('phone');
            $error['add'] = form_error('add');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'patient/register');
        }
        else
        {
            $data['p_name'] = $this->input->post('name');
            $data['age'] = $this->input->post('age');
            $data['gender'] = $this->input->post('gender');
            $data['phone'] = $this->input->post('phone');
            $data['add'] = $this->input->post('add');
            $data['email'] = $this->input->post('email');
            $data['password'] = base64_encode($this->input->post('password'));
           
            $patient_insert = $this->patient_mo->register($data);
           
            if($patient_insert)
            {
                $email = $this->input->post('email');
                $password = base64_encode($this->input->post('password'));
    
                if($this->patient_mo->login($email,$password))
                {
                    $loginData = array('email'=>$email);
                    $this->session->set_userdata('patientinfo',$loginData);
                    redirect(base_url('patient/dashboard'));
                }
            }
            else
            {
                redirect(base_url().'patient/register');
            }
        }
    }

    public function login()
	{
        $email = $this->input->post('email');
        $password = base64_encode($this->input->post('password'));
        
        if($this->patient_mo->login($email,$password))
		{
            $data = array('email'=>$email);
            $this->session->set_userdata('patientinfo',$data);
            $this->session->unset_userdata('lockinfo');
            redirect(base_url('patient/dashboard'));
        }
        else
        {
            $this->session->set_flashdata('msg','Please Check Your Credentials!!');
            redirect(base_url('patient'));
        }
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('patient'));
    }

    public function update_profile()
    {
        $data['p_name'] = $this->input->post('p_name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');

        if($this->patient_mo->update_profile($data))
        {
            redirect(base_url('patient/profile'));
        }
    }

    public function update_password()
    {
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));

        if($this->patient_mo->update_password($data))
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
        
        if ( ! $this->upload->do_upload('profile_photo'))
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'patient/profile');     
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data());
            $res = $this->patient_mo->update_photo($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'patient/profile');
            }
            else
            {
                redirect(base_url().'patient/profile');
            }
        }
    }

    public function chkappointment()
    {
        $session_data = $_SESSION['patientinfo'];

        $patient_details = $this->db->select('*')
        ->from('patients')
        ->where('email',$session_data['email'])
        ->get()->result_array();

        $data['patient_id'] = $patient_details[0]['patient_id'];
        $data['doctor_id'] = $this->input->post('p_id');
        $data['date'] = $this->input->post('date');
        $data['time'] = $this->input->post('time');
  
        $res = $this->patient_mo->chkappointment($data);
       
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

    public function appointment_list()
    {
        $dt = $_GET['date'];
        $res = $this->security->xss_clean($this->patient_mo->appointment_list_by_date($dt));
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }


    //
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

        if($this->patient->editpatient($data))
        {
            redirect(base_url('user/patient_profile/').$data['patient_id']);
        }
    }

    public function appointmentchart()
    {
        $res = $this->security->xss_clean($this->patient->appointmentchart());
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
        $res = $this->security->xss_clean($this->patient->invoicechart());
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
        $user = $this->patient->getPatientByEmail($email);
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