<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class APIController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	    $this->load->model('IndexModel');
	    $response['data'] = $this->IndexModel->getProductHome();
	    echo json_encode($response);
	}
	public function notification()
	{
	    $this->db->select('*');
	    $this->db->from('orders');
	    $this->db->order_by('ship_id', 'desc');
	    $this->db->limit(5);
	    $query = $this->db->get();
	    $count = 0; // Biến đếm số đơn hàng

	    if ($query->num_rows() > 0) {
	        $orders = $query->result();
	        foreach ($orders as $order) {
	            $count++;
	            echo "<p class='m-1'>Mã đơn hàng: ".$order->order_code . " <br>" .'Thời gian: '. $order->orderdate;
	            
	            if ($count == 1) {
	                echo " <span class='new text-danger font-weight-bold'>Đơn hàng mới!</span>";
	            }
	            
	            echo "<br></p>";
	        }
	    } else {
	        echo "Không có đơn hàng mới.";
	    }
	}

}

/* End of file APIController.php */
/* Location: ./application/controllers/APIController.php */