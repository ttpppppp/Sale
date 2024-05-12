<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoriesModel');
		$this->load->model('BrandModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$this->config->config['adminTitle'] = "Danh sách sản phẩm - Mew Mobile";
		$data['products'] = $this->ProductModel->getProduct();
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Product/ListProduct' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function addproduct()
	{
		$this->config->config['adminTitle'] = "Thêm sản phẩm - Mew Mobile";
		$data['brands'] = $this->BrandModel->getBrand();
		$data['categories'] = $this->CategoriesModel->getCategories();
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Product/ProductAdd' , $data);
		$this->load->view('pages/admin_template/_footer');
	}
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('configuration', 'configuration', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		if ($this->form_validation->run() ==  TRUE){
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/product',
			    'allowed_types' => 'jpg|jpeg|png|gif|webp',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('fail_message', 'Add Product Fail!');
                $this->load->view('pages/admin_template/_header');
				$this->load->view('Product/ProductAdd' , $error);
				$this->load->view('pages/admin_template/_footer');
				redirect(base_url('index.php/product/add'));
             }else{
             	$filename = $this->upload->data('file_name');
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'price' => $this->input->post('price'),
		 		'brandid' => $this->input->post('brands'),
		 		'quantity' => $this->input->post('quantity'),
		 		'categoryid' => $this->input->post('categories'),
		 		'digitalid' => $this->input->post('configuration'),
		 		'image' => $filename 
		 		];
			 	$this->ProductModel->insertData($data);
			 	$this->session->set_flashdata('success_message', 'Add Product Success!');
			 	redirect(base_url('index.php/product/list'));
             }
		}else{
			$this->session->set_flashdata('fail_message', 'Add Product Fail!');
			$this->addproduct();
		}
	}
	public function edit($productid)
	{
		$this->config->config['adminTitle'] = "Sửa sản phẩm - Mew Mobile";
		$data['products'] = $this->ProductModel->getProductById($productid);
		$data['brands'] = $this->BrandModel->getBrand();
		$data['categories'] = $this->CategoriesModel->getCategories();
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Product/ProductEdit' , $data);
		$this->load->view('pages/admin_template/_footer');
		
	}
	public function update($productid)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required'); // Set rule
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');//decs rule
		if ($this->form_validation->run() ==  TRUE){
			if(!empty($_FILES['image']['name'])){
		 	$this->session->set_flashdata('success_message', 'Update Product Successly');
		 	$ori_filename = $_FILES['image']['name'];
			$new_name = time() . "-" . $ori_filename;
			$new_name = str_replace(' ', '_', $new_name);
			$config = [
			    'upload_path' => './upload/product',
			    'allowed_types' => 'jpg|jpeg|png|gif',
			    'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pages/admin_template/_header');
				$this->load->view('Categories/CategoriesEditView' , $error);
				$this->load->view('pages/admin_template/_footer');
             }else{
             	$filename = $this->upload->data('file_name');
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'price' => $this->input->post('price'),
		 		'brandid' => $this->input->post('brands'),
		 		'quantity' => $this->input->post('quantity'),
		 		'categoryid' => $this->input->post('categories'),
		 		'image' => $filename 
		 		];
             }
         }else{
             	$data = [
		 		'title' => $this->input->post('title'),
		 		'slug' => $this->input->post('slug'),
		 		'description' => $this->input->post('description'),
		 		'status' => $this->input->post('status'),
		 		'price' => $this->input->post('price'),
		 		'brandid' => $this->input->post('brands'),
		 		'quantity' => $this->input->post('quantity'),
		 		'categoryid' => $this->input->post('categories'), 
		 		];
         }
          	$this->ProductModel->updateData($data , $productid);
			redirect(base_url('index.php/product/list'));
		}else{
			$this->session->set_flashdata('fail_message', 'Update Product Fail!');
			$this->edit($productid);
		}
	}
	public function delete($productid)
	{
		$this->ProductModel->deleteData($productid);
		redirect(base_url('index.php/product/list'));
	}

}

/* End of file CategoriesController.php */
/* Location: ./application/controllers/CategoriesController.php */