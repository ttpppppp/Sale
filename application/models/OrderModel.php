<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getOrders()
	{
		$query = $this->db->select('*')
		->from('orders')
		->join('shipping' ,'orders.ship_id = shipping.id')
		->get();
		return $query->result();
	}
	public function getUser($id)
	{
		$query = $this->db->select('*')
		->from('customer')
		->where("customerid" , $id)
		->get();
		return $query->row();
	}
	public function getOrdersById($id)
	{
		$query = $this->db->select('products.* ,orderdetail.quantity as qty ,orderdetail.order_code')
		->from('orderdetail')
		->join('products' ,'orderdetail.productid = products.productid')
		->where(['orderdetail.order_code' => $id])
		->get();
		return $query->result();
	}
	public function deleteOrder($ordercode)
	{
		return $this->db->where('order_code', $ordercode)->delete('orders');
	}
	public function deleteOrderDetail($ordercode)
	{
		return $this->db->where_in('order_code', $ordercode)->delete('orderdetail');
	}
	public function updateOrder($data , $ordercode)
	{
		return $this->db->update('orders', $data , ['order_code' => $ordercode]);
	}
	public function getHistoryOrders($id)
	{
		$query = $this->db->select('orders.order_code as madonhang ,orders.status as trangthaidon , shipping.* , orders.*')
		->from('customer')
		->join('orders' ,'customer.customerid = orders.userId')
		->join('shipping' ,'shipping.id = orders.ship_id')
		->where(['customer.customerid' => $id])
		->get();
		return $query->result();
	}
	public function getTotalPrice($id)
	{
		return $query = $this->db->get_where('orders', array('order_code' => $id))->row();
	}
	public function historyDetails($ordercode)
	{
		$query = $this->db->select('orders.order_code as madonhang ,orders.status as trangthaidon , shipping.* , orders.*')
		->from('orders')
		->join('shipping' ,'shipping.id = orders.ship_id')
		->where(['orders.order_code' => $ordercode])
		->get();
		return $query->row();
	}
}

/* End of file OrderModel.php */
/* Location: ./application/models/OrderModel.php */