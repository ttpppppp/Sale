<!doctype html>
<html lang="en">
    <head>
        <title>Mew Mobile - Thanh toán đơn hàng</title>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="<?php echo base_url('frontend/style.css') . '?v=' . filemtime('frontend/style.css'); ?>">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
        <link rel="shortcut icon"
            href="https://file.hstatic.net/200000823693/file/favicon_57c734b04e1e4e918b68e996bf90399c.png"
            type="image/x-icon">
        <link rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
            integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <main>
            <div class="container">
                <div class="row border-top flex-column-reverse flex-lg-row min-vh-100">
                    <div class="col-lg-6 col-12 p-5 border-end">
                        <div class="main-header">
                            <a href="<?php echo base_url('/') ?>" class="logo text-decoration-none">
                                <h1>Mew Mobile</h1>
                            </a>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="cart.html" class="text-decoration-none">Giỏ hàng</a>
                                </li>

                                <li class="breadcrumb-item breadcrumb-item-current">
                                    Thông tin giao hàng
                                </li>
                                <li class="breadcrumb-item ">
                                    Phương thức thanh toán
                                </li>
                            </ul>
                           <?php if(isset($_SESSION['LoggedInCustomer'])) { ?>
                                <p class="section-content-text">
                                    <?php echo $_SESSION['LoggedInCustomer']['username']." " .'('.$_SESSION['LoggedInCustomer']['email'].')' ?>
                                    <a href="<?php echo base_url('index.php/logout') ?>" class="text-decoration-none">Đăng xuất</a>
                                </p>
                            <?php } else { ?>
                                <p class="section-content-text">
                                    Bạn đã có tài khoản?
                                    <a href="<?php echo base_url('index.php/login') ?>" class="text-decoration-none">Đăng nhập</a>
                                </p>
                            <?php } ?>

                            <h5 class="section-title">Thông tin giao hàng</h2>
                        </div>
                        <div class="main-content">
                             <?php 
                                  if ($this->session->flashdata('success_message')) {
                                    echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                                  }else if($this->session->flashdata('fail_message')){
                                    echo '<div class="alert alert-danger">'.$this->session->flashdata('fail_message').'</div>';
                                  }
                            ?>
                            <form action="<?php echo base_url('index.php/confirmcheckout') ?>" method="post" onsubmit="return confirm('Xác nhận thanh toán!');">
                                <div class="mb-3">
                                  <input type="text" class="form-control p-2" id="" aria-describedby="emailHelp" placeholder="Họ và tên" name="name" value="<?php echo set_value('name');?>">
                                    <?php echo form_error('name'); ?>
                                </div>
                                <div class="mb-3 d-flex gap-2">
                                 <div class="w-50">
                                    <input type="email" class="form-control p-2" id="" 
                                    placeholder="Email" name="email" value="<?php echo set_value('email');?>">
                                    <?php echo form_error('email'); ?>
                                 </div>
                                  <div class="w-50">
                                      <input type="text" class="form-control p-2" id="" placeholder="Số Điện Thoại" name="mobile" value="<?php echo set_value('mobile');?>">
                                      <?php echo form_error('mobile'); ?>
                                  </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control p-2" id="" aria-describedby="emailHelp" placeholder="Địa Chỉ" name="address" value="<?php echo set_value('address');?>">
                                      <?php echo form_error('address'); ?>
                                  </div>
                                <select class="form-select p-2" aria-label="Default select example" name="shipping_method" required>
                                        <option disabled selected>Phương thức thanh toán</option>
                                        <option value="momo">MOMO</option>
                                        <option value="vnpay">VNPAY</option>
                                        <option value="cod">COD</option>
                                </select> 
                                 <div class="d-flex align-items-center justify-content-between mt-3">
                                    <a href="<?php echo base_url('index.php/gio-hang'); ?>" class="text-decoration-none">Giỏ hàng</a>
                              </div>
                              <p class="m-0 fw-bold text-color d-flex align-items-center gap-3">
                                <img src="https://hstatic.net/0/0/global/design/seller/image/payment/other.svg?v=6" alt="">
                                Thanh toán qua ngân hàng
                                </p>
                              <div class="d-flex gap-2">
                                <!-- <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" alt="" width="40px"> -->
                                <button type="submit" name="payUrl" class="p-lg-2 momo">
                                        <span class="btn-content text-white" style="font-size: 13px;">Thanh toán qua MOMO</span>
                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                                 <button type="button" name="vnpay" class="p-lg-2 vnpay">
                                        <span class="btn-content text-white" style="font-size: 13px;">Thanh toán qua VNPAY</span>
                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                              </div>
                               <p class="m-0 fw-bold text-color d-flex align-items-center gap-3 mt-3">
                                Thanh toán trực tiếp khi nhận hàng
                                </p>
                              <div class="">
                                   <button type="submit" name="cod" class="p-lg-2 cod mt-2">
                                        <span class="btn-content text-white" style="font-size: 13px;">Thanh toán qua COD</span>
                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                              </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 p-5">
                        <table border="1" cellpadding="1" cellspacing="1" class="table border-bottom" id="myTable">
                            <tbody>
                         <?php 
                            $total = 0;
                            $subtotal = 0;
                        ?>
                        <?php if($this->cart->contents()){?>
                            <?php foreach ($this->cart->contents() as $value):?>
                                <?php 
                                    $total = $value['price']* $value['qty'];
                                    $subtotal += $total;
                                ?>
                             <tr class="">
                                <td>
                                    <div style="position: relative;">
                                        <img src="<?php echo base_url('upload/product/'.$value['options']['image']); ?>" width="75px" alt="" class="border rounded-3">
                                        <div class="count-checkout position-absolute d-flex align-items-center justify-content-center text-white" style="background-color: rgba(153, 153, 153, 0.9); width: 22px; height: 22px; border-radius: 50%; top: -10px; left: 0; font-size: 12px;"> 
                                            <?php echo $value['qty'] ?>
                                        </div>
                                    </div>
                                </td>             
                                <td class="text-color">
                                    <?php echo $value['name'] ?>
                                    <p class="text-color">Hồng</p>
                                </td>
                                <td>
                                    <?php echo number_format($total ,0,',','.').'₫' ?>
                                </td>
                            </tr>



                            <?php endforeach; ?>
                        <?php }else{
                            echo "Không có sản phẩm nào!";
                        }?>
                            </tbody>
                        </table>
                        <div class="mb-3 d-flex gap-2 border-top py-3 border-bottom ">
                            <input type="text" class="form-control w-50 p-2" id="inputSale" placeholder="Nhập mã giảm giá">
                            <button type="button" class="btn" id="btnSaleCheck">Sử dụng</button>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span>Tạm Tính</span>
                            <span><?php echo number_format($subtotal,0,',','.') .'₫'; ?></span>
                        </div>
                        <div class="d-flex justify-content-between pb-2 border-bottom">
                           <span>Phí vận chuyển</span>
                           <span>—</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span>Tổng cộng</span>
                           <div class="totalCheckout">
                                <span class="totalcheck">
                                    <?php echo "VND" .' '. number_format($subtotal,0,',','.') .'₫'; ?>
                                </span>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
             src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
             crossorigin="anonymous">
         </script>
         <script>
             function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

                    let inputSale = document.getElementById("inputSale");
                    let btnSaleCheck = document.getElementById("btnSaleCheck");
                    inputSale.addEventListener("input", function(e) {
                        if(inputSale.value !== '') {
                            btnSaleCheck.classList.add('backgroundSale');
                             $(document).on("click", "#btnSaleCheck", function(e) {
                                var inputSale = $('#inputSale').val();
                                $.ajax({
                                    url: "http://localhost/projectsale/index.php/checksale",
                                    type: "GET",
                                    dataType: "json",
                                    data: {
                                        inputSale: inputSale,
                                    },
                                    success: function(response) {
                                        if(response.invalid){
                                            alert("Mã không hợp lệ!");
                                        }
                                        var formattedSubtotal = "<span class='totalcheck'> VND " + numberWithCommas(response.subtotal.toString()) +"₫</span>";
                                        $(".totalCheckout").html(formattedSubtotal);
                                       
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(error);
                                    }
                                });
                            });
                        } else {
                            btnSaleCheck.classList.remove('backgroundSale');
                        }
                    });
         </script>
        </body>
</html>
