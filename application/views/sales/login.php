 <div class="login-nav-top mt-5 mt-lg-0">
            <div class="container">
                <ul class="mt-3 mt-lg-0">
                    <li>
                        <a href="<?php echo base_url('/'); ?>">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?php echo base_url('index.php/login'); ?>">Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="form-both">
           <div class="container bg-white p-4 rounded-2">
            <div class="row">
                <div class="col-lg-8 col-12 mb-3">
                    <div class="login">
                         <?php 
                              if ($this->session->flashdata('success_message')) {
                                echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                              }else if($this->session->flashdata('fail_message')){
                                echo '<div class="alert alert-danger">'.$this->session->flashdata('fail_message').'</div>';
                              }
                        ?>
                       <div class="" id="forgotPasswordContainer">
                            <h3>Đăng nhập</h3>
                            <form action="<?php echo base_url('index.php/login-customer'); ?>" method="post">
                                <div class="login-form-control">
                                    <div class="form-group">
                                        <input type="text" class="rounded-2 mb-2 form-control" placeholder="Nhập email" name="email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="rounded-2 form-control" placeholder="Nhập mật khẩu" name="password">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <button type="submit" class="btn-login btn btn-danger">Đăng nhập</button>
                                    <a href="" class="text-decoration-none text-color fw-bold" id="forgotPasswordLink">Quên mật khẩu</a>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <h3>Đăng ký</h3>
                    <p class="p-3 border border-dark rounded-3">Tạo tài khoản để quản lý đơn hàng, và các thông tin thanh toán, gửi hàng một cách đơn giản hơn.</p>
                    <a href = "<?php echo base_url('index.php/register'); ?>" class="btn btn-danger d-block">Tạo tài khoản</a>
                </div>
            </div>
           </div>
        </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var forgotPasswordLink = document.getElementById('forgotPasswordLink');
        var forgotPasswordContainer = document.getElementById('forgotPasswordContainer');

        forgotPasswordLink.addEventListener('click', function(event) {
            event.preventDefault();
            var forgotPasswordForm = `
                <form action="http://localhost/projectsale/index.php/forgot-password" method="post">
                    <div id="recover_password" class="">
                                <h3 class="fw-bold mb-3 text-center">Đặt lại mật khẩu</h3>                     
                                <p class="line_cus  text-center">Chúng tôi sẽ gửi cho bạn một email để kích hoạt việc đặt lại mật khẩu.</p>
                                <div class="form-error mb-4 text-danger">
                                  
                                </div>
                                <div class="form-group">
                                  <label for="customer_email1" class="col-form-label d-none">Mail<span class="text-danger">*</span></label>
                                  <input type="email" class=" form-control" placeholder="Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="customer_email1" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control mt-2" placeholder="Nhật mật khẩu mới" required="">
                                    <input type="password" name="re-password" class="form-control mt-2" placeholder="Nhật lại mật khẩu mới" required="">
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center mt-3">
                                  <button type="submit" class="btn btn-danger w-50 rounded-3 fw-bold" title="Gửi">Gửi</button>
                                  <a href="" class=" fw-bold text-decoration-none text-color cancel-link">Hủy</a>
                                </div>
                            </div>
                </form>
            `;
            forgotPasswordContainer.innerHTML = forgotPasswordForm;
        });
        var cancelLink = document.querySelector('.cancel-link');
        cancelLink.addEventListener('click', function(event) {
            event.preventDefault();
            history.back();
        });
    });
</script>

