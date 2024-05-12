<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorsController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function show_404() {
        $this->config->config['pageTitle'] = "404 - Mew Mobile";
        $this->output->set_status_header('404');
        $this->load->view('sales/template/header');
        $this->load->view('sales/error');
        $this->load->view('sales/template/footer');
    }
}
