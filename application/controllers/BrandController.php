<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BrandModel');
	}

	public function index()
	{
		$this->config->config['adminTitle'] = "Danh sách nhãn hàng - Mew Mobile";
		$data['brands'] = $this->BrandModel->getBrand();
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Brand/BrandList' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function addbrand()
	{
		$this->config->config['adminTitle'] = "Thêm nhãn hàng - Mew Mobile";
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Brand/BrandAddView');
		$this->load->view('pages/admin_template/_footer');
	}
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required'); // Set rule
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		if ($this->form_validation->run() ==  TRUE){
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/brand',
			    'allowed_types' => 'jpg|jpeg|png|gif|webp',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('fail_message', 'Add Brand Fail!');
                $this->load->view('pages/admin_template/_header');
				$this->load->view('Brand/BrandAddView' , $error);
				$this->load->view('pages/admin_template/_footer');
				redirect(base_url('index.php/brand/add'));
             }else{
             	$brand_filename = $this->upload->data('file_name');
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'image' => $brand_filename 
		 		];
			 	$this->BrandModel->insertData($data);
			 	$this->session->set_flashdata('success_message', 'Add Brand Success!');
			 	redirect(base_url('index.php/brand/list'));
             }
		}else{
			$this->session->set_flashdata('fail_message', 'Add Brand Fail!');
			$this->addbrand();
		}
	}
	public function edit($brandid)
	{
		$this->config->config['adminTitle'] = "Sửa nhãn hàng - Mew Mobile";
		$data['brands'] = $this->BrandModel->getBrandById($brandid);
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Brand/BrandEditView' , $data);
		$this->load->view('pages/admin_template/_footer');
		
	}
	public function update($brandid)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required'); // Set rule
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');//decs rule
		if ($this->form_validation->run() ==  TRUE){
			if(!empty($_FILES['image']['name'])){
		 	$this->session->set_flashdata('success_message', 'Update Brand Successly');
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/brand',
			    'allowed_types' => 'jpg|jpeg|png|gif',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('brand/addbrand' , $error);
				$this->load->view('admin_template/footer');
             }else{
             	$brand_filename = $this->upload->data('file_name');
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'image' => $brand_filename 
		 		];
             }
         }else{
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		];
         }
          	$this->BrandModel->updateData($data , $brandid);
			redirect(base_url('index.php/brand/list'));
		}else{
			$this->session->set_flashdata('fail_message', 'Add Brand Fail!');
			$this->edit($brandid);
		}
	}
	public function delete($brandid)
	{
		$this->BrandModel->deleteData($brandid);
		redirect(base_url('index.php/brand/list'));
	}

}

/* End of file BrandController.php */
/* Location: ./application/controllers/BrandController.php */