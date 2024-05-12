<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData($data)
	{
		$this->db->insert('products', $data);
	}
	public function getProduct()
	{
		$query =  $this->db->select('categories.title as tendanhmuc , products.* ,brands.title as tenthuonghieu , brands.status as trangthai')
		->from('categories')
		->join('products', 'products.categoryid = categories.categoryid')
		->join('brands', 'brands.brandid = products.brandid')
		->get();
		return $query->result();
	}
	public function deleteData($productid)
	{
		$this->db->where('productid', $productid)->delete('products');
	}
	public function getProductById($productid)
	{
		$query = $this->db->where('productid', $productid)->get('products');
		return $query->row();
	}
	public function updateData($data , $productid)
	{
		return $this->db->update('products', $data , ['productid' => $productid]);
	}

}

/* End of file ProductModel.php */
/* Location: ./application/models/ProductModel.php */