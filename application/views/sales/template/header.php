<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?= $this->config->config['pageTitle'] ?></title>
        <!-- Required meta tags -->
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
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
            integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
            integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
            integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>
        <header>
            <div class="container">
                <div class="menu-top">
                    <div class="row align-items-center">
                        <div class="col-lg-2 p-1 position-relative">
                            <a class="text-decoration-none text-black"
                                href="<?php echo base_url('/') ?>"> <img loading="lazy"
                                    src="<?php echo base_url('frontend/img/logo.webp'); ?>"
                                    alt
                                    class="img-fluid pointer-event"></a>
                        </div>
                        <div
                            class="p-0 top-right col-lg-10 d-flex align-items-center gap-2">
                            <a href="<?php echo base_url("index.php/he-thong-chi-nhanh") ?>" class="system">
                                <p>Hệ thống cửa hàng</p>
                                <p>(45 chi nhánh)</p>
                            </a>
                            <form method="GET" action="<?php echo base_url('index.php/timkiem') ?>" class="form-search  position-relative">
                                <input type="text"
                                    placeholder="Tìm kiếm sản phẩm, thương hiệu... " name="keyword" style="color: #555" required id="searchInput">
                                <button type="submit" class="btn-search"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                                 <div class="suggestSerach">
                                    <i class="fa-solid fa-box"></i><span>Từ khóa</span>
                                    <span>"</span><span class="writing"></span><span>"</span>
                                    <div class="suggestList mt-2">

                                   </div>
                                </div>
                            </form>
                            <div class="blog-block">
                                <a class="blog-block-abs" href="<?php echo base_url('index.php/24-cong-nghe') ?>">24 Công nghệ</a>
                                <a href="<?php echo base_url('index.php/su-kien') ?>">Sự kiện</a>
                            </div>
                            <div class="phone">
                                <div
                                    class="text-white contact d-flex align-items-center gap-2 me-2">
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <div class="text-white">
                                        <p class="m-0 phonel">Hotline</p>
                                        <a href="tel:113" class="text-decoration-none text-white">
                                            <p class="m-0">900.636.099</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                           <div class="user">
                                <div class="text-white contact d-flex align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                      <?php if(isset($_SESSION['LoggedInCustomer'])) { ?>
                                        <div class="user-text text-white">
                                            <span><a href="<?php echo base_url("index.php/account") ?>">Hi, <?php echo $_SESSION['LoggedInCustomer']['username']?></a></span>
                                            <p class="m-0"><a href="<?php echo base_url('index.php/logout'); ?>" onclick="return confirm('Bạn có muốn đăng xuất?');">Đăng xuất</a></p>
                                        </div>
                                    <?php } else { ?>
                                        <div class="user-text text-white">
                                            <span><a href="<?php echo base_url('index.php/login'); ?>">Đăng nhập</a></span>
                                            <p class="m-0"><a href="<?php echo base_url('index.php/register'); ?>">Đăng kí</a></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php 
                                $count = 0;
                                foreach ($this->cart->contents() as $value):
                                    $count++;
                                endforeach;
                                ?>
                                <div class="cart-menu position-relative">
                                    <div class="d-flex align-items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                          <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                        </svg>
                                        <div class="cart-text">
                                            <a href="<?php echo base_url('index.php/gio-hang');?>" class="text-decoration-none text-white">
                                                <span>Giỏ</span>
                                                <p class="m-0">hàng</p>
                                            </a>
                                        </div>
                                    <div class="count position-absolute d-flex align-items-center justify-content-center fw-bold" 
                                        style="width: 21px; height: 21px; background: red; background: #d70018; border-radius: 50%; font-size: 10px; top: 0; left: 11px; z-index: 1000000;">
                                            <div id="countLast" class="countLast">
                                                <?php echo $count?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <ul class="menu">
                  <?php
                     $CI = &get_instance();
                     echo $CI->menu();
                    ?>
                </ul>
            </div>
        </header>
        <div class="menu-mobile">
            <div class="container">
                <div class="d-flex align-items-center gap-4">
                    <a href="<?php echo base_url("/") ?>" class="d-block">
                        <img loading="lazy" src="<?php echo base_url('frontend/img/logo_mobi.webp'); ?>" alt
                            class="img-fluid"
                            style="width: 100px;">
                    </a>
                    <div class="form-search">
                        <input type="text" class="w-100"
                            placeholder="Bạn muốn tìm gì?...">
                        <button type="submit" class="btn-search"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  <?php if(isset($_SESSION['LoggedInCustomer'])): ?>
                     <a href="<?php echo base_url("index.php/account") ?>" class="text-white text-decoration-none mt-lg-0 mt-2">
                        <i class="fa-regular fa-user fs-4"></i>
                    </a>
                <?php else: ?>
                   <a href="<?php echo base_url("index.php/login") ?>" class="text-white text-decoration-none mt-lg-0 mt-2">
                        <i class="fa-regular fa-user fs-4"></i>
                    </a>
                <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="menu-mobile-mb">
            <div
                class="d-flex align-items-center justify-content-center gap-2 pt-2">
                <div style="width: 20%;" class="text-center active">
                    <a href="<?php echo base_url("/") ?>" class="active-color"><i
                            class="fa-solid fa-house-user"></i>
                        <p class>Trang chủ</p>
                    </a>
                </div>
                <div style="width: 20%;" class="text-center">
                    <a href><i class="fa-regular fa-heart"></i></i>
                    <p>Yêu thích</p>
                </a>
            </div>
            <div style="width: 20%;" class="text-center">
                <a href=""><i class="fa-solid fa-bars"></i>
                    <p>Danh mục</p>
                </a>
            </div>
            <div style="width: 20%;" class="text-center">
                <a href><i class="fa-regular fa-message"></i>
                    <p>Tư vấn</p>
                </a>
            </div>
            <div style="width: 20%;" class="text-center">
                <a href="<?php echo base_url("index.php/gio-hang") ?>"><i class="fa-solid fa-cart-shopping"></i>
                    <p>Giỏ hàng</p>
                </a>
            </div>
        </div>
    </div>
    <main>