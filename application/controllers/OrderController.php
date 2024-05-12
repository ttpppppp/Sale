<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('OrderModel');
	}

	public function index()
	{
		$this->config->config['adminTitle'] = "Danh sách đơn hàng - Mew Mobile";
		$data['orders'] = $this->OrderModel->getOrders();
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Order/OrderList' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function view($id)
	{
		$this->config->config['adminTitle'] = "Chi tiết đơn hàng - Mew Mobile";
		$data['orderdetail'] = $this->OrderModel->getOrdersById($id);
		$data['orderTotal'] = $this->OrderModel->getTotalPrice($id);
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Order/OrderView' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function delete($ordercode)
	{
		$deleteDetails = $this->OrderModel->deleteOrderDetail($ordercode);
		$delete = $this->OrderModel->deleteOrder($ordercode);
		if($delete){
			$this->session->set_flashdata('success_message', 'Delete Order Success!');
			redirect(base_url('index.php/order/list'));
		}else{
			$this->session->set_flashdata('success_message', 'Delete Order Fail!');
			redirect(base_url('index.php/order/list'));
		}
	}
	public function process()
	{
		$valueProcess = $this->input->post('valueProcess');
		$ordercode = $this->input->post('ordercode');
		$data = [
			'status' => $valueProcess
		];
		$this->OrderModel->updateOrder($data , $ordercode);
		redirect(base_url('index.php/order/list'));
	}
}

/* End of file OrderController.php */
/* Location: ./application/controllers/OrderController.php */