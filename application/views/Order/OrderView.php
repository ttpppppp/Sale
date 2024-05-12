<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     <?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\pages/admin_template/_sidebar.php'); ?>
    
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row mt-5 d-flex align-items-center justify-content-center">
              <div class="col-lg-10 grid-margin">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title gx-3">List Orders</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <a href="<?php echo base_url('index.php/order/list') ?>" class="btn btn-primary mb-2">List Order</a>
                        <thead>
                          <tr>
                            <th scope="col">Order Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $subtotal = 0;
                        ?>
                        <?php foreach ($orderdetail as $key => $value): ?>
                            <?php 
                                $total = $value->qty * $value->price;
                                $subtotal += $total;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $value->order_code ?>
                                </td>
                                 <td>
                                    <?php echo $value->title ?>
                                </td>
                                 <td>
                                    <img src="<?php echo base_url('upload/product/'.$value->image) ?>" alt="" width = "100px">
                                </td>
                                <td>
                                    <?php echo $value->price ?>
                                </td>
                                 <td>
                                    <?php echo $value->qty ?>
                                </td>
                                <td>
                                    <?php echo number_format($total , 0 , ',' , '.') .'đ' ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="6" class="text-right">
                                <span>Tổng tiền của đơn hàng là: </span>
                                <span class="font-weight-bold" id="totalCheckout" style="font-size: 18px;">
                                    <?php echo "VND" .' '. number_format($orderTotal->totalPrice,0,',','.') .'đ'; ?>
                                        
                                </span>
                            </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                   <select name="" id="xulydonhang" class="form-control w-25 my-2 xulydonhang">
                        <option data-order-code="<?php echo $value->order_code ?>" value="0">Xử lý đơn hàng</option>
                        <option data-order-code="<?php echo $value->order_code ?>" value="2">Đơn hàng đã xử lý</option>
                        <option data-order-code="<?php echo $value->order_code ?>" value="3">Hủy đơn</option>
                    </select>
              </div>
            </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
