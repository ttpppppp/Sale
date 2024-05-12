<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IndexModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAllBrandsHome()
	{
		$query =  $this->db->get_where('brands' , ['status' => 1]);
		return $query->result();
	}
	public function getAllCategoriesHome()
	{
		$query =  $this->db->get_where('categories',['status' => 1]);
		return $query->result();
	}
	public function getProductHome()
	{
		$query =  $this->db->select('categories.title as tendanhmuc , products.* ,brands.title as tenthuonghieu , brands.status as trangthai')
		->from('categories')
	                      ->join('products', 'products.categoryid = categories.categoryid')
	                      ->join('brands', 'brands.brandid = products.brandid')
	                      ->join('digital', 'digital.digitalid = products.digitalid')
		->where(['products.status' => 1 , 'brands.status' => 1])
		->get();
		return $query->result();
	}
	public function getAllProductHomeByID($id)
	{
	   
		$query =  $this->db->select('categories.title as tendanhmuc , brands.title as tenthuonghieu, products.*')
		->from('categories')
		->join('products', 'products.categoryid = categories.categoryid')
		->join('brands', 'brands.brandid = products.brandid')
		->where('products.categoryid' , $id)
		->get();
		return $query->result();
	}
	public function getAllProductDetails($id)
	{
	    $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu, brands.status as trangthai, digital.*')
	                      ->from('categories')
	                      ->join('products', 'products.categoryid = categories.categoryid')
	                      ->join('brands', 'brands.brandid = products.brandid')
	                      ->join('digital', 'digital.digitalid = products.digitalid')
	                      ->where(['products.productid' => $id])
	                      ->get();
	    return $query->result();
	}

	public function checkLoginCustomer($email , $password)
	{
		$query = $this->db->where('email', $email)->where('password', $password)->get('customer');
		return $query->result();
	}
	public function shippingAddData($data)
	{
		$query = $this->db->insert('shipping', $data);
		return $this->db->insert_id();
	}
	public function insertOrder($data)
	{
		$query = $this->db->insert('orders', $data);
	}
	public function insertOrderDetails($data)
	{
		$query = $this->db->insert('orderdetail', $data);
	}
	public function getAllProductByKeyword($keyword)
	{
		$query =  $this->db->select('categories.title as tendanhmuc , products.*')
		->from('categories')
		->join('products', 'products.categoryid = categories.categoryid')
		->like('products.title' , $keyword)
		->get();
		return $query->result();
	}
	public function getAllProductAsc($id, $gia)
	{
	    $query = $this->db->select('categories.title as tendanhmuc , products.*')
	        ->from('categories')
	        ->join('products', 'products.categoryid = categories.categoryid')
	        ->where('categories.categoryid', $id)
	        ->order_by('products.price', $gia) // Use $gia here to determine ascending or descending order
	        ->get();
	    return $query->result();
	}
	public function getAllProducRelated($id, $categoryId)
	{
	    $query = $this->db->select('categories.title as tendanhmuc, products.*')
	                      ->from('categories')
	                      ->join('products', 'products.categoryid = categories.categoryid')
	                      ->join('digital', 'digital.digitalid = products.digitalid')
	                      ->join('brands', 'brands.brandid = products.brandid')
	                      ->where('products.categoryid', $categoryId)
	                      ->where('products.productid !=', $id)
	                      ->get();
	    return $query->result();
	}
	public function getProductIdBySlug($slug)
	{
	    $query = $this->db->get_where('products', array('slug' => $slug));
	    $result = $query->row();

	    if ($result) {
	        return $result->productid;
	    } else {
	        return null; 
	    }
	}
	public function getCategoriesBySlug($slug)
	{
	    $query = $this->db->get_where('categories', array('slug' => $slug));
	    $result = $query->row();

	    if ($result) {
	        return $result->categoryid;
	    } else {
	        return null; 
	    }
	}
	public function getSlug($slug)
	{
		return $slug;
	}
	public function getBrandByCtegories($id , $brandid)
	{
		$query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu, brands.status as trangthai, digital.*')
	                      ->from('categories')
	                      ->join('products', 'products.categoryid = categories.categoryid')
	                      ->join('brands', 'brands.brandid = products.brandid')
	                      ->join('digital', 'digital.digitalid = products.digitalid')
	                      ->where(['categories.categoryid' => $id, 'brands.brandid' => $brandid])
	                      ->get();
	    return $query->result();
	}
	public function getPriceMinMax($id, $min, $max)
	{
	    $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu, brands.status as trangthai, digital.*')
	                      ->from('categories')
	                      ->join('products', 'products.categoryid = categories.categoryid')
	                      ->join('brands', 'brands.brandid = products.brandid')
	                      ->join('digital', 'digital.digitalid = products.digitalid')
	                      ->where('products.categoryid' , $id)
	                      ->where('products.price >=' , $min)
	                      ->where('products.price <=' , $max)
	                      ->get();
	    return $query->result();
	}

	public function updateViewCount($id, $viewData)
	{
	    $this->db->where('productid', $id);
	    return $this->db->update('products', $viewData);
	}
	public function updatePassword($email ,$data)
	{
		return $this->db->update('customer', $data , ['email' => $email]);
	}
	public function updateOrdersCheckout($order_code , $dataUpdate)
	{
		return $this->db->update('orders', $dataUpdate , ['order_code' => $order_code]);
	}

}

/* End of file IndexModel.php */
/* Location: ./application/models/IndexModel.php */