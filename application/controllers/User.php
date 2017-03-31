<?php 

class User extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');

		if( !$this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->load->view('index');
		}

		if ($this->form_validation->run('login') === FALSE)
		{
			$this->load->view('index');
			return false;
		}

		if ( !$user = $this->user_model->get_user_by_username($this->input->post('username'))) {
			redirect(base_url(''));
		}

		if(password_verify($this->input->post('password'), $user->password))
		{
				if ($user->admin == 1) {
					$this->session->set_userdata(array(
						'auth' => TRUE
					));

					unset($user);
					redirect(base_url('admin'));
				}
				
				unset($user);
				redirect(base_url(''));
				
		}

		redirect(base_url(''));
	}
}