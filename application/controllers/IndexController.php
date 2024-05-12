<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->data['categories'] = $this->IndexModel->getAllCategoriesHome();
		$this->data['brands'] = $this->IndexModel->getAllBrandsHome();
		$this->data['products'] = $this->IndexModel->getProductHome();
		$this->load->library('email');
	}

	public function index()
	{
		$this->load->view('sales/template/header' , $this->data);
		$this->load->view('sales/home' , $this->data);
		$this->load->view('sales/template/footer');
	
	}
	public function menu($menucha = 0)
	{
	    $this->load->model('CategoriesModel');
	    $data = $this->CategoriesModel->getCategories();
	    $menucon = array();
	    $html = ''; 

	    foreach ($data as $key => $value) {
	        if ($value->parent == $menucha) {
	            $menucon[] = $value;
	        }
	    }
	    if (!empty($menucon)) {
	        foreach ($menucon as $key => $value) {
	          $html .= "<li>
	          				<a href='" . base_url("index.php/danh-muc/".$value->slug) . "'>" . $value->title . "</a>
	          			</li>";
	          $html .= $this->menu($value->categoryid); 
	        }
	    }
	    return $html; 
	}
	public function categories($slug)
	{
	    $data['categories'] = $this->IndexModel->getAllCategoriesHome();
	    $data['slug'] = $this->IndexModel->getSlug($slug);
	    $id = $this->IndexModel->getCategoriesBySlug($slug);

	    $data['products'] = $this->IndexModel->getAllProductHomeByID($id);

	    if($data['products']){
	        $this->config->config['pageTitle'] = $data['products'][0]->tendanhmuc;
	    } else {
	        $this->config->config['pageTitle'] = "Đang cập nhật";
	    }

	    $this->load->view('sales/template/header');
	    $this->load->view('sales/category', $data);
	    $this->load->view('sales/template/footer');
	}
	public function changeFillter($slug)
	{
		sleep(1);
	    $html = ""; 
	    $id = $this->IndexModel->getCategoriesBySlug($slug);
	    $data['categories'] = $this->IndexModel->getAllCategoriesHome();
	    $data['slug'] = $this->IndexModel->getSlug($slug);
	    $data['products'] = [];
	    if(isset($_GET['gia']) && $_GET['gia'] == 'asc'){
	        $data['products'] = $this->IndexModel->getAllProductAsc($id , 'asc');
	    } else if(isset($_GET['gia']) && $_GET['gia'] == 'desc'){
	        $data['products'] = $this->IndexModel->getAllProductAsc($id , 'desc');
	    }else if(isset($_GET['brandid'])){
	    	$brandid =  $_GET['brandid'];
	    	$data['products'] = $this->IndexModel->getBrandByCtegories($id , $brandid);
	    }else if(isset($_GET['min_price'])){
	    	$min = $_GET['min_price'];
	    	$max = $_GET['max_price'];
	    	$data['products'] = $this->IndexModel->getPriceMinMax($id , $min , $max);
	    } else {
	        $data['products'] = $this->IndexModel->getAllProductHomeByID($id);
	    }
	    $html .= '<div class="row">';
	    if (!empty($data['products'])) {
	        foreach ($data['products'] as $key => $value) {
	            $html .= '<div class="col-lg-3 col-md-4 col-sm-6 col-6">';
	            $html .= '<div class="flash-item me-0">';
	            $html .= '<a href="'.base_url('index.php/san-pham/'.$value->slug).'">';
	            $html .= '<img loading="lazy" src="'.base_url('upload/product/'.$value->image).'" alt="Product Image" class="img-fluid">';
	            $html .= '</a>';
	            $html .= '<div class="flash-text">';
	            $html .= '<div class="sold-module d-flex w-100 position-relative text-left">';
	            $html .= '<img loading="lazy" src="//theme.hstatic.net/200000823693/1001172883/14/hot-sale.png?v=978" decoding="async" class="position-absolute" alt="Sắp Cháy hàng">';
	            $html .= '<div class="d-flex align-items-center justify-content-center sold position-absolute h-100 w-100">';
	            $html .= 'Sắp Cháy hàng';
	            $html .= '</div>';
	            $html .= '<div class="remain modal-open position-absolute h-100" style="width:82%"></div>';
	            $html .= '</div>';
	            $html .= '<p class="m-0 line_1">';
	            $html .= $value->title;
	            $html .= '</p>';
	            $html .= '<div class="price">';
	            $html .= '<span class="text-danger fw-bold">';
	            $html .= number_format($value->price) .'₫';
	            $html .= '</span>';
	            $html .= '</div>';
	            $html .= '<div class="d-flex align-items-center gap-2">';
	            $html .= '<i class="fa-regular fa-heart"></i>';
	            $html .= '<label for>Yêu thích</label>';
	            $html .= '</div>';
	            $html .= '</div>';
	            $html .= '<span class="label-sale position-absolute">';
	            $html .= 'Giảm 9%';
	            $html .= '</span>';
	            $html .= '<span class="label-tag d-flex align-items-center position-absolute">';
	            $html .= '<img loading="lazy" src="'.base_url("frontend/img/hot-sale.png").'" alt="Sale Icon" style="width: 22px;">';
	            $html .= 'Sale giữa tháng';
	            $html .= '</span>';
	            $html .= '<button type="button" class="cart border-0" data-productid="' . $value->productid . '" data-quantity="1">';
				$html .= '<i class="fa-solid fa-plus"></i>';
				$html .= '</button>';

	            $html .= '</div>';
	            $html .= '</div>';
	        }
	    } else {
	        $html .= '<div class="alert alert-warning mt-3 text-center" role="alert">';
	        $html .= 'Danh mục sản phẩm trống';
	        $html .= '</div>';
	    }
	    $html .= '</div>';
	    echo $html;
	}
	public function product($slug)
	{
		$id = $this->IndexModel->getProductIdBySlug($slug);
		$data['productsDetails'] = $this->IndexModel->getAllProductDetails($id);
		foreach ($data['productsDetails'] as $key => $value) {
		    $categoris = $value->categoryid;
		}
		$data['products_related'] = $this->IndexModel->getAllProducRelated($id , $categoris);
		$this->config->config['pageTitle'] = $data['productsDetails'][0]->title;

		if(empty($_SESSION['Viewed'])){
		    $_SESSION['Viewed'] = array();
		}
		$viewData = [
            	'view' => $data['productsDetails'][0]->view + 1
        ];
        $this->IndexModel->updateViewCount($id, $viewData);
		if(!array_key_exists($id,  $_SESSION['Viewed'])){
		    foreach ($data['productsDetails'] as $key => $value) {
		        $_SESSION['Viewed'][$id] = [
		            'id' => $value->productid,
		            'title' => $value->title,
		            'price' => $value->price,
		            'image' => $value->image,
		            'status' => $value->status,
		        ];
		    }
		}

		$this->load->view('sales/template/header');
		$this->load->view('sales/details', $data);
		$this->load->view('sales/template/footer');
	}
	public function cartEmty()
	{
		$this->load->view('sales/template/header');
		$this->load->view('sales/cart');
		$this->load->view('sales/template/footer');
	}
	public function cart()
	{
		$cart = $this->cart->contents();
		$cartCount = count($cart);
		if($cartCount == 0){
			$this->cartEmty();
		}else{
			$this->config->config['pageTitle'] = "Giỏ hàng - Mew Mobile";
		    $this->load->view('sales/template/header');
		    $this->load->view('sales/cart2');
		    $this->load->view('sales/template/footer');
		}		
	}
	public function addtocart()
	{
	    $response = [];
	    $productid = $this->input->post('productid');
	    $quantity = $this->input->post('quantity');
	    $products = $this->IndexModel->getAllProductDetails($productid);
	    $success = false;
	    $warning = false; 

	    foreach ($products as $key => $value) {
	        if ($value->quantity >= $quantity) {
	            $cart_data = array(
	                'id'      => $productid,
	                'qty'     => $quantity,
	                'price'   => $value->price,
	                'name'    => $value->title,
	                'options' => array('image' => $value->image, 'in_stock' => $value->quantity)
	            );
	            $this->cart->insert($cart_data);
	            $success = true;
	        } else {
	            $warning = true; 
	        }
	    }

	    if ($success) {
	        $response['success'] = "<h5>Thành công</h5><p class='m-0'>Thêm sản phẩm thành công</p>";
	    }

	    if ($warning) {
	        $response['warning'] = "<h5>Cảnh báo</h5><p class='m-0'>Đã tới giới hạn tồn kho</p>";
	    }

	    $response['cartCount'] = count($this->cart->contents());
	    echo json_encode($response);
	}

	public function addtocartCheckout()
	{
	    $productid = $this->input->post('productid');
	    $quantity = $this->input->post('quantity');
	    $products = $this->IndexModel->getAllProductDetails($productid);

	    foreach ($products as $key => $value) {
	        $cart_data = array(
	            'id'      => $productid,
	            'qty'     => $quantity,
	            'price'   => $value->price,
	            'name'    => $value->title,
	            'options' => array('image' => $value->image)
	        );
	        $this->cart->insert($cart_data);
	    }
	    redirect(base_url('index.php/checkout'),'refresh');
	}
	public function deleteCart()
	{
	    if(isset($_POST['rowid'])){
	        $rowid = $_POST['rowid']; 
	        $this->cart->remove($rowid);
	        $response = array();
	        $html = "";
	        $total_amount = 0;
	        $cart = $this->cart->contents();
			$cartCount = count($cart);
			if($this->cart->contents()){
		        foreach ($this->cart->contents() as $item) {
		        $html .= '<div class="p-4 border rounded-4 position-relative mt-2">';
		        $html .= '<div class="align-items-lg-center d-flex gap-3">';
		        $html .= '<div>';
		        $html .= '<img src="'.base_url('upload/product/'.$item['options']['image']).'" alt="Product Image" class="img-fluid" width="70px">';
		        $html .= '</div>';
		        $html .= '<div class="pl-2 pl-lg-3 w-100">';
		        $html .= '<p class="text-color fw-bold m-0">'.$item['name'].'</p>';
		        $html .= '<span>Đen</span>';
		        $html .= '<div class="d-flex justify-content-between w-100 mt-2">';
		        $html .= '<div class="d-flex">';
		        $html .= '<button class="position-relative px-3 py-1 rounded-5 border-0 minusCount" data-rowid="' . $item['rowid'] . '" data-qty="' . $item['qty'] . '">-</button>';
		        $html .= '<input id="inputCount" class="position-relative rounded-5 border-0 text-center" value="' . $item['qty'] . '" data-rowid="' . $item['rowid'] . '" style="max-width: 2rem; font-size: 13px;">';
		        $html .= '<button class="position-relative px-3 py-1 rounded-5 border-0 addCount" data-rowid="' . $item['rowid'] . '" data-qty="' . $item['qty'] . '">+</button>';
		        $html .= '</div>';
		        $html .= '<div>';
		        $html .= '<span class="fs-5 fw-bold text-color">'.number_format($item['subtotal'],0,',','.').'đ</span>';
		        $html .= '</div>';
		        $html .= '</div>';
		        $html .= '</div>';
		        $html .= '<a href="#" class="text-main d-flex align-items-center justify-content-center text-decoration-none position-absolute top-0 start-100 translate-middle bg-danger text-white border-0 delete-link" style="font-size: 13px; border-radius: 50%; width: 24px; height: 24px;" data-rowid="' . $item['rowid'] . '">X</a>';
		        $html .= '</div>';

		            $html .= '</div>';
		            $total_amount += $item['subtotal'];
		        }
			}else{
				$html .= '<span> Không có sản phẩm nào </span>';
			}
	        $response['html'] = $html;
	        $response['total_amount'] = $total_amount;

	        // Thêm HTML cho tổng tiền
	        $html_total = '<dl class="bg-light border my-3 p-2 p-lg-3 rounded-4">';
	        $html_total .= '<dt class="text-uppercase fw-bold">Tổng tiền</dt>';
	        $html_total .= '<dd class="fw-bold text-main fs-4">'.number_format($total_amount, 0, ',', '.').'đ</dd>';
	        $html_total .= '</dl>';
	        $response['html_total'] = $html_total;
	        $response['html_count'] = $cartCount;
	        echo json_encode($response);
	    }
	}
	public function deleteall()
	{
	    $response = array();
	    $html = "";
	    $total_amount = 0;
	    $this->cart->destroy();
	    if($this->cart->contents()){
				$html .='<div class="giohang">';
		        foreach ($this->cart->contents() as $item) {
		            $html .= '<div class="p-4 border rounded-4 position-relative mt-2">';
		            $html .= '<div class="align-items-lg-center d-flex gap-3">';
		            $html .= '<div>';
		            $html .= '<img src="'.base_url('upload/product/'.$item['options']['image']).'" alt class="img-fluid" width="70px">';
		            $html .= '</div>';
		            $html .= '<div class="pl-2 pl-lg-3 w-100">';
		            $html .= '<p class="text-color fw-bold m-0">'.$item['name'].'</p>';
		            $html .= '<span>Đen</span>';
		            $html .= '<div class="d-flex justify-content-between w-100 mt-2">';
		            $html .= '<div class="d-flex">';
		            $html .= '<button class="position-relative px-3 py-1 rounded-5 border-0">-</button>';
		            $html .= '<input class="position-relative rounded-5 border-0 text-center" value="'.$item['qty'].'" style="max-width: 2rem; font-size: 13px;"></input>';
		            $html .= '<button class="position-relative px-3 py-1 rounded-5 border-0">+</button>';
		            $html .= '</div>';
		            $html .= '<div>';
		            $html .= '<span class="fs-5 fw-bold text-color">'.number_format($item['subtotal'],0,',','.').'đ</span>';
		            $html .= '</div>';
		            $html .= '</div>';
		            $html .= '</div>';
		            $html .= '<button class="text-main d-flex align-items-center justify-content-center text-decoration-none position-absolute top-0 start-100 translate-middle bg-danger text-white border-0 delete-link" style="font-size: 13px; border-radius: 50%; width: 24px; height: 24px;" data-rowid="'.$item['rowid'].'">X</button>';
		            $html .= '</div>';
		            $total_amount += $item['subtotal'];
		        }
			}else{
				$html .= '<span> Không có sản phẩm nào </span>';
			}

	        $html_total = '<dl class="bg-light border my-3 p-2 p-lg-3 rounded-4">';
	        $html_total .= '<dt class="text-uppercase fw-bold">Tổng tiền</dt>';
	        $html_total .= '<dd class="fw-bold text-main fs-4">'.number_format($total_amount, 0, ',', '.').'đ</dd>';
	        $html_total .= '</dl>';

	        $response['html'] = $html;
	        $response['total_amount'] = $total_amount;
	        $response['html_total'] = $html_total;
	    	echo json_encode($response);
	}
	public function updateCart()
	{
	    $subtotal = 0;
	    $html = "";

	    $response = array();

	    if(isset($_POST['rowid']) && isset($_POST['qty'])){
	        $rowid = $_POST['rowid'];
	        $qty = $_POST['qty'];
	        $data = [
	            'rowid' => $rowid,
	            'qty' => $qty + 1
	        ];
	        $this->cart->update($data);
	        $response['qty'] =  $data['qty'];

	        $updated_item = $this->cart->get_item($rowid);

	        $total = $updated_item['price'] * $data['qty'];
	        $response['html'] = "<div class='total' data-rowid='" . $rowid . "'><span class='fs-5 fw-bold text-color'>" . number_format($total, 0, ',', '.') . "đ</span></div>";

	        foreach ($this->cart->contents() as $item) {
	            $subtotal += $item['price'] * $item['qty'];
	        }
	    } elseif(isset($_POST['qtyMinus'])){
	        $rowid = $_POST['rowid'];
	        $qtyMinus = $_POST['qtyMinus'];
	        if($qtyMinus > 1){
	            $data = [
	                'rowid' => $rowid,
	                'qty' => $qtyMinus - 1
	            ];
	            $this->cart->update($data);
	        }
	        $response['qty'] = $data['qty'];

	        $updated_item = $this->cart->get_item($rowid);

	        $total = $updated_item['price'] * $data['qty'];
	        $response['html'] = "<div class='total' data-rowid='" . $rowid . "'><span class='fs-5 fw-bold text-color'>" . number_format($total, 0, ',', '.') . "đ</span></div>";

	        foreach ($this->cart->contents() as $item) {
	            $subtotal += $item['price'] * $item['qty'];
	        }
	    }

	    $html_total = '<dl class="bg-light border my-3 p-2 p-lg-3 rounded-4">';
	    $html_total .= '<dt class="text-uppercase fw-bold">Tổng tiền</dt>';
	    $html_total .= '<dd class="fw-bold text-main fs-4">'.number_format($subtotal, 0, ',', '.').'đ</dd>';
	    $html_total .= '</dl>';

	    $response['total'] = $html_total;

	    echo json_encode($response); 
	}
	public function checkout()
	{
		unset($_SESSION['coupon']);
		$this->load->view('sales/checkout');
		if(isset($_SESSION['coupon'])){
					echo "<pre>";
				  	var_dump($_SESSION['coupon']);
				  	echo "</pre>";
		}
	}
	public function login()
	{
		$this->config->config['pageTitle'] = "Tài khoản - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/login');
	    $this->load->view('sales/template/footer');
	}
	public function register()
	{
		$this->config->config['pageTitle'] = "Tạo tài khoản - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/register');
	    $this->load->view('sales/template/footer');
	}
	public function forgotPassword()
	{	
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = [
			'email' => $email,
			'password' => md5($password)
		];
		$result = $this->IndexModel->updatePassword($email , $data);
		if($result){
			$this->session->set_flashdata('success_message', 'Thay đổi password thành công');
			redirect(base_url('index.php/login'));
		}
	}
	public function logincustomer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
		$this->form_validation->set_message('valid_email', '<span style="color:red ;font-size: 12px;">Trường %s phải là một địa chỉ email hợp lệ</span>');
		if($this->form_validation->run()){
			 $email = $this->input->post('email');
             $password = md5($this->input->post('password'));
             $result = $this->IndexModel->checkLoginCustomer($email , $password);
            if ($result) {
			    $session_array = [
			        'id' => $result[0]->customerid,
			        'username' => $result[0]->username,
			        'email' => $result[0]->email
			    ];
			    $this->session->set_userdata('LoggedInCustomer', $session_array);
			    if (isset($_SESSION['redirect_url'])) {
				    $this->session->set_flashdata('success_message', 'Hãy điền thông tin để thanh toán');
				    redirect($_SESSION['redirect_url']);
				}else{
					redirect(base_url('/'));
				}
             }else{
             	$this->session->set_flashdata('fail_message', 'Wrong Email or Password');
             	redirect(base_url('index.php/login'));
             }
		}else{

			$this->login();
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		redirect(base_url('/'));	
	}
	public function execPostRequest($url, $data)
	{
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	            'Content-Type: application/json',
	            'Content-Length: ' . strlen($data))
	    );
	    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	    //execute post
	    $result = curl_exec($ch);
	    //close connection
	    curl_close($ch);
	    return $result;
	}
	public function onlineCheckout()
	{
		$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

		$partnerCode = 'MOMOBKUN20180529';
		$accessKey = 'klm05TvNBzhg7h7j';
		$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

		$orderInfo = "Thanh toán qua MoMo";
		$amount = "10000";
		$orderId = rand(00,9999);
		$redirectUrl = "http://localhost/projectsale/index.php/thanks";
		$ipnUrl = "http://localhost/projectsale/index.php/thanks";
		$extraData = "";

		if(isset($_POST['payUrl'])){
			if (!empty($_POST)) {
					    $partnerCode = $partnerCode;
					    $accessKey = $accessKey ;
					    $serectkey = $secretKey;
					    $orderId = $orderId; // Mã đơn hàng
					    $orderInfo =  $orderInfo;
					    $amount = $amount;
					    $ipnUrl = $ipnUrl;
					    $redirectUrl = $redirectUrl;
					    $extraData = $extraData;

					    $requestId = time() . "";
					    $requestType = "payWithATM";
					    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
					    //before sign HMAC SHA256 signature
					    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
					    $signature = hash_hmac("sha256", $rawHash, $serectkey);
					    $data = array('partnerCode' => $partnerCode,
					        'partnerName' => "Test",
					        "storeId" => "MomoTestStore",
					        'requestId' => $requestId,
					        'amount' => $amount,
					        'orderId' => $orderId,
					        'orderInfo' => $orderInfo,
					        'redirectUrl' => $redirectUrl,
					        'ipnUrl' => $ipnUrl,
					        'lang' => 'vi',
					        'extraData' => $extraData,
					        'requestType' => $requestType,
					        'signature' => $signature);
					    $result = $this->execPostRequest($endpoint, json_encode($data));
					    $jsonResult = json_decode($result, true);  // decode json
					    header('Location: ' . $jsonResult['payUrl']);
			}
		}
	}
	public function confirmcheckout()
	{
	    if (isset($_POST['cod'])) {
	        if (!isset($_SESSION['LoggedInCustomer'])) {
	            $_SESSION['redirect_url'] = base_url('index.php/checkout');
	            $this->session->set_flashdata('fail_message', 'Bạn cần đăng nhập để thanh toán đơn hàng!');
	            redirect(base_url('index.php/login'));
	        }
	        unset($_SESSION['redirect_url']);

	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('address', 'Address', 'trim|required');
	        $this->form_validation->set_rules('name', 'Username', 'trim|required');
	        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
	        $this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
	        $this->form_validation->set_message('valid_email', '<span style="color:red ;font-size: 12px;">Trường %s phải là một địa chỉ email hợp lệ</span>');
	        $this->form_validation->set_message('regex_match', '<span style="color:red ;font-size: 12px;">Vui lòng nhập Mobile hợp lệ</span>');

	        if ($this->form_validation->run()) {
	            $data = [
	                'name' => $this->input->post('name'),
	                'email' => $this->input->post('email'),
	                'mobile' => $this->input->post('mobile'),
	                'address' => $this->input->post('address'),
	                'method' => 'Thanh toán trực tiếp'
	            ];
	            $result = $this->IndexModel->shippingAddData($data);

	            $userId = null;
	            if (isset($_SESSION['LoggedInCustomer'])) {
	                $userId = $_SESSION['LoggedInCustomer']['id'];
	            }

	            if ($result) {
	                $total = 0;
	                foreach ($this->cart->contents() as $value) {
	                    $total += $value['subtotal'];
	                }

	                if (isset($_SESSION['coupon'])) {
	                    $total = $_SESSION['coupon'];
	                }

	                $order_code = uniqid();
	                $orderDate = date('Y-m-d H:i:s');
	                $order_data = [
	                    'order_code' => $order_code,
	                    'ship_id' => $result,
	                    'status' => 1,
	                    'userId' => $userId,
	                    'totalPrice' => $total,
	                    'orderdate' => $orderDate
	                ];
	                $insert_order = $this->IndexModel->insertOrder($order_data);

	                unset($_SESSION['coupon']);

	                foreach ($this->cart->contents() as $key => $value) {
	                    $data_orderdetails = [
	                        'order_code' => $order_code,
	                        'productid' => $value['id'],
	                        'quantity' => $value['qty'],
	                    ];
	                    $insert_orderdetails = $this->IndexModel->insertOrderDetails($data_orderdetails);
	                }

	                $this->session->set_flashdata('success_message', 'Đặt hàng thành công chúng tôi sẽ liên hệ trong thời gian sớm nhất!');
	                $this->cart->destroy();

	                // Send email
	                $to_email = $this->input->post('email');
	                $title = "Đặt hàng tại Mew Mobile thành công!";
	                $message = "Cám ơn bạn đã mua hàng! Xin chào " . $this->input->post('name') . ", Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được gửi đi.";
	                $this->sendemail($to_email, $title, $message);
	                redirect(base_url("index.php/thanks"));
	            } else {
	                $this->session->set_flashdata('fail_message', 'Xác nhận thanh toán thất bại!');
	                redirect(base_url('index.php/checkout'));
	            }
	        } else {
	            $this->checkout();
	        }
	    } elseif (isset($_POST['payUrl'])) {
	        if (!isset($_SESSION['LoggedInCustomer'])) {
	            $_SESSION['redirect_url'] = base_url('index.php/checkout');
	            $this->session->set_flashdata('fail_message', 'Bạn cần đăng nhập để thanh toán đơn hàng!');
	            redirect(base_url('index.php/login'));
	        }
	        unset($_SESSION['redirect_url']);

	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	        $this->form_validation->set_rules('address', 'Address', 'trim|required');
	        $this->form_validation->set_rules('name', 'Username', 'trim|required');
	        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
	        $this->form_validation->set_message('required', '<span style="color:red; font-size: 12px">Trường %s không được để trống</span>');
	        $this->form_validation->set_message('valid_email', '<span style="color:red ;font-size: 12px;">Trường %s phải là một địa chỉ email hợp lệ</span>');
	        $this->form_validation->set_message('regex_match', '<span style="color:red ;font-size: 12px;">Vui lòng nhập Mobile hợp lệ</span>');

	        if ($this->form_validation->run()) {
	            $data = [
	                'name' => $this->input->post('name'),
	                'email' => $this->input->post('email'),
	                'mobile' => $this->input->post('mobile'),
	                'address' => $this->input->post('address'),
	                'method' => "Thanh toán qua MOMO"
	            ];
	            $result = $this->IndexModel->shippingAddData($data);

	            $userId = null;
	            if (isset($_SESSION['LoggedInCustomer'])) {
	                $userId = $_SESSION['LoggedInCustomer']['id'];
	            }

	            if ($result) {
	                $total = 0;
	                foreach ($this->cart->contents() as $value) {
	                    $total += $value['subtotal'];
	                }

	                if (isset($_SESSION['coupon'])) {
	                    $total = $_SESSION['coupon'];
	                }

	                $order_code = uniqid();
	               	$orderDate = date('Y-m-d H:i:s');
	                $order_data = [
	                    'order_code' => $order_code,
	                    'ship_id' => $result,
	                    'status' => 1,
	                    'userId' => $userId,
	                    'totalPrice' => $total,
	                    'orderdate' => $orderDate
	                ];
	                $insert_order = $this->IndexModel->insertOrder($order_data);

	                unset($_SESSION['coupon']);

	                foreach ($this->cart->contents() as $key => $value) {
	                    $data_orderdetails = [
	                        'order_code' => $order_code,
	                        'productid' => $value['id'],
	                        'quantity' => $value['qty'],
	                    ];
	                    $insert_orderdetails = $this->IndexModel->insertOrderDetails($data_orderdetails);
	                }

	                $this->session->set_flashdata('success_message', 'Đặt hàng thành công chúng tôi sẽ liên hệ trong thời gian sớm nhất!');
	                $this->cart->destroy();

	                // Send email
	                $to_email = $this->input->post('email');
	                $title = "Đặt hàng tại Mew Mobile thành công!";
	                $message = "Cám ơn bạn đã mua hàng! Xin chào " . $this->input->post('name') . ", Chúng tôi đã nhận được đặt hàng của bạn và đã sẵn sàng để vận chuyển. Chúng tôi sẽ thông báo cho bạn khi đơn hàng được gửi đi.";

	                $this->sendemail($to_email, $title, $message);

	                // MoMo Payment
	                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
	                $partnerCode = 'MOMOBKUN20180529';
	                $accessKey = 'klm05TvNBzhg7h7j';
	                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

	                $orderInfo = "Thanh toán qua MoMo";
	                $amount = $total;
	                $orderId = $order_code;
	                $redirectUrl = base_url('index.php/thanks');
	                $ipnUrl = base_url('index.php/thanks');
	                $extraData = "";

	                $requestId = time() . "";
	                $requestType = "payWithATM";

	                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
	                $signature = hash_hmac("sha256", $rawHash, $secretKey);

	                $data = [
	                    'partnerCode' => $partnerCode,
	                    'partnerName' => "Test",
	                    "storeId" => "MomoTestStore",
	                    'requestId' => $requestId,
	                    'amount' => $amount,
	                    'orderId' => $orderId,
	                    'orderInfo' => $orderInfo,
	                    'redirectUrl' => $redirectUrl,
	                    'ipnUrl' => $ipnUrl,
	                    'lang' => 'vi',
	                    'extraData' => $extraData,
	                    'requestType' => $requestType,
	                    'signature' => $signature
	                ];

	                $result = $this->execPostRequest($endpoint, json_encode($data));
	                $jsonResult = json_decode($result, true);
	                header('Location: ' . $jsonResult['payUrl']);
	            } else {
	                $this->session->set_flashdata('fail_message', 'Xác nhận thanh toán thất bại!');
	                redirect(base_url('index.php/checkout'));
	            }

	        } else {
	            $this->checkout();
	        }
	        // $dataUpdate = ['status' => 5];
			// $this->IndexModel->updateOrdersCheckout($order_code , $dataUpdate);
	    }
	}

	public function checksale()
	{
	    $response = array();
	    if (isset($_GET["inputSale"])) {
	        $inputSale = $_GET["inputSale"]; 
	        $validSales = array("Mew2023", "Mew2024", "Mew2025");

	        if (in_array($inputSale, $validSales)) {
	            $response['valid'] = 'Mã hợp lệ';
	        } else {
	            $response['invalid'] = 'Mã không hợp lệ';
	        }

	        $subtotal = 0;
	        foreach ($this->cart->contents() as $item) {
	            $subtotal += $item['subtotal'];
	        }

	        switch ($inputSale) {
	            case "Mew2023":
	                $discount = 500000;  
	                break;
	            case "Mew2024":
	                $discount = 200000;
	                break;
	            case "Mew2025":
	                $discount = 100000;
	                break;
	            default:
	                $discount = 0;
	        }
	        $subtotal -= $discount;
	        $_SESSION['coupon'] = $subtotal;
	        $response['subtotal'] = $subtotal;
	    }
	    echo json_encode($response);
	}

	public function thanks()
	{
		$this->load->view('sales/template/header');
	    $this->load->view('sales/thanks');
	    $this->load->view('sales/template/footer');
	}
	public function timkiem()
	{
		if(isset($_GET['keyword']) && $_GET['keyword'] != ""){
			$keyword =($_GET['keyword']);
		}
		$this->config->config['pageTitle'] = "Tìm kiếm sản phẩm - Mew Mobile";
		$data['products'] = $this->IndexModel->getAllProductByKeyword($keyword);
		$this->load->view('sales/template/header');
	    $this->load->view('sales/Search' , $data);
	    $this->load->view('sales/template/footer');
	}
	public function sendemail($to_email , $title , $message)
	{
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = "despacitovv@gmail.com";
		$config['smtp_pass'] = "pxqi lrxt axpr gcxo";
		$config['smtp_port'] = 465;
		$config['charset'] = "utf-8";
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('despacitovv@gmail.com', 'Đặt hàng thành công');
		$this->email->to($to_email);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject($title);
		$this->email->message($message);

		$this->email->send();
	}
	public function technology()
	{
		$this->config->config['pageTitle'] = "Công nghệ - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/technology');
	    $this->load->view('sales/template/footer');
	}
	public function event()
	{
		$this->config->config['pageTitle'] = "Sự kiện - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/event');
	    $this->load->view('sales/template/footer');
	}
	public function branchsystem()
	{
		$this->config->config['pageTitle'] = "Hệ thống chi nhánh - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/branchsystem');
	    $this->load->view('sales/template/footer');
	}
	public function account()
	{
		$this->load->model('OrderModel');
		$data = [];
		if(isset($_SESSION['LoggedInCustomer'])){
			$id = $_SESSION['LoggedInCustomer']['id'];
			$data['user'] = $this->OrderModel->getUser($id);
			$data['ordersHistory'] = $this->OrderModel->getHistoryOrders($id); 
		}
		$this->config->config['pageTitle'] = "Tài khoản - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/account' ,$data);
	    $this->load->view('sales/template/footer');
	}
	public function historyDetails($ordercode)
	{
		$this->load->model('OrderModel');
		$data = [];
		if(isset($_SESSION['LoggedInCustomer'])){
			$id = $_SESSION['LoggedInCustomer']['id'];
			$data['user'] = $this->OrderModel->getUser($id);
			$data['ordersHistory'] = $this->OrderModel->getHistoryOrders($id);
			$data['historyDetails'] = $this->OrderModel->getOrdersById($ordercode);
			$data['orders'] =  $this->OrderModel->historyDetails($ordercode);
		}
		$this->config->config['pageTitle'] = "Chi tiết đơn hàng - Mew Mobile";
		$this->load->view('sales/template/header');
	    $this->load->view('sales/historyDetails' , $data);
	    $this->load->view('sales/template/footer');
	}
}

