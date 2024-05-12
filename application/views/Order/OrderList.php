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
                       <?php 
                          if ($this->session->flashdata('success_message')) {
                            echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                          }else if($this->session->flashdata('fail_message')){
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('fail_message').'</div>';
                          }
                      ?>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Order Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($orders as $key => $value): ?>
                            <tr>
                            <td>
                                <?php echo $value->order_code ?>
                            </td>
                            <td>
                                <?php echo $value->name ?>
                            </td>
                            <td>
                                <?php echo $value->mobile?>
                            </td>
                             <td>
                                <?php echo $value->address?>
                            </td>
                            <td>
                                <?php if ($value->status == 1): ?>
                                    <label class="badge bg-<?php echo $value->status == 1 ? 'primary' : 'success'; ?> text-white">
                                        <?php echo 'Thanh toán trực tiếp khi nhận hàng'?>
                                    </label>
                                <?php elseif ($value->status == 2): ?>
                                    <label class="badge bg-<?php echo $value->status == 2 ? 'success' : 'success'; ?> text-white">
                                        <?php echo 'Đã duyệt - Đang giao hàng'?>
                                    </label>
                                <?php elseif ($value->status == 3): ?>
                                    <label class="badge bg-danger text-white">
                                        <?php echo 'Đã hủy'?>
                                    </label>
                                <?php elseif ($value->status == 4 ): ?>
                                    <label class="badge bg-danger text-white">
                                        <?php echo 'Chưa thanh toán'?>
                                    </label>
                                <?php elseif ($value->status == 5): ?>
                                    <label class="badge bg-success text-white">
                                        <?php echo 'Đã thanh toán - chờ giao hàng'?>
                                    </label>
                                <?php endif; ?>
                            </td>

                            <td>
                               <a href="<?php echo base_url('index.php/order/view/'.$value->order_code) ?>" class="btn btn-warning">View</a>
                              <a onclick="return confirm('Bạn có muốn xóa order <?php echo $value->order_code ?>');" href="<?php echo base_url('index.php/order/delete/'.$value->order_code) ?>" class="btn btn-danger">Delete</a>
                              <?php endforeach; ?>
                            </td>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
