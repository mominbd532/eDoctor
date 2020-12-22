<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_mo extends CI_Model
{

	public function site_details()
	{
		$res = $this->db->select('*')
		->from('users')
		->get()->result_array();
		return $res[0];
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
}