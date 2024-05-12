<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SliderController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SliderModel');
	}

	public function index()
	{
		
	}
	public function slideradd()
	{
		$this->load->view('pages/admin_template/_header');
		$this->load->view('Slider/SliderAddView');
		$this->load->view('pages/admin_template/_footer');
	}
	public function sliderstore()
	{
		$this->config->config['adminTitle'] = "Thêm Slider - Mew Mobile";
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('buttonlink', 'Description', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		if ($this->form_validation->run() == TRUE) {
		    $ori_filename = $_FILES['image']['name'];
		    $new_name = time() . "-" . $ori_filename;
		    $new_name = str_replace(' ', '_', $new_name);

		    $config = [
		        'upload_path' => './upload/slider',
		        'allowed_types' => 'jpg|jpeg|png|gif|webp',
		        'file_name' => $new_name,
		    ];
		    $this->load->library('upload', $config);

		    if (!$this->upload->do_upload('image')) {
		        $error = array('error' => $this->upload->display_errors());
		        $this->session->set_flashdata('fail_message', 'Add Brand Fail!');
		        $this->load->view('pages/admin_template/_header');
		        $this->load->view('Slider/SliderAddView', $error);
		        $this->load->view('pages/admin_template/_footer');
		        redirect(base_url('index.php/slider/add/'));
		    } else {
		        $slider_filename = $this->upload->data('file_name');
		        $title = $this->input->post('title');
		        $description = $this->input->post('description');
		        $buttonlink = $this->input->post('buttonlink');
		        $image_url = base_url() . 'upload/slider/' . $slider_filename;

		        $data = $this->SliderModel->getData();
		        $data = json_decode($data , true);
		        $data = array();

		        $dataSliders = [
		            'title' => $title,
		            'description' => $description,
		            'buttonlink' => $buttonlink,
		            'image' => $image_url 
		        ];
		        array_push($data, $dataSliders);
		        $data = json_encode($data);
		        $this->SliderModel->updateslider($data);
		        
		    }
		}else {
		    $this->session->set_flashdata('fail_message', 'Add Slider Fail!');
		    $this->slideradd();
		}

	}

}

/* End of file SliderController.php */
/* Location: ./application/controllers/SliderController.php */