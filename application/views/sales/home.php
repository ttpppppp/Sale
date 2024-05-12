       <?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\sales/template/slider.php') ?>
        <section class="product-poli">
            <div class="container">
                <div class="row my-3">
                    <div class="col-6 col-lg-3 ps-0">
                        <div class="item d-flex align-items-center p-3 gap-2">
                            <img loading="lazy"
                                src="<?php echo base_url('frontend/img/img_poli_1_1951f9d8cb8d49259c4e3eb3f4683fac_icon.webp') ?>"
                                alt>
                            <span class>Sản phẩm an toàn</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item d-flex align-items-center p-3 gap-2">
                            <img loading="lazy"
                                src="<?php echo base_url('frontend/img/img_poli_2_cb649a9dd4ef4f1d88aa2e9664476336_icon.webp') ?>"
                                alt>
                            <span class>Chất lượng cam kết</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item d-flex align-items-center p-3 gap-2">
                            <img loading="lazy"
                                src="<?php echo base_url('frontend/img/img_poli_3_95b5f4dc7b404a38aa6fe40061470edb_icon.webp') ?>"
                                alt>
                            <span class>Dịch vụ vượt trội</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item d-flex align-items-center p-3 gap-2">
                            <img loading="lazy"
                                src="<?php echo base_url('frontend/img/img_poli_4_8e343af8b9914ccab916aef2f72ae993_icon.webp') ?>"
                                alt>
                            <span class>Giao hàng nhanh chóng</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-hot mb-3">
            <div class="container p-3 rounded-3 bg-white">
                <h3>Danh mục nổi bật</h3>
                <div class="product-list d-flex align-items-center flex-lg-wrap flex-nowrap scroll_mobi">
                    <?php foreach ($categories as $key => $value): ?>
                        <a class="text-decoration-none" href="<?php echo base_url('index.php/danh-muc/'.$value->slug) ?>">
                            <div class="product-box">
                            <img class="" src="<?php echo base_url('upload/categories/'. $value->image) ?>" alt="">
                            <p class="text-black"><?php echo $value->title ?></p>
                        </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="container p-0">
                <div class="flash-sale mb-3 rounded-3">
                    <div class="p-3">
                        <div
                            class="flash-top d-flex align-items-center justify-content-between flex-nowrap flex-column flex-lg-row flex-md-row flex-md-column gap-1">
                            <h3
                                class="title d-flex align-items-center gap-2 m-0">
                                <img loading="lazy" src="<?php echo base_url('frontend/img/flash_icon.webp')  ?>"
                                    alt
                                    style="width: 23px;">
                                Flash Sale
                            </h3>
                            <span class="text-sale text-white">Giảm ngay 120k
                                (áp dụng cho các đơn hàng trên
                                500k)</span>
                            <div id="countdown" class="flash-day text-white">
                                <span id="days"></span>
                                <span id="hours"></span>
                                <span id="minutes"></span>
                                <span id="seconds"></span>
                            </div>
                        </div>
                        <div class="swiper mySwiper mt-2 mt-lg-0">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="flash-list d-flex align-items-center flex-wrap">
                                    <?php foreach ($products as $key => $value): ?>
                                      <!-- <form action="index.php/add-to-cart" method="post"> -->
                                       <div class="flash-item">
                                        <a href="<?php echo base_url('index.php/san-pham/'.$value->slug) ?>">
                                         <img loading="lazy" src="<?php echo base_url('upload/product/'. $value->image) ?>"alt class="img-fluid">
                                         <input type="hidden" id="productid" name="productid" value="<?= $value->productid ?>">
                                         <input type="hidden" name="quantity" value="1" id="quantity">                                         
                                        </a>
                                            <div class="flash-text">
                                                <div
                                                    class="sold-module d-flex w-100 position-relative text-left">
                                                    <img loading="lazy"
                                                        src="//theme.hstatic.net/200000823693/1001172883/14/hot-sale.png?v=978"
                                                        decoding="async"
                                                        class="position-absolute"
                                                        alt="Sắp Cháy hàng">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center sold position-absolute h-100 w-100">
                                                        Sắp Cháy hàng</div>
                                                    <div
                                                        class="remain modal-open position-absolute h-100"
                                                        style="width:82%"></div>
                                                </div>
                                                <p class="line_1 title_product">
                                                    <?php echo $value->title ?>
                                                </p>
                                                <div class="price">
                                                    <span class="text-main fw-bold">
                                                        <?php echo number_format($value->price).'₫' ?>
                                                    </span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <i class="fa-regular fa-heart"></i>
                                                        <label for>Yêu thích</label>
                                                    </div>
                                                    <div class="view">
                                                        <span>Lượt xem: <?php echo $value->view ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span
                                                class="label-sale position-absolute">
                                                Giảm 9%
                                            </span>
                                              <span class="label-tag d-flex align-items-center position-absolute">
                                                <img loading="lazy" src="<?php echo base_url("frontend/img/hot-sale.png") ?>" alt="Sale Icon" style="width: 22px;">
                                                Sale giữa tháng
                                            </span>
                                             <button type="button" class="cart border-0" data-productid="<?= $value->productid ?>" data-quantity="1">
                                                    <i class="fa-solid fa-plus"></i>
                                             </button>
                                             <button class="productdetails border-0" data-product-id="<?php echo $value->productid ?>">
                                                <i class="fa-solid fa-bars"></i>
                                            </button>
                                        </div>
                                      <!-- </form> -->
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="rounded-3 mb-3">
            <div class="container bg-white p-4 rounded-4">
                <div class="product-filter">
                    <div
                        class="product-filter-top d-flex align-items-center flex-wrap">
                        <div
                            class="product-filter-top-box d-flex align-items-center">
                            <img loading="lazy" src="<?php echo base_url('/frontend/img/icon-filter.webp') ?>" alt
                                style>
                            <span>Gợi ý cho bạn</span>
                        </div>
                        <div
                            class="product-filter-top-box d-flex align-items-center">
                            <img loading="lazy" src="<?php echo base_url('/frontend/img/icon-filter2.webp') ?>"
                                alt style>
                            <span>Phụ kiện giảm sốc</span>
                        </div>
                        <div
                            class="product-filter-top-box d-flex align-items-center">
                            <img loading="lazy" src="<?php echo base_url('/frontend/img/icon-filte4r.webp') ?>"
                                alt style>
                            <span>Yêu thích nhất</span>
                        </div>
                        <div
                            class="product-filter-top-box d-flex align-items-center">
                            <img loading="lazy" src="<?php echo base_url('/frontend/img/icon-filte3r.webp') ?>"
                                alt style>
                            <span>Đánh giá tốt nhất</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/f1a969685e463386083712e1cc0560_b730a9d5f9884e4d8a895967ae23cee4_large.jpg"
                                    alt class>
                            </div>
                            <div class="p-2 rounded-3">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest w-100">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/31086789670da13286b26138b2ba07_e6ea6b51dd6e46988d3807669090187b_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/71f8a46fc6b422d48688fa68e20cfb_b3cd69ac73af41db8830e7913506646b_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/ggfh_a6c3e8da8a2f4082a1bf84319a707dfd_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/_e2f842d8-c81d-41ff-9f29-be49c1546a0e_80c907d0d2f041fda4413c6720109157_a6eb83e9bb034d53a520745cb30583ed_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/f5f79e91aff0d69237f8097438b913_2ebd09966fd14ce4b41c0930b0547c9b_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/gg_80a004c0541b419a9ac63f1ee8325349_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/ca71d9cfd4d4ee1efafc52c5108180_61f3141d167a459f9c83f93013896454_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/8ad8eddf9a88bd71694828ddea4547_e88e3256e65f4cc9b69e91478d8c1927_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/b49787949a9ed68aa19b1cca5fbc20_9abbe578e37d4783856e7bc6c68e7090_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 rounded-2 mb-2">
                        <div class="p-2 rounded-3 product-suggest">
                            <div
                                class="product-suggest-img w-100 d-flex align-items-center justify-content-center">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/29b6dcacdfbc37d13edc2f89e2dee0_53a6370e9a0841ca8df6bce0232bbef8_large.jpg"
                                    alt>
                            </div>
                            <div class="p-2 rounded-3-body">
                                <div class="flash-text">
                                    <p class="m-0">iPhone 13 128GB </p>
                                    <div class="price">
                                        <span
                                            class="text-danger">21,590,000đ</span>
                                        <span class="price-sale">
                                            25,600,000₫
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex align-items-center gap-2">
                                        <i class="fa-regular fa-heart"></i>
                                        <label for>Yêu thích</label>
                                    </div>
                                </div>
                                <span class="label-sale position-absolute">
                                    Giảm 9%
                                </span>
                                <span
                                    class="label-tag d-flex align-items-center position-absolute">
                                    <img loading="lazy"
                                        src="./img/hot-sale.webp" alt
                                        style="width: 18px;">
                                    Sale giữa tháng
                                </span>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-3">
            <div class="container top-trending rounded-3">
                <h3>TOP TRENDING</h3>
                <div class="row flex-nowrap flex-lg-wrap scroll_mobi">
                    <div class="col-9 col-lg-3 col-md-4 col-sm-6">
                        <div
                            class="top-trending-item card bg-white rounded-4  border-0 p-2">
                            <div
                                class="d-flex align-items-center justify-content-between w-100">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/iphone1302_87fdc5a97900497ea10edfa3e90b283e_large.jpg"
                                    alt class="img-fluid">
                                <div class="img-abs">
                                    <img loading="lazy"
                                        src="https://product.hstatic.net/200000823693/product/iphone1301415273486efea425a8c5_7db443e9667e444d90a54b8ab5eff6ee_large.jpg"
                                        alt class="img-fluid">
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between mt-2">
                                <div class="content">
                                    <a href>Bán chạy nhất</a>
                                    <p>Điện thoại Iphon</p>
                                </div>
                                <div class="me-4">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-3 col-md-4 col-sm-6">
                        <div
                            class="top-trending-item card bg-white rounded-4  border-0 p-2">
                            <div
                                class="d-flex align-items-center justify-content-between w-100">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/sms908galaxys22ultrafrontgreen-1ea5e083-e3db-43ae-a06a-167adae14893_11fe636774e44a88aa25f631191ba49e_large.jpg"
                                    alt class="img-fluid">
                                <div class="img-abs">
                                    <img loading="lazy"
                                        src="https://product.hstatic.net/200000823693/product/sms908galaxys22ultrafrontphant-ddeacdea-7657-4420-a6cb-0c11718170c5_fda688e6ae5144b59e10b2105fbd6027_large.jpg"
                                        alt class="img-fluid">
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between mt-2">
                                <div class="content">
                                    <a href>Bán chạy nhất</a>
                                    <p>Điện thoại Iphon</p>
                                </div>
                                <div class="me-4">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-3 col-md-4 col-sm-6">
                        <div
                            class="top-trending-item card bg-white rounded-4  border-0 p-2">
                            <div
                                class="d-flex align-items-center justify-content-between w-100">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/a6_7be70ec8fa504ebcab199bfa87e99110_large.jpg"
                                    alt class="img-fluid">
                                <div class="img-abs">
                                    <img loading="lazy"
                                        src="https://product.hstatic.net/200000823693/product/a4_50d6c0c79b1d476b80088fba68219acc_large.jpg"
                                        alt class="img-fluid">
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between mt-2">
                                <div class="content">
                                    <a href>Bán chạy nhất</a>
                                    <p>Điện thoại Iphon</p>
                                </div>
                                <div class="me-4">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-lg-3 col-md-4 col-sm-6">
                        <div
                            class="top-trending-item card bg-white rounded-4  border-0 p-2">
                            <div
                                class="d-flex align-items-center justify-content-between w-100">
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/remaxrbm28mac8001_4a08e8fb28f24a9bb99bd3a0d58a803c_large.jpg"
                                    alt class="img-fluid">
                                <div class="img-abs">
                                    <img loading="lazy"
                                        src="https://product.hstatic.net/200000823693/product/f5f79e91aff0d69237f8097438b913_2ebd09966fd14ce4b41c0930b0547c9b_large.jpg"
                                        alt class="img-fluid">
                                </div>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between mt-2">
                                <div class="content">
                                    <a href>Bán chạy nhất</a>
                                    <p>Điện thoại Iphon</p>
                                </div>
                                <div class="me-4">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-3">
            <div class="container phone-hot bg-white rounded-3 p-3">
                <div
                    class="d-flex align-items-center justify-content-between flex-column flex-md-row flex-lg-row">
                    <h3>Điện thoại nổi bật</h3>
                    <div class="d-flex align-items-center gap-lg-3 gap-1">
                        <div class="item-tab-link rounded-3 active">
                            <a href class="text-decoration-none">Tất cả</a>
                        </div>
                        <div class="item-tab-link  rounded-3">
                            <a href class="text-decoration-none ">Iphon</a>
                        </div>
                        <div class="item-tab-link  rounded-3">
                            <a href class="text-decoration-none ">SamSung</a>
                        </div>
                        <div class="item-tab-link  rounded-3">
                            <a href class="text-decoration-none ">Xiaomi</a>
                        </div>
                        <div class="item-tab-link  rounded-3">
                            <a href class="text-decoration-none ">Oppo</a>
                        </div>
                        <div class="item-tab-link  rounded-3">
                            <a href class="text-decoration-none ">Nokia</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div
                            class="phone-hot-img-left d-flex flex-lg-column justify-content-between align-items-center gap-4 mb-4">
                            <img loading="lazy"
                                src="https://file.hstatic.net/200000823693/file/bn_pr_3_1_e16e71b2e08247f58b398dfa4ba1bc1f.png"
                                alt class="img-fluid rounded-3 mt-2">
                            <img loading="lazy"
                                src="https://file.hstatic.net/200000823693/file/bn_pr_3_2_7fa1360eade54358b5114a7083516635.png"
                                alt class="img-fluid rounded-3 mt-lg-0 mt-2">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div
                                        class="d-flex align-items-center flex-wrap">
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone1302_87fdc5a97900497ea10edfa3e90b283e_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone1301415273486efea425a8c5_7db443e9667e444d90a54b8ab5eff6ee_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone13054f01b1b5d360f43f68e6_d0be90acb2484c4da47254ba9e3e7dba_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/nokia5710xpressaudioteaser_65b2f0915f7f49eebda2ec324d1c4097_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/galaxya13_2b615446e46c42c99fbc9d6436ea7353_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/samsunggalaxya23camthumb600x60_bb0ee3ccf4aa4f178b337340b5cd8160_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/sma536galaxya535gblack_c0b86480ee7546c4b04c01d4454ce4e5_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/samsunggalaxya731600x600_4a544f2de73a417a89cd432ae3ab9325_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="d-flex align-items-center flex-wrap">
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone1302_87fdc5a97900497ea10edfa3e90b283e_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone1301415273486efea425a8c5_7db443e9667e444d90a54b8ab5eff6ee_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flash-item">
                                            <a href>
                                                <img loading="lazy"
                                                    src="https://product.hstatic.net/200000823693/product/iphone13054f01b1b5d360f43f68e6_d0be90acb2484c4da47254ba9e3e7dba_large.jpg"
                                                    alt class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <p class="mt-3 mb-0">iPhone 13
                                                    128GB </p>
                                                <div class="price">
                                                    <span
                                                        class="text-danger">21,590,000đ</span>
                                                    <span class="price-sale">
                                                        25,600,000₫
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                                <div class="cart">
                                                    <i
                                                        class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="mb-3">
                <div class="container phone-hot bg-white rounded-3 p-3">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-md-column flex-lg-row">
                        <div class>
                            <h3>MACBOOK HOT</h3>
                        </div>
                        <div class="d-flex align-items-center gap-lg-3 gap-1">
                            <div class="item-tab-link rounded-3 active">
                                <a href class="text-decoration-none">Tất cả</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Iphon</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href
                                    class="text-decoration-none ">SamSung</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Xiaomi</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Oppo</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Nokia</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-9 mb-2">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div
                                            class="d-flex align-items-center flex-wrap">
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm241_67a0eec4f3cd477b978b44a6951e9664_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm23_8740a7c2a03e4edc9b9e9941031c6cb8_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/hero13d1tfa5zby7e6large00_7c47ddffd79b4c95b00bba1659f8f348_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm211_d927a7276f624606aeaa6d852a6b959d_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/25112_f186f778e8e8493eac7dbb8afd9e7c53_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookpro14inch202110cpu16gpu-27b367c3-6a3a-4366-bd98-30e3c1f305fc_92749031ee454772a4a955897b7f4da1_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookpro20210681_fe4dbce9c8074f3e856d18537975d10f_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookpro2021004111_76e8c74c486a4acbb1b723bf0eb85f85_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div
                                            class="d-flex align-items-center flex-wrap">
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm241_67a0eec4f3cd477b978b44a6951e9664_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm23_8740a7c2a03e4edc9b9e9941031c6cb8_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/hero13d1tfa5zby7e6large00_7c47ddffd79b4c95b00bba1659f8f348_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flash-item">
                                                <a href>
                                                    <img loading="lazy"
                                                        src="https://product.hstatic.net/200000823693/product/macbookairm211_d927a7276f624606aeaa6d852a6b959d_large.jpg"
                                                        alt class="img-fluid">
                                                </a>
                                                <div class="flash-text">
                                                    <p class="mt-3 mb-0">iPhone
                                                        13 128GB </p>
                                                    <div class="price">
                                                        <span
                                                            class="text-danger">21,590,000đ</span>
                                                        <span
                                                            class="price-sale">
                                                            25,600,000₫
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2">
                                                        <i
                                                            class="fa-regular fa-heart"></i>
                                                        <label for>Yêu
                                                            thích</label>
                                                    </div>
                                                    <div class="cart">
                                                        <i
                                                            class="fa-solid fa-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div
                                class="phone-hot-img-left d-flex flex-lg-column justify-content-between align-items-center gap-4 mb-4">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/file/bn_pr_4_1_ea41fd38ed824c318734ce85065ad3ad.png"
                                    alt class="img-fluid rounded-3 mt-2">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/file/bn_pr_4_2_677108e34cf245aeb2a553d2c64296d8.png"
                                    alt
                                    class="img-fluid rounded-3 mt-lg-0 mt-2">
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="mb-3">
         <div class="container clock bg-white rounded-3 p-3">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-lg-row">
                        <h3>ĐỒNG HỒ THÔNG MINH</h3>
                        <div class="d-flex align-items-center gap-lg-3 gap-1">
                            <div class="item-tab-link rounded-3 active">
                                <a href class="text-decoration-none">Tất cả</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Iphon</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href
                                    class="text-decoration-none ">SamSung</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Xiaomi</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Oppo</a>
                            </div>
                            <div class="item-tab-link  rounded-3">
                                <a href class="text-decoration-none ">Nokia</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-3 gap-lg-0 gap-md-0 mt-3">
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/a6_7be70ec8fa504ebcab199bfa87e99110_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/a4_50d6c0c79b1d476b80088fba68219acc_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/donghothongminhhuamiamazfitgts_b16377da655b43509112b4ec6a757c73_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/fd_6aa657eed4f5475a9a105748b4a227b3_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/xanh3_85c60189e94645c58d7c9d4e774c94f9_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/donghothongminhhuaweiwatchfitn_2f73f95c1ac8453cab860d3f54ef9e9b_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/mktodinproductlmagefluoroelast_ff54d883331d4ce9a329b337e3b104eb_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/44_6ce020f0-3215-48b2-ba8b-3aa5b099ab88_3e3298b7126e467e92b7df046e67c607_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/imageremovebgpreview11_9cd688822e1a43ac99aada69b8ec1b16_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/0001redmiwatch2lite941x8001635__1__50505165f5864cbaadf5063c88b652d1_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/_069da30d-1e6c-45e4-abbc-36d21811745e_80df7c267ec74268926ed1047bd2679c_a67ae0ad58ec4cdea8e943d218c2d2fb_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flash-item">
                            <a href>
                                <img loading="lazy"
                                    src="https://product.hstatic.net/200000823693/product/smr870003rperspectivesilver_8f113478057946ff9aeabefb7a0146f6_large.jpg"
                                    alt class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="mt-3 mb-0">iPhone 13 128GB </p>
                                <div class="price">
                                    <span class="text-danger">21,590,000đ</span>
                                    <span class="price-sale">
                                        25,600,000₫
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                                <div class="cart">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 banner">
                        <img loading="lazy"
                            src="https://file.hstatic.net/200000823693/file/bn_pr_5_30eec04b445642a0867229d625448ede.png"
                            alt class="img-fluid rounded-2">
                    </div>
         </div>
        </section>
        <section class="mb-3">
                <div class="mew-review container p-3 rounded-3 bg-white">
                    <h3>CÙNG MEW REVIEW</h3>
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="mew-review-img">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/article/a14_19a8aabcfeea4657aac86f0e4485d9cc_large.jpg"
                                    alt class="img-fluid rounded-3 mb-2">
                                <div class="icon-watch">

                                </div>
                            </div>
                            <p>Đánh giá OnePlus Pad Go: Pin khỏe, màn hình đẹp,
                                loa hay nhưng liệu có thuyết phục người
                                dùng?</p>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="mew-review-img">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/article/a13_f160749fb0294be1878685b11f07de57_large.jpg"
                                    alt class="img-fluid rounded-3 mb-2">
                                <div class="icon-watch">

                                </div>
                            </div>
                            <p>Đánh giá OnePlus Pad Go: Pin khỏe, màn hình đẹp,
                                loa hay nhưng liệu có thuyết phục người
                                dùng?</p>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="mew-review-img">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/article/a11_8ab68d045b21447e9c4db9a6215d7c70_large.jpg"
                                    alt class="img-fluid rounded-3 mb-2">
                                <div class="icon-watch">

                                </div>
                            </div>
                            <p>Đánh giá OnePlus Pad Go: Pin khỏe, màn hình đẹp,
                                loa hay nhưng liệu có thuyết phục người
                                dùng?</p>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6">
                            <div class="mew-review-img">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/article/a3_cb8f89fb738a43bdb5190dc59766714f_large.jpg"
                                    alt class="img-fluid rounded-3 mb-2">
                                <div class="icon-watch">

                                </div>
                            </div>
                            <p>Đánh giá OnePlus Pad Go: Pin khỏe, màn hình đẹp,
                                loa hay nhưng liệu có thuyết phục người
                                dùng?</p>
                        </div>
                    </div>
                </div>
        </section>
        <section class="feedbaack mb-3">
                <div class="container bg-white p-3 rounded-3">
                    <h3>Khách hàng đánh giá</h3>
                    <div
                        class="d-flex gap-3 scroll_mobi flex-lg-wrap flex-nowrap">
                        <div class="feedback-item p-2">
                            <div class="d-flex align-items-center gap-3 ">
                                <div class="feedback-item-img">
                                    <img loading="lazy"
                                        src="https://file.hstatic.net/200000804441/file/people_s_4_8ebea48f735c4976b76adfab9926db2f.jpg"
                                        alt>
                                </div>
                                <div class="feedback-item-user">
                                    <p class="m-0">Trang nguyễn</p>
                                    <span>Đại sứ thương hiệu</span>
                                </div>
                            </div>
                            <p class="mb-0">Mình rất ưng khi đến Mew Mobile. Ở
                                đây có rất nhiều sản phẩm công nghệ phong
                                phú, tha
                                hồ lựa chọn. Nhân viên chuyên nghiệp, nhiệt
                                tình. Chúc Mew Mobile ngày càng phát
                                triển.</p>
                            <div class="text-end">
                                <img loading="lazy" src="./img/blquote.png" alt
                                    width="45px">
                            </div>
                        </div>
                        <div class="feedback-item p-2">
                            <div class="d-flex align-items-center gap-3 ">
                                <div class="feedback-item-img">
                                    <img loading="lazy"
                                        src="https://file.hstatic.net/200000804441/file/people_s_3_8a08f48ad3494c0e94edd521231e7dcd.jpg"
                                        alt>
                                </div>
                                <div class="feedback-item-user">
                                    <p class="m-0">Trang nguyễn</p>
                                    <span>Đại sứ thương hiệu</span>
                                </div>
                            </div>
                            <p class="mb-0">Mình rất ưng khi đến Mew Mobile. Ở
                                đây có rất nhiều sản phẩm công nghệ phong
                                phú, tha
                                hồ lựa chọn. Nhân viên chuyên nghiệp, nhiệt
                                tình. Chúc Mew Mobile ngày càng phát
                                triển.</p>
                            <div class="text-end">
                                <img loading="lazy" src="./img/blquote.png" alt
                                    width="45px">
                            </div>
                        </div>
                    </div>
        </section>
        <section class="mb-3">
                    <div class="container blog p-3 rounded-2 bg-white">
                        <h3>24H CÔNG NGHỆ</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <img loading="lazy"
                                    src="https://file.hstatic.net/200000823693/article/a10_dd70de078db744cda751f38d904b3b4f.jpg"
                                    alt class="img-fluid rounded-3">
                                <span class="line_1 mt-2 mb-2">Vivo S18 chính
                                    thức được xác nhận thời gian ra mắt, tiết lộ
                                    thiết
                                    kế cực bắt</span>
                                <p>Vivo đã xác nhận ngày ra mắt chính thức của
                                    dòng smartphone mới nhất của họ là Vivo S18,
                                    sự
                                    kiện sẽ diễn ra vào lúc 1...</p>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col-4 col-lg-3 p-0">
                                        <img loading="lazy"
                                            src="https://file.hstatic.net/200000823693/article/a9_aff5b6d891254f2983643729dffd4815_medium.jpg"
                                            alt class="rounded-3 img-fluid">
                                    </div>
                                    <div class=" col-8 col-lg-9">
                                        <p class="m-0 blog-title">Trên tay
                                            Huawei MatePad Pro 11 2024: Thiết kế
                                            mỏng gọn, màn
                                            hình 2K, phần mềm được tối ưu tốt,
                                            giá từ 14.68 triệu*</p>
                                        <p
                                            class="mb-0 mt-2 blog-date">04/12/2023</p>
                                        <p class="m-0 line_2">Vào cuối tháng
                                            11/2023, Huawei đã chính thức trình
                                            làng những sản
                                            phẩm mới của hãng bao gồm laptop và
                                            tablet. Trong đó, chiếc</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 col-lg-3 p-0">
                                        <img loading="lazy"
                                            src="https://file.hstatic.net/200000823693/article/a8_99498762ec804e418a07b2564dab07e5_medium.jpg"
                                            alt class="rounded-3 img-fluid">
                                    </div>
                                    <div class=" col-8 col-lg-9">
                                        <p class="m-0 blog-title">Trên tay
                                            Huawei MatePad Pro 11 2024: Thiết kế
                                            mỏng gọn, màn
                                            hình 2K, phần mềm được tối ưu tốt,
                                            giá từ 14.68 triệu*</p>
                                        <p
                                            class="mb-0 mt-2 blog-date">04/12/2023</p>
                                        <p class="m-0 line_2">Vào cuối tháng
                                            11/2023, Huawei đã chính thức trình
                                            làng những sản
                                            phẩm mới của hãng bao gồm laptop và
                                            tablet. Trong đó, chiếc</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 col-lg-3 p-0">
                                        <img loading="lazy"
                                            src="https://file.hstatic.net/200000823693/article/a7_84b8b3e443a14356bc2be30c83a6203b_medium.jpg"
                                            alt class="rounded-3 img-fluid">
                                    </div>
                                    <div class=" col-8 col-lg-9">
                                        <p class="m-0 blog-title">Trên tay
                                            Huawei MatePad Pro 11 2024: Thiết kế
                                            mỏng gọn, màn
                                            hình 2K, phần mềm được tối ưu tốt,
                                            giá từ 14.68 triệu*</p>
                                        <p
                                            class="mb-0 mt-2 blog-date">04/12/2023</p>
                                        <p class="m-0 line_2">Vào cuối tháng
                                            11/2023, Huawei đã chính thức trình
                                            làng những sản
                                            phẩm mới của hãng bao gồm laptop và
                                            tablet. Trong đó, chiếc</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 col-lg-3 p-0">
                                        <img loading="lazy"
                                            src="https://file.hstatic.net/200000823693/article/a9_aff5b6d891254f2983643729dffd4815_medium.jpg"
                                            alt class="rounded-3 img-fluid">
                                    </div>
                                    <div class=" col-8 col-lg-9">
                                        <p class="m-0 blog-title">Trên tay
                                            Huawei MatePad Pro 11 2024: Thiết kế
                                            mỏng gọn, màn
                                            hình 2K, phần mềm được tối ưu tốt,
                                            giá từ 14.68 triệu*</p>
                                        <p
                                            class="mb-0 mt-2 blog-date">04/12/2023</p>
                                        <p class="m-0 line_2">Vào cuối tháng
                                            11/2023, Huawei đã chính thức trình
                                            làng những sản
                                            phẩm mới của hãng bao gồm laptop và
                                            tablet. Trong đó, chiếc</p>
                                    </div>
                                </div>
                                <div class="d-block mt-auto text-center">
                                    <a href="<?php echo base_url("index.php/24-cong-nghe") ?>" title="Xem thêm"
                                        class="view_mores box_shadow rounded-3 d-block py-2 px-3 mt-3 text-center  text-decoration-none text-black">Xem
                                        thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>