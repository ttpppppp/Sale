<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdminController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginAdminModel');
	}
	public function checkLogin()
	{
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('loginAdmin/index');
		$this->load->view('template/footer');
		
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		$this->form_validation->set_message('valid_email', '<span style="color:red ;font-size: 12px;">Trường %s phải là một địa chỉ email hợp lệ</span>');
		if($this->form_validation->run()){
			 $email = $this->input->post('email');
             $password = md5($this->input->post('password'));
             $result = $this->LoginAdminModel->checkLogin($email , $password);
            if ($result) {
			    $session_array = [
			        'id' => $result[0]->id,
			        'username' => $result[0]->username,
			        'email' => $result[0]->email
			    ];
			    $this->session->set_userdata('LoggedIn', $session_array);
			    $this->session->set_flashdata('success_message', 'Login Successly');
			    redirect(base_url('index.php/dashboard'));
             }else{
             	$this->session->set_flashdata('fail_message', 'Wrong Email or Password');
             	redirect(base_url('index.php/admin/login'));
             }
		}else{

			$this->index();
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('LoggedIn');
		redirect(base_url('index.php/admin/login'));	
	}

}

/* End of file LoginAdminController.php */
/* Location: ./application/controllers/LoginAdminController.php */