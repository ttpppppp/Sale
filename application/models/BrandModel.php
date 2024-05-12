<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData($data)
	{
		$this->db->insert('brands', $data);
	}
	public function getBrand()
	{
		$query =  $this->db->get('brands');
		return $query->result();
	}
	public function deleteData($brandid)
	{
	    $products = $this->db->where('brandid', $brandid)->get('products')->num_rows();
	    
	    if ($products > 0) {
	        $this->db->where('brandid', $brandid)->update('brands', array('status' => 0));
	    } else {
	        $this->db->where('brandid', $brandid)->delete('brands');
	    }
	}

	public function getBrandById($brandid)
	{
		$query = $this->db->where('brandid', $brandid)->get('brands');
		return $query->row();
	}
	public function updateData($data , $brandid)
	{
		return $this->db->update('brands', $data , ['brandid' => $brandid]);
	}
}

/* End of file BrandModel.php */
/* Location: ./application/models/BrandModel.php */