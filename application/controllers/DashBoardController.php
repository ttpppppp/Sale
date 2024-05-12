<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashBoardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('pages/admin_template/_header');
		$this->load->view('dashboard/index');
		$this->load->view('pages/admin_template/_footer');
	}

}

/* End of file DashBoardController.php */
/* Location: ./application/controllers/DashBoardController.php */