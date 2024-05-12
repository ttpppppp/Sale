<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdminModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function checkLogin($email , $password)
	{
		$query = $this->db->where('email', $email)->where('password', $password)->get('users');
		return $query->result();
	}

}

/* End of file LoginAdminModel.php */
/* Location: ./application/models/LoginAdminModel.php */