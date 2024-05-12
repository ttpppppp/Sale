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
                    <div class="history d-flex flex-column align-items-center justify-content-center p-3 bg-white p-2 w-100 rounded-3 gap-2">
                        <div class="position-relative">
                            <img src="https://theme.hstatic.net/200000823693/1001172883/14/checklist.png?v=978" alt="" width="23px">
                            <span class="countOrders"><?= count($ordersHistory) ?></span>	
                        </div>
                        <p class="m-0">Lịch sử đơn hàng</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="user w-100 bg-white d-flex flex-column align-items-center justify-content-center p-3 rounded-3 gap-2">
                        <img src="https://theme.hstatic.net/200000823693/1001172883/14/account.png?v=978" alt="" width="23px">
                        <p class="name m-0">Hello, <span class=" text-main fw-bold"><?= $user->username ?></span></p>
                    </div>
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
                <p class="text-main fw-bold fs-5">Lịch sử đơn hàng</p>
                <?php foreach ($ordersHistory as $order): ?>
                   <a href="<?php echo base_url("index.php/chi-tiet-don-hang/".$order->madonhang) ?>" class="text-decoration-none">
                        <div class="historyTab mt-2 border p-2 rounded-3">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="status_order">
                                    <b class="t">#<?= $order->madonhang ?></b> - 
                                    <span class="span_pending text-danger">
                                        <?php if ($order->trangthaidon == 1): ?>
                                            <span class="text-primary">Đang chờ xử lý</span>
                                        <?php elseif ($order->trangthaidon == 2): ?>
                                            <span class="text-success">Đã xử lý - Đang giao hàng</span>
                                        <?php elseif ($order->trangthaidon == 3): ?>
                                            <span class="text-danger">Đã hủy đơn hàng</span>
                                        <?php elseif ($order->trangthaidon == 4): ?>
                                            <span class="text-danger">Chưa thanh toán</span>
                                         <?php elseif ($order->trangthaidon == 5): ?>
                                            <span class="text-success">Đã thanh toán - chờ giao hàng</span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="addr_order">
                                    <b>Địa chỉ giao hàng:</b> <?= $order->address ?>
                                </div>
                                <p class="time_order m-0 text-color">
                                    Ngày: <?php echo $order->orderdate ?>
                                </p>
                            </div>
                            <div class="col-12 col-md-4 text-end">
                                <b class="price" style="color: #f00;"><?= number_format($order->totalPrice, 0, ',', '.') ?>đ</b>
                            </div>
                        </div>
                    </div>
                   </a>
                <?php endforeach; ?>
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
