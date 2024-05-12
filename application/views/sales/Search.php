 <div class="login-nav-top mt-5 mt-lg-0">
            <div class="container">
                <ul class="mt-3 mt-lg-0">
                    <li>
                        <a href="<?php echo base_url('/'); ?>">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?php echo base_url('index.php/Search'); ?>">Tìm kiếm sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
<div class="container mt-2">
     <div class="col-lg-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="d-flex align-items-center flex-wrap">
                          <?php if($products): ?>
                            <?php foreach ($products as $key => $value): ?>
                                <form action="index.php/add-to-cart" method="post">
                                    <div class="flash-item">
                                        <a href="<?= base_url('index.php/san-pham/'.$value->productid) ?>">
                                            <img loading="lazy" src="<?= base_url('upload/product/'. $value->image) ?>" alt="" class="img-fluid">
                                            <input type="hidden" name="productid" value="<?= $value->productid ?>">
                                            <input type="hidden" name="quantity" value="1">
                                        </a>
                                        <div class="flash-text">
                                            <div class="sold-module d-flex w-100 position-relative text-left">
                                                <img loading="lazy" src="//theme.hstatic.net/200000823693/1001172883/14/hot-sale.png?v=978" decoding="async" class="position-absolute" alt="Sắp Cháy hàng">
                                                <div class="d-flex align-items-center justify-content-center sold position-absolute h-100 w-100">
                                                    Sắp Cháy hàng
                                                </div>
                                                <div class="remain modal-open position-absolute h-100" style="width:82%"></div>
                                            </div>
                                            <p class="m-0">
                                                <?= $value->title ?>
                                            </p>
                                            <div class="price">
                                                <span class="text-danger">
                                                    <?php echo number_format($value->price).'đ' ?>
                                                </span>
                                                <span class="price-sale">
                                                    25,600,000₫
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="fa-regular fa-heart"></i>
                                                <label for="">Yêu thích</label>
                                            </div>
                                        </div>
                                        <span class="label-sale position-absolute">
                                            Giảm 9%
                                        </span>
                                        <span class="label-tag d-flex align-items-center position-absolute">
                                            <img loading="lazy" src="./img/hot-sale.webp" alt="" style="width: 18px;">
                                            Sale giữa tháng
                                        </span>
                                        <button class="cart border-0">
                                            <i class="fa-solid fa-plus"></i>
                                        </button> 
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-warning mt-3 text-center w-100" role="alert">
                                <span class="font-weight-bold">Không có sản phẩm nào phù hợp!</span>
                                Quay lại <a href="<?= base_url('/'); ?>" class="alert-link">cửa hàng</a> để tiếp tục mua sắm.
                            </div>
                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                    </div>
       </div>
</div>