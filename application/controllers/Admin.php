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
		$this->load->view('admin/create');
	}
}
