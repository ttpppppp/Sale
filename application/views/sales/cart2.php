  <div class="login-nav-top mt-5 mt-lg-0">
            <div class="container">
                <ul class="mt-3 mt-lg-0">
                    <li>
                        <a href="index.html">Trang chủ</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="login.html">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container my-5 bg-white p-3 rounded-3">
            <div class="row">
                <div class="col-12 mb-3 d-none d-lg-block">
                    <span class="text-danger text-decoration-none deleteAllCart" role="button"
                        title="Xoá tất cả">
                        Xoá tất cả
                    </span>
                </div>
                <div class="col-lg-8">
                    <div class="gift p-3 mb-3" style="--bgGift: #fee2e2;">
                        <div
                            class="align-items-lg-center align-items-start d-flex gap-3">
                            <div class>
                                <img
                                    src="https://product.hstatic.net/200000823693/product/f1a969685e463386083712e1cc0560_b730a9d5f9884e4d8a895967ae23cee4.jpg"
                                    alt class="img-fluid">
                            </div>
                            <div class="d-flex flex-column pl-2 pl-lg-3">
                                <div class="mb-2 title_gift">Mua tối thiểu
                                    <b>3,810,000₫</b> để nhận <b>Cáp dữ liệu một
                                        cho ba USB sang M + L + C 3.5A 1.2m</b>
                                    miễn phí</div>
                                <a href class>
                                    <span class="btn btn-danger">Nhận
                                        ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                     <?php 
                        $total = 0;
                        $subtotal = 0;
                    ?>
                 <div class="giohang">
                        <?php if($this->cart->contents()){?>
                            <?php foreach ($this->cart->contents() as $value):?>
                                <?php 
                                    $total = $value['price']* $value['qty'];
                                    $subtotal += $total;
                                ?>
                                <div class="p-4 border rounded-4 position-relative mt-2">
                                <div class="align-items-lg-center d-flex gap-3">
                                    <div>
                                        <img src="<?php echo base_url('upload/product/'.$value['options']['image']) ?>" alt class="img-fluid" width="70px">
                                    </div>
                                    <div class="pl-2 pl-lg-3 w-100">
                                        <p class="text-color fw-bold m-0">
                                            <?php echo $value['name'] ?>
                                        </p>
                                        <span>Đen</span>
                                        <div class="d-flex justify-content-between w-100 mt-2">
                                            <div class="d-flex">
                                                <button class="position-relative px-3 py-1 rounded-5 border-0 minusCount"
                                                data-qty="<?= $value['qty'] ?>" data-rowid="<?= $value['rowid'] ?>">-</button>
                                                <input id="inputCount" class="position-relative rounded-5 border-0 text-center"
                                                 value="<?= $value['qty'] ?>" data-rowid="<?= $value['rowid'] ?>" style="max-width: 2rem; font-size: 13px;"></input>
                                                 <button class="position-relative px-3 py-1 rounded-5 border-0 addCount" 
                                                 data-rowid="<?= $value['rowid'] ?>" data-qty="<?= $value['qty'] ?>">+</button>
                                            </div>
                                            <div class="total" data-rowid="<?= $value['rowid'] ?>">
                                                <span class="fs-5 fw-bold text-color">
                                                    <?php echo number_format($total,0,',','.') . '₫' ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="text-main d-flex align-items-center justify-content-center text-decoration-none position-absolute top-0 start-100 translate-middle bg-danger text-white  delete-link" style="font-size: 13px; border-radius: 50%; width: 24px; height: 24px;"
                                data-rowid="<?= $value['rowid'] ?>"
                                >X
                                </a>
                            </div>
                            <?php endforeach; ?>
                        <?php }else{
                            echo "Không có sản phẩm nào!";
                        }?>

                 </div>
                    <div class="mt-3">
                        <label for class="fw-bold">Ghi chú đơn hàng</label>
                        <textarea class="form-control rounded-3" id="note"
                            name="note" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
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
                    <div class="total_amount">
                        <dl class="bg-light border my-3 p-2 p-lg-3 rounded-4">
                        <dt class="text-uppercase fw-bold">Tổng tiền</dt>
                        <dd class="fw-bold text-main fs-4">
                            <?php echo number_format( $subtotal , 0 ,',','.').'₫' ?>
                        </dd>
                        </dl>
                    </div>
                    <a href="<?php echo base_url('index.php/checkout');?>" class="d-none d-lg-inline-block text-white btn btn-danger rounded-3 mb-0 mb-lg-3 text-uppercase fw-bold py-2 py-lg-3 px-3 px-lg-4">Thanh toán ngay</a>
                </div>
        </div>
</div>