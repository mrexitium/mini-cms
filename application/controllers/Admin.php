<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('auth')) {

		    $this->load->view('admin/index');
		}
		else {
			echo "You're not an admin, try logging in again.";
		}
	}

	public function logout() 
	{
		if($this->session->userdata('auth')) {

			$this->session->unset_userdata('auth');
		    redirect(base_url(''));
		
		}
		else {
			echo "You're not currently logged in, try logging in before you log out.";
		}

	}

	public function create() 
	{

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('admin_model');

		if($this->session->userdata('auth')) {

			if (!$this->input->server('REQUEST_METHOD') === 'POST') {
				$this->load->view('admin/create');
			}

			if ($this->form_validation->run('create') === FALSE) 
			{
				$this->load->view('admin/create');
				return false;
			}

			
			
		
		} else {
			echo "You need to be an admin to create new pages.";
		}
		
	}
}