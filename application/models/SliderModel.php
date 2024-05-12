<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SliderModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getData()
	{
		$query = $this->db->select('*')->where('tenthuoctinh' , 'slider_topbanner')->get('sliders');
		$query = $query->result();
		foreach ($query as $key => $value) {
			$temp = $value->giatrithuoctinh;
		}
		return  $temp;
	}
	public function updateslider($dataSliders)
	{
		$data = [
			'tenthuoctinh' => 'slider_topbanner',
			'giatrithuoctinh' => $dataSliders
		];
		$this->db->where('tenthuoctinh' , 'slider_topbanner')->update('sliders' , $data);
	}
}

/* End of file SliderModel.php */
/* Location: ./application/models/SliderModel.php */