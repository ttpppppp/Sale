<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'third_party/php-graph-sdk-5.x/src/Facebook/autoload.php');

use Facebook\Facebook;

class LoginFacebookController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('sales/facebookview');
    }
    public function private()
    {
        $this->load->view('sales/private');
    }
    public function deletefblink()
    {
         $this->load->view('sales/deleteFacebook');
    }
    public function deletefb()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];

            // Thực hiện xóa dữ liệu từ cơ sở dữ liệu dựa trên email
            // Ví dụ: Xóa dữ liệu từ bảng 'users'
            // $sql = "DELETE FROM users WHERE email = ?";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("s", $email);
            // $stmt->execute();

            // Hiển thị thông báo xác nhận
            echo "Dữ liệu của bạn đã được xóa thành công.";
        }
    }

    public function login() {
        $fb = new Facebook([
            'app_id' => '1967405800322964',
            'app_secret' => 'be950e0deb4c31c4094730ba692313ee',
            'default_graph_version' => 'v3.2',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        
        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exception\ResponseException $e) {
            // Xử lý lỗi
        } catch(Facebook\Exception\SDKException $e) {
            // Xử lý lỗi
        }
        
        if (isset($accessToken)) {
            $response = $fb->get('/me?fields=id,name,email', $accessToken);
            $userNode = $response->getGraphUser();
            // Lưu thông tin người dùng vào session hoặc cơ sở dữ liệu
            // Ví dụ: $this->session->set_userdata('user', $userNode);
            // Hoặc $this->user_model->saveUser($userNode);
            redirect('dashboard'); // Điều hướng sau khi đăng nhập thành công
        } else {
            $loginUrl = $helper->getLoginUrl('URL_CALLBACK', ['email']);
            redirect($loginUrl);
        }
    }
}
