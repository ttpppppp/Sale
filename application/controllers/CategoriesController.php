<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoriesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoriesModel');
	}

	public function index()
	{
		$data['categories'] = $this->CategoriesModel->getCategories();
		$this->config->config['adminTitle'] = "Danh sách danh mục - Mew Mobile";
		$this->load->view('pages/admin_template/_header' , $data);
		$this->load->view('Categories/ListCategories' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function addcategories()
	{
		$this->config->config['adminTitle'] = "Thêm danh mục - Mew Mobile";
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Categories/CategoriesAddView');
		$this->load->view('pages/admin_template/_footer');
	}
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		if ($this->form_validation->run() ==  TRUE){
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/categories',
			    'allowed_types' => 'jpg|jpeg|png|gif|webp',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('fail_message', 'Add Categories Fail!');
                $this->load->view('pages/admin_template/_header');
				$this->load->view('Categories/CategoriesAddView' , $error);
				$this->load->view('pages/admin_template/_footer');
				redirect(base_url('index.php/categories/add'));
             }else{
             	$brand_filename = $this->upload->data('file_name');
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'image' => $brand_filename 
		 		];
			 	$this->CategoriesModel->insertData($data);
			 	$this->session->set_flashdata('success_message', 'Add Brand Success!');
			 	redirect(base_url('index.php/categories/list'));
             }
		}else{
			$this->session->set_flashdata('fail_message', 'Add Categories Fail!');
			$this->addcategories();
		}
	}
	public function edit($categoriesid)
	{
		$this->config->config['adminTitle'] = "Sửa danh mục- Mew Mobile";
		$data['categories'] = $this->CategoriesModel->getCategoriesById($categoriesid);
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Categories/CategoriesEditView' , $data);
		$this->load->view('pages/admin_template/_footer');
		
	}
	public function update($categoriesid)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required'); // Set rule
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');//decs rule
		if ($this->form_validation->run() ==  TRUE){
			if(!empty($_FILES['image']['name'])){
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/categories',
			    'allowed_types' => 'jpg|jpeg|png|gif|webp',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pages/admin_template/_header');
				$this->load->view('Categories/CategoriesEditView' , $error);
				$this->load->view('pages/admin_template/_footer');
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
          	$this->CategoriesModel->updateData($data , $categoriesid);
          	$this->session->set_flashdata('success_message', 'Update Brand Successly');
			redirect(base_url('index.php/categories/list'));
		}else{
			$this->session->set_flashdata('fail_message', 'Add Brand Fail!');
			$this->edit($categoriesid);
		}
	}
	public function delete($categoriesid)
	{
		$this->CategoriesModel->deleteData($categoriesid);
		redirect(base_url('index.php/categories/list'));
	}

}

/* End of file CategoriesController.php */
/* Location: ./application/controllers/CategoriesController.php */