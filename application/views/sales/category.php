<div class="login-nav-top mt-5 mt-lg-0">
            <div class="container">
                <ul class="mt-3 mt-lg-0">
                    <li>
                        <a href="<?php echo base_url("/") ?>">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="#">
                        <?php if($products){
                            echo $products[0]->tendanhmuc;
                        }else{
                            echo "Đang cập nhật";
                        } ?>
                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>
</div>
        <section>
            <div class="container bg-white p-3 mt-4 rounded-3">
                <div class="d-flex gap-3">
                    <img src="https://file.hstatic.net/200000823693/file/banner_collec_1_110caff53e3c4432b2fb9ee40ed28576.jpg"
                        alt="" class="rounded-3" width="630px">
                    <img src="https://file.hstatic.net/200000823693/file/banner_collec_2_692de9cbef1f43c085ac86cb21f53945.jpg"
                        alt="" class="rounded-3" width="630px">
                </div>
                <div class="bg-main mt-2 aside-content rounded-3">
                    <ul class="nav navbar-pills p-2">
                        <?php foreach ($categories as $key => $value): ?>
                            <li class="nav-item position-relative">
                                <a title="<?php echo $value->title ?>" class="nav-link fw-bold text-white"
                                   href="<?php echo base_url("index.php/danh-muc/".$value->slug) ?>">
                                    <?php echo $value->title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="m-0 pt-2 pb-2 fw-bold text-main fs-5">Lọc giá</div>
                        <div class="">
                         <ul class="list-unstyled filterContainer">
                            <li>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" value="100" data-min="0" data-max="100000" id="price_100" name="price">
                                    <label class="form-check-label" for="price_100">
                                        Dưới 100.000đ
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="200" data-min="100001" data-max="200000" id="price_200" name="price">
                                    <label class="form-check-label" for="price_200">
                                        100.000đ - 200.000đ
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="500" data-min="200001" data-max="500000" id="price_500" name="price">
                                    <label class="form-check-label" for="price_500">
                                        200.000đ - 500.000đ
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1000" data-min="500001" data-max="1000000" id="price_1000" name="price">
                                    <label class="form-check-label" for="price_1000">
                                        500.000đ - 1.000.000đ
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="2000" data-min="1000001" data-max="2000000" id="price_2000" name="price">
                                    <label class="form-check-label" for="price_2000">
                                        1.000.000đ - 2.000.000đ
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="2000" data-min="2000001" data-max="10000000" id="price_2000plus" name="price">
                                    <label class="form-check-label" for="price_2000plus">
                                        Trên 2.000.000đ
                                    </label>
                                </div>
                            </li>
                        </ul>

                        </div>
                        <aside class="aside-item filter-vendor mb-3 col-12 col-sm-4 col-lg-12">
                            <div class="m-0 pt-2 pb-2 fw-bold fs-5 text-main">Thương hiệu</div>
                            <ul class="filter-vendor filter-grid list-unstyled m-0 pr-1">
                               <?php if (!empty($products)): ?>
                                    <?php
                                        $displayed_brands = array(); 
                                        foreach ($products as $key => $value):
                                            if (!in_array($value->tenthuonghieu, $displayed_brands)):
                                                $displayed_brands[] = $value->tenthuonghieu;
                                    ?>
                                                <li class="filter-item filter-item--check-box mt-2">
                                                    <button class="fa2 px-2 py-1 pe-5 rounded-3 text-decoration-none brandFillter" data-brandid = "<?php echo $value->brandid ?>">
                                                            <?php echo $value->tenthuonghieu ?>
                                                        </a>
                                                    </button>
                                                </li>
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                <?php else: ?>
                                <div class="alert alert-warning mt-3 text-center" role="alert">
                                   Đang cập nhật
                                 </div>
                                <?php endif; ?>
                            </ul>
                        </aside>
                        <aside class="aside-item filter-vendor mb-3 col-12 col-sm-4 col-lg-12">
                            <div class="m-0 pt-2 pb-2 fw-bold fs-5 text-main">Loại</div>
                            <ul class="filter-vendor filter-grid list-unstyled m-0 pr-1">
                                <li class="filter-item filter-item--check-box">
                                    <label class="d-flex align-items-baseline">
                                        <span class="fa2 px-2 py-1 rounded-3 border">
                                            
                                        </span>
                                    </label>
                                </li>
                            </ul>
                        </aside>
                        <a class="h2 title-head big text-uppercase d-inline-block mb-2 px-3 py-2 box_shadow position-relative text-decoration-none">
                            24h Công nghệ
                        </a>
                        <div class="">
                            <div class="p-2 rounded-3 blog_pr bg-white">
                                <h3 class="special-content_title fw-bold w-100 p-2 mb-2">
                                  <a class=" text-decoration-none text-color position-relative" href="" title="Có thể bạn quan tâm">
                                    Có thể bạn quan tâm
                                  </a>
                                </h3>
                                <div class="b_blog">
                                    <article class="mb-3 row">
                                            <div class="col-4 col-lg-3 pe-0 mt-2">
                                                    <img src="//file.hstatic.net/200000823693/article/thiet_ke_chua_co_ten_1ea73286c9624ce0bd77c5b3327f5cda_medium.jpg" class="rounded-3 img-fluid">  
                                            </div>
                                            <div class="blogs-rights col-8 col-lg-9">
                                                <a href="" class="text-decoration-none text-color">Samsung sẽ không sử dụng cảm biến camera GN3 cho Galaxy S25/S25+</a>
                                            </div>
                                    </article>
                                    <article class="mb-3 row">
                                        <div class="col-4 col-lg-3 pe-0 mt-2">
                                                <img src="//file.hstatic.net/200000823693/article/thiet_ke_chua_co_ten_1ea73286c9624ce0bd77c5b3327f5cda_medium.jpg" class="rounded-3 img-fluid">  
                                        </div>
                                        <div class="blogs-rights col-8 col-lg-9">
                                            <a href="" class="text-decoration-none text-color">Samsung sẽ không sử dụng cảm biến camera GN3 cho Galaxy S25/S25+</a>
                                        </div>
                                </article>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="d-flex align-items-center gap-2 border-bottom pb-2">
                            <p class="m-0 mt-2 fw-bold">Sắp xếp theo:</p>
                           <!--  <div class="sortPagiBar mt-2">
                                <ul class="nav navbar-pills gap-3">
                                    <li class="nav-item border rounded-3">
                                        <a class="nav-link p-2 text-black" href="">Mặc định</a>
                                    </li>
                                    <li class="nav-item border rounded-3">
                                        <a class="nav-link p-2 text-black" href="">Giá tăng dần</a>
                                    </li>
                                    <li class="nav-item border rounded-3">
                                        <a class="nav-link p-2 text-black" href="">Giá giảm dần</a>
                                    </li>
                                    <li class="nav-item border rounded-3">
                                        <a class="nav-link p-2 text-black" href="">Mới nhất</a>
                                    </li>
                                </ul>
                            </div> -->
                            <input id="slug" type="hidden" name="" value="<?php echo $slug ?>">
                            <select name="" id="select-filter" class="form-select w-25 mt-2 select-filter">
                                <option value="0">Mặc định</option>
                                <option value="asc">Tăng dần theo giá</option>
                                <option value="desc">Giảm dần theo giá</option>
                            </select>

                        </div>
                        <div class="categoriesProducts">
                            <div class="row">
                         <?php if (!empty($products)): ?>
                                <?php foreach ($products as $key => $value): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <div class="flash-item me-0">
                                            <a href="<?php echo base_url('index.php/san-pham/'.$value->slug) ?>">
                                                <img loading="lazy" src="<?php echo base_url('upload/product/'.$value->image) ?>" alt="Product Image" class="img-fluid">
                                            </a>
                                            <div class="flash-text">
                                                <div class="sold-module d-flex w-100 position-relative text-left">
                                                     <img loading="lazy" src="//theme.hstatic.net/200000823693/1001172883/14/hot-sale.png?v=978" decoding="async" class="position-absolute" alt="Sắp Cháy hàng"> -->
                                                     <div class="d-flex align-items-center justify-content-center sold position-absolute h-100 w-100">
                                                        Sắp Cháy hàng
                                                    </div>
                                                    <div class="remain modal-open position-absolute h-100" style="width:82%"></div>
                                                </div>
                                                <p class="line_1 title_product">
                                                    <?php echo $value->title ?>
                                                </p>
                                                <div class="price">
                                                    <span class="text-main fw-bold">
                                                        <?php echo number_format($value->price).'₫' ?>
                                                    </span>
                                                    <!-- Removed hardcoded sale price -->
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fa-regular fa-heart"></i>
                                                    <label for>Yêu thích</label>
                                                </div>
                                            </div>
                                            <span class="label-sale position-absolute">
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
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-warning mt-3 text-center" role="alert">
                                   Danh mục sản phẩm trống
                                </div>
                            <?php endif; ?>

                        </div>
                        </div>
                    </div>
                </div>
        </section>
