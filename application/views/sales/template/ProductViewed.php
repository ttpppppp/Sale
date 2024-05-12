<section class="bg-white px-2 py-3 mt-3 rounded-3">
    <h3 class="fw-bold text-color">Sản phẩm đã xem</h3>
    <?php if(isset($_SESSION['productViewed'])): ?>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="flash-list d-flex align-items-center flex-wrap">
                    <?php foreach ($_SESSION['productViewed'] as $product): ?>
                        <?php if($product['status'] == 1){ ?>
                            <div class="flash-item">
                            <a href="<?php echo base_url('index.php/san-pham/'.$product['id']) ?>">
                                <img loading="lazy" src="<?php echo base_url('upload/product/'.$product['image']);?>" alt="" class="img-fluid">
                            </a>
                            <div class="flash-text">
                                <p class="m-0"><?php echo $product['title'] ?></p>
                                <div class="price">
                                    <span class="text-danger">
                                        <?php echo number_format($product['price'] , 0 ,',' , '.'). 'đ' ?>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-regular fa-heart"></i>
                                    <label for>Yêu thích</label>
                                </div>
                            </div>
                            <div class="cart">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <?php }?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    <?php else: ?>
        <p>Chưa xem sản phẩm nào!</p>
    <?php endif; ?>
</section>
