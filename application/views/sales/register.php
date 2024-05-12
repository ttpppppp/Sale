  <div class="login-nav-top">
            <div class="container">
                <ul class="mt-5 mt-lg-0 pt-3 pt-lg-0">
                    <li>
                        <a href="<?php echo base_url('/'); ?>">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?php echo base_url('index.php/register'); ?>">Đăng kí</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="form-both">
           <div class="container bg-white p-4 rounded-2">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Đăng kí tài khoản</h3>
                    <div class="login">
                        <form action="">
                            <div class="login-form-control">
                                <div class="d-flex gap-4">
                                    <input type="text" class="rounded-2 mb-2" placeholder="Nhập Tên">
                                    <input type="text" class="rounded-2 mb-2" placeholder="Nhập Họ">
                                </div>
                                <input type="text" class="rounded-2 mb-2" placeholder="Nhập Số Điện Thoại">
                                <input type="text" class="rounded-2 mb-2" placeholder="Nhập email">
                                <input type="text" class="rounded-2 mb-2" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <a href = "" class="btn btn-danger d-block">Tạo tài khoản</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 mt-lg-0">
                    <h3>Đăng nhập</h3>
                    <p class="p-3 border border-dark rounded-3">Bạn đã có tài khoản, vui lòng ấn đăng nhập tại link bên dưới của chúng tôi. Hoặc các nút đăng nhập isocial.</p>
                    <a  href="<?php echo base_url('index.php/login'); ?>"  class="btn btn-danger d-block">Đăng nhập ngay</a>
                </div>
            </div>
           </div>
        </div>