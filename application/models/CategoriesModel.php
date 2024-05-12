<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoriesModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData($data)
	{
		$this->db->insert('categories', $data);
	}
	public function getCategories()
	{
		$query =  $this->db->get('categories');
		return $query->result();
	}
	public function deleteData($categories)
	{
		$products = $this->db->where('categoryid', $categories)->get('products')->num_rows();
	    
	    if ($products > 0) {
	        $this->db->where('categoryid', $categories)->update('categories', array('status' => 0));
	    } else {
	       $this->db->where('categoryid', $categories)->delete('categories');
	    }
	}
	public function getCategoriesById($categoriesid)
	{
		$query = $this->db->where('categoryid', $categoriesid)->get('categories');
		return $query->row();
	}
	public function updateData($data , $categoriesid)
	{
		return $this->db->update('categories', $data , ['categoryid' => $categoriesid]);
	}

}

/* End of file CategoriesModel.php */
/* Location: ./application/models/CategoriesModel.php */