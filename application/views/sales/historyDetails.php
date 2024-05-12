<div class="login-nav-top mt-5 mt-lg-0">
    <div class="container">
        <ul class="mt-3 mt-lg-0">
            <li>
                <a href="<?= base_url('/'); ?>">Trang chủ</a>
            </li>
            <li>
                <i class="fa-solid fa-chevron-right"></i>
                <a href="<?= base_url('index.php/account'); ?>">Tài khoản</a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-6">
                   <a href="<?php echo base_url("index.php/account") ?>" class= "text-decoration-none text-color">
                        <div class="history d-flex flex-column align-items-center justify-content-center p-3 bg-white p-2 w-100 rounded-3 gap-2">
                        <div class="position-relative">
                            <img src="https://theme.hstatic.net/200000823693/1001172883/14/checklist.png?v=978" alt="" width="23px">
                            <span class="countOrders"><?= count($ordersHistory) ?></span>   
                        </div>
                        <p class="m-0">Lịch sử đơn hàng</p>
                    </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="<?php echo base_url("index.php/account") ?>" class= "text-decoration-none text-color">
                        <div class="user w-100 bg-white d-flex flex-column align-items-center justify-content-center p-3 rounded-3 gap-2">
                        <img src="https://theme.hstatic.net/200000823693/1001172883/14/account.png?v=978" alt="" width="23px">
                        <p class="name m-0">Hello, <span class=" text-main fw-bold"><?= $user->username ?></span></p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-12 bg-white p-3 mt-2 rounded-3">
                <p class="text-main fw-bold fs-5">Thông tin cá nhân</p>
                <div class="info">
                    <p class="mb-1"><b>Họ và tên:</b> <?= $user->username ?></p>
                    <p class="mb-1"><b>Email:</b> <?= $user->email ?></p>
                    <p class="mb-1"><b>Mobile:</b> <?= $user->mobile ?></p>
                    <p class="mb-1"><b>Address:</b> <?= $user->customeraddress ?></p>
                </div>
            </div>
            <div class="col-12 bg-white p-3 mt-2 rounded-3">
                <p class="text-main fw-bold fs-5">Chi tiết đơn hàng #<?php echo $orders->madonhang?></p>
                <div class="border-bottom pb-3">
                    <p>Ngày tạo: <?php echo $orders->orderdate ?></p>
                    <?php if ($orders->trangthaidon == 1): ?>
                         <span class="text-primary">Đang chờ xử lý</span>
                        <?php elseif ($orders->trangthaidon == 2): ?>
                        <span class="text-success">Đã xử lý - Đang giao hàng</span>
                        <?php elseif ($orders->trangthaidon == 3): ?>
                         <span class="text-danger">Đã hủy đơn hàng</span>
                        <?php elseif ($orders->trangthaidon == 4): ?>
                         <span class="text-danger">Chưa thanh toán</span>
                        <?php elseif ($orders->trangthaidon == 5): ?>
                        <span class="text-success">Đã thanh toán - chờ giao hàng</span>
                   <?php endif; ?>
                </div>
                <div class="py-3 border-bottom">
                     <p class="text-main fw-bold fs-5">Thông tin giao hàng</p>
                     <div class="row">
                         <div class="col-6">
                             <span>Tên người nhận: <?php echo $orders->name ?></span>
                         </div>
                         <div class="col-6">
                             <span class="m-0">Số điện thoại: </span>
                             <span><?php echo $orders->mobile ?></span>
                         </div>
                     </div>
                </div>
                <div class="border-bottom py-3">
                    <p class="m-0">Địa chỉ giao hàng :</p>
                    <span><?php echo $orders->address ?></span>
                </div>
                 <div class="border-bottom py-3">
                    <p class="m-0">Phương thưc thanh toán</p>
                    <span class="text-success fw-bold"><?php echo $orders->method ?></span>
                </div>
                <div class="border-bottom py-3">
                    <p class="m-0 fw-bold">Danh sách sản phẩm</p>
                        <div class="orders">
                            <?php $total = 0 ?>
                            <?php foreach ($historyDetails as $value):?>
                                <?php 
                                    $subtotal = $value->qty * $value->price;
                                    $total += $subtotal;
                                ?>
                                <div class="row align-items-center mt-2 border p-3 rounded-3">
                                    <div class="col-3 col-md-1 fw-bold pl-1 pr-1 qty text-center text-dark">
                                      <?php echo $value->qty ?>x
                                    </div>
                                    <div class="image_order col-2 text-center pl-1 pr-1 d-none d-md-block">
                                      <a href="">
                                        <img loading="lazy" src="<?php echo base_url('upload/product/'.$value->image);?>" alt="" class="img-fluid w-50">
                                    </a>
                                    </div>
                                    <div class="content_right col-9 col-md-7 pl-1 pr-1">
                                      <a class="title_order fw-bold text-decoration-none text-color" href="" title="iPhone 13 256GB - Hồng">
                                          <?php echo $value->title ?>
                                      </a>
                                      
                                      <p class="sku_order m-0">
                                        Mã sản phẩm : ipga9-1
                                      </p>
                                      
                                      <small class="d-block">
                                         <?php echo number_format($value->price , 0 ,',' , '.').'đ' ?>
                                      </small>
                                    </div>
                                    <div class="price total col-12 col-md-2 text-right fw-bold pl-1 pr-1 text-main">
                                      <?php echo number_format($subtotal , 0 ,',' , '.').'đ' ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="">
                <div class="border-bottom pt-2 pb-2">
                  <div class="row m--1">
                    <div class="col-6 pl-1 pr-1">
                      Tổng tiền 
                    </div>
                    <div class="col-6 pl-1 pr-1 text-main fw-bold">
                       <?php echo number_format($orders->totalPrice , 0 ,',' , '.').'đ' ?>
                    </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-lg-0 mt-3">
            <div class="account-action bg-white p-3 pr-3 rounded-3">
                <div class="item_ac pt-3 pb-3 border-bottom">
                    <span class="text-main fw-bold">Thông tin cá nhân</span>
                </div>
                <div class="item_ac pt-3 pb-3 border-bottom">
                    <span class="ml-3">Quản lý địa chỉ (2)</span>
                </div>
                <div class="item_ac pt-3 pb-3">
                    <a href="<?= base_url("index.php/logout") ?>" onclick="return confirm('Bạn có muốn đăng xuất?');" class="ml-3 logoutAccount text-main text-decoration-none">
                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
