<section class="bg-white px-2 py-3 mt-3 rounded-3">
    <h3 class="fw-bold text-color">Sản phẩm cùng loại</h3>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="flash-list d-flex align-items-center flex-wrap">
                    <?php foreach ($products_related as $product): ?>
                            <div class="flash-item">
                            <a href="<?php echo base_url('index.php/san-pham/'.$product->productid) ?>">
                                <img loading="lazy" src="<?php echo base_url('upload/product/'.$product->image);?>" alt="" class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="line_1 title_product">
                                    <?php echo $value->title ?>
                                </p>
                                <div class="price">
                                    <span class="text-main fw-bold">
                                        <?php echo number_format($value->price).'₫' ?>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                            </div>
                             <button type="button" class="cart border-0" data-productid="<?= $product->productid ?>" data-quantity="1">
                                 <i class="fa-solid fa-plus"></i>
                            </button>
                            <button class="productdetails border-0" data-product-id="<?php echo $product->productid ?>">
                                 <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
</section>
