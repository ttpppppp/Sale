   <section class="details my-3">
        <div class="container bg-white p-4 rounded-3">
            <?php foreach ($productsDetails as $key => $value):?>
                <div class="d-flex gap-3">
                    <h3 class="fw-bold text-color"><?php echo  $value->title ?></h3>
                </div>
                 <div class="row">
                    <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-4">
                        <div class="details-img-lg">
                            <img src="<?php echo base_url('upload/product/'.$value->image) ?>" alt class="img-fluid">
                        </div>
                        <div class="details-img-sm d-flex gap-3 mt-4">
                            <img
                                src="https://product.hstatic.net/200000823693/product/iphone1302_87fdc5a97900497ea10edfa3e90b283e_compact.jpg"
                                alt class="active-img">
                            <img
                                src="https://product.hstatic.net/200000823693/product/iphone13greenpurebackiphone13g-4faa43ab-9285-43ff-a146-3eedc740aaad_eee5f3dbbc174cf7b157539d829bc93e_compact.jpg"
                                alt>
                            <img
                                src="https://product.hstatic.net/200000823693/product/iphone13054f01b1b5d360f43f68e6_7becb0413a4a4e5ea396f68f09e05135_compact.jpg"
                                alt>
                            <img
                                src="https://product.hstatic.net/200000823693/product/iphone1303259ea2189c01e43f8844_334dc79f7aa14b5990571b688c4fadd1_compact.jpg"
                                alt>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-5">
                     <form action="<?php echo base_url('index.php/add-to-cart-checkout') ?>" method="post">
                            <input type="hidden" value="<?php echo $value->productid ?>" name= 'productid'>
                            <!-- <input type="hidden" value="1" name="quantity"> -->
                            <div
                            class="details-price bg-light p-3 rounded-3 d-flex align-items-center gap-3 mt-3 mt-lg-0">
                            <h3
                                class="m-0 text-danger fs-2 fw-bold"><?php echo number_format($value->price ,0,',','.') .'₫' ?></h3>
                            <span
                                class="details-price-sale text-color text-decoration-line-through mt-3">25,600,000₫</span>
                            <div
                                class="sale_label rounded-3 ml-2 py-1 px-2 mb-2 bg-danger text-white">
                                -<span class="nb_dis">
                                    16</span>%
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-3 mb-4">
                            <a href
                                class="data text-center rounded-3 bg-active borderactive">
                                <p class="m-0">128GB</p>
                                <p
                                    class="m-0 text-danger fw-bold">21,590,000₫</p>
                            </a>
                            <a href class="data text-center rounded-3">
                                <p class="m-0">128GB</p>
                                <p
                                    class="m-0 text-danger fw-bold">21,590,000₫</p>
                            </a>
                            <a href class="data text-center rounded-3">
                                <p class="m-0">128GB</p>
                                <p
                                    class="m-0 text-danger fw-bold">21,590,000₫</p>
                            </a>
                        </div>
                        <div class="color">
                            <p class="fw-bold text-color m-0">Màu sắc</p>
                            <div
                                class="d-flex gap-2 align-items-center flex-wrap">
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3 active">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone1302_87fdc5a97900497ea10edfa3e90b283e.jpg"
                                        alt>
                                    <span
                                        class="text-danger fw-bold">Hồng</span>
                                </div>
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone1303259ea2189c01e43f8844_334dc79f7aa14b5990571b688c4fadd1_compact.jpg"
                                        alt>
                                    <span class="text-danger fw-bold">Đen</span>
                                </div>
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone13054f01b1b5d360f43f68e6_7becb0413a4a4e5ea396f68f09e05135_compact.jpg"
                                        alt>
                                    <span class="text-danger fw-bold">Xanh
                                        dương</span>
                                </div>
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone1301415273486efea425a8c5_16f448222d6e432b95a992b1c3d066f4_compact.jpg"
                                        alt>
                                    <span class="text-danger fw-bold">Đỏ</span>
                                </div>
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone1304400b3f7b35f434ceabc5_f6acd09de4e445d495a57eb50c59eb3c_compact.jpg"
                                        alt>
                                    <span
                                        class="text-danger fw-bold">Trắng</span>
                                </div>
                                <div
                                    class="d-inline-flex gap-2 align-items-center color-border p-1 rounded-3">
                                    <img
                                        src="https://product.hstatic.net/200000823693/product/iphone13greenpurebackiphone13g-4faa43ab-9285-43ff-a146-3eedc740aaad_eee5f3dbbc174cf7b157539d829bc93e_compact.jpg"
                                        alt>
                                    <span class="text-danger fw-bold">Xanh
                                        lá</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="fw-bold text-color">Số lượng</span>
                            <button id="addBtn" type="button" 
                                class="bg-white px-3 py-1 rounded-3 text-danger"><i
                                    class="fa-solid fa-plus"></i></button>
                            <button id="minusBtn" type="button" class="bg-white px-3 py-1 rounded-3 text-danger"><i
                                    class="fa-solid fa-minus"></i></button>
                            <input type="text" value="1"
                                class="border rounded-3 px-3 py-1 text-center text-color outline-none quantityDetails"
                                style="max-width: 80px;" name="quantity">
                        </div>
                        <div class="d-flex align-items-center gap-2 my-3">
                            <a href="" class="d-block w-75 text-decoration-none">
                                <button type="submit"
                                class="btn d-flex w-100 justify-content-center flex-column align-items-center rounded-4 pt-2 pb-2 position-relative text-white bg-danger">
                                <span class="text-uppercase fw-bold">Mua
                                    ngay</span>
                                <small>(Giao tận nơi hoặc lấy tại cửa
                                    hàng)</small>
                            </button>
                            </a>
                            <button type="button"
                                class="d-flex justify-content-center flex-column align-items-center rounded-3 p-2 fw-bold position-relative color-borde addDetails" data-productid="<?= $value->productid ?>" data-quantity="1">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <small class="mt-1">Thêm vào giỏ</small>
                            </button>
                        </div>
                        <a href="tel:113" 
                            class="btn d-flex w-100 justify-content-center flex-column align-items-center rounded-4 pt-2 pb-2 position-relative text-white bg-primary mb-3">
                            <span class="text-uppercase fw-bold">Gọi tư
                                vấn</span>
                            <small>(Chúng tôi luôn bên bạn 24/7)</small>
                        </a>
                        <div class="gift p-3">
                            <div class="d-flex align-items-center gap-3">
                                <img
                                    src="https://product.hstatic.net/200000823693/product/f1a969685e463386083712e1cc0560_b730a9d5f9884e4d8a895967ae23cee4.jpg"
                                    alt>
                                <div class="d-flex flex-column">
                                    <div class="mb-2">Đáp ứng giá trị điều kiện,
                                        lấy ngay <b>Cáp dữ liệu một cho ba USB
                                            sang M + L + C 3.5A 1.2m</b></div>
                                    <a class="btn-gift btn btn-danger d-inline">
                                        <i class="fa-solid fa-gift"></i> Nhận
                                        ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
                        <ul
                            class="list-unstyled mb-3 position-relative product-info mb-3 mt-3 mt-lg-0 mt-md-3 p-2 border rounded-3">
                            <li class="in_1 fw-bold">
                                Tình trạng:
                                <span class="inventory_quantity text-success fw-normal">
                                    <?php
                                        if($value->quantity > 0){
                                            echo "Còn hàng";
                                        }else{
                                            echo "Hết hàng";
                                        }
                                     ?>
                                </span>
                            </li>
                            <li class="in_1 fw-bold">
                                Thương hiệu:
                                <span class="text-dark fw-normal">
                                    <?php echo $value->tenthuonghieu ?>
                                </span>
                            </li>
                            <li class="in_1 fw-bold">
                                Mã SKU:
                                <span id="sku"
                                    class="text-dark fw-normal">ipga8-1</span>
                            </li>
                            <li class="in_1 fw-bold">
                                Loại:
                                <span id="sku"
                                    class="text-dark fw-normal">IOS</span>
                            </li>
                        </ul>
                        <div class="free-gifts p-2 mt-4">
                            <legend
                                class="d-inline-block pl-3 pr-3 mb-0 bg-light">
                                <img alt="Code Ưu Đãi"
                                    src="//theme.hstatic.net/200000823693/1001172883/14/gift.gif?v=978">
                                Code Ưu Đãi
                            </legend>
                            <div class="item pb-2 ">
                                <span class="d-block"><small>Nhập mã
                                        <b>Mew2023</b> để được giảm ngay 500k
                                        (áp dụng cho
                                        các đơn hàng trên 500k)</small></span>
                                <copy-text
                                    class="btnCopy btn mb-2 mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-inline-block"
                                    data-text="Mew2023">
                                    Lưu mã
                                </copy-text>
                                <span class="d-block"><small>Nhập mã
                                        <b>Mew2024</b> để được giảm ngay 200k
                                        (áp dụng cho
                                        các đơn hàng trên 500k)</small></span>
                                <copy-text
                                    class="btnCopy btn mb-2 mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-inline-block"
                                    data-text="Mew2024">
                                    Lưu mã
                                </copy-text>
                                <span class="d-block"><small>Nhập mã
                                        <b>Mew2025</b> để được giảm ngay 100k
                                        (áp dụng cho
                                        các đơn hàng trên 500k)</small></span>
                                <copy-text
                                    class="btnCopy btn mb-2 mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-inline-block"
                                    data-text="Mew2025">
                                    Lưu mã
                                </copy-text>
                                <div class="item line_b pb-2 none_mb">
                                     Lưu Mã và nhập ở trang <b>THANH TOÁN</b> bạn nhé!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container p-2  mt-3">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8 bg-white p-3 rounded-3">
                        <h3 class="special-content_title d-block w-100 pb-2 mb-2 fw-bold">Thông
                            tin chi tiết </h3>
                        <div class="expandable-content scrollable">
                            <ul>
                                <li>Hiệu năng vượt trội - Chip Apple A15 Bionic
                                    mạnh mẽ, hỗ trợ mạng 5G tốc độ cao</li>
                                <li>Không gian hiển thị sống động - Màn hình
                                    6.1" Super Retina XDR độ sáng cao, sắc nét
                                </li>
                                <li>Trải nghiệm điện ảnh đỉnh cao - Camera kép
                                    12MP, hỗ trợ ổn định hình ảnh quang học
                                </li>
                                <li>Tối ưu điện năng - Sạc nhanh 20 W, đầy 50%
                                    pin trong khoảng 30 phút</li>
                            </ul>
                            <h2><strong>Đánh giá iPhone 13 - Flagship được mong
                                    chờ năm 2021</strong></h2>
                            <p>Cuối năm 2020, bộ 4 iPhone 12 đã được ra mắt với
                                nhiều cái tiến. Sau đó, mọi sự quan tâm
                                lại đổ dồn vào sản phẩm tiếp theo
                                –&nbsp;<strong>iPhone 13.</strong>&nbsp;Vậy
                                iP&nbsp;13
                                sẽ có những gì nổi bật, hãy tìm hiểu ngay sau
                                đây nhé!</p>
                            <h3><strong>Thiết kế với nhiều đột phá</strong></h3>
                            <p>Về kích thước, iPhone 13 sẽ có 4 phiên bản khác
                                nhau và kích thước không đổi so với
                                series iPhone 12 hiện tại. Nếu iPhone 12 có sự
                                thay đổi trong thiết kế từ góc cạnh bo
                                tròn (Thiết kế được duy trì từ thời iPhone 6 đến
                                iPhone 11 Pro Max) sang thiết kế vuông
                                vắn (đã từng có mặt trên iPhone 4 đến iPhone 5S,
                                SE).</p>
                            <p>Thì trên&nbsp;<strong>điện thoại iPhone
                                    13</strong>&nbsp;vẫn được duy trì một thiết
                                kế .Máy vẫn có phiên bản khung viền thép, một số
                                phiên bản khung nhôm cùng mặt lưng kính. Tương
                                tự năm ngoái, Apple cũng sẽ cho ra mắt 4 phiên
                                bản là iPhone 13, 13 mini, 13 Pro và 13 Pro Max.
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-4">
                            <div
                                class="p-2 rounded-3 bg-white rounded-3">
                                <h3 class="d-block w-100 p-2 mb-2 fw-bold text-color fs-5">Thông số kỹ thuật</h3>
                                <div class="border rounded-3 small modal-open">
                                    <div class="special-content">
                                        <div class="special-content">
                                            <p class="m-0 text-danger fw-bold p-1" style="font-size: 16px;">Màn hình</p>
                                            <table border="1" cellpadding="1"
                                                cellspacing="1"
                                                class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Công nghệ màn
                                                            hình</td>
                                                        <td><?php echo $value->screen ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Độ phân giải</td>
                                                        <td><?php echo $value->resolution ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Màn hình rộng</td>
                                                        <td><?php echo $value->widescreen ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Độ sáng tối đa</td>
                                                        <td><?php echo $value->maximumbrightness ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mặt kính cảm ứng</td>
                                                        <td><?php echo $value->surface ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a href title="Xem thêm"
                                    class="view_mores box_shadow rounded-3 d-block py-2 px-3 mt-3 d-block text-center  text-decoration-none text-black">Xem
                                    chi tiết cấu hình</a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="col-md-8 col-lg-9 p-0">
                        <div class="rounded-3 bg-white py-3 px-2 p-lg-3 mb-3">
                            <h3
                                class="text-left special-content_title d-block w-100 mb-3 font-weight-bold">Đánh
                                giá sản phẩm</h3>

                            <p class="alert alert-warning mb-0">
                                Vui lòng cài đặt app đánh giá sản phẩm để sử
                                dụng tính năng này.
                            </p>

                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
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
<?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\sales\template\Productrelated.php');?>
            </div>
            <?php endforeach; ?>
        </div>

         </section>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     let addDetails = document.querySelector('.addDetails');
    //     let noti = document.querySelector('.noti');

    //     addDetails.addEventListener('click', function() {
    //         noti.classList.add('animationNoti');
    //         setTimeout(function() {
    //             noti.classList.remove('animationNoti');
    //         }, 2000);
    //     });
    // });
</script>
