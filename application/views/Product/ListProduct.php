<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
     <?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\pages/admin_template/_sidebar.php'); ?>
    
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row mt-5 d-flex align-items-center justify-content-center">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">List Product</h4>
                    <a class="btn btn-primary mb-2" href="<?php echo base_url('index.php/product/add') ?>">Thêm sản phẩm</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Brands</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($products as $key => $value): ?>
                            <tr>
                            <td>
                                <?php echo $value->productid ?>
                            </td>
                            <td>
                              <span class="font-weight-bold"><?php echo $value->title ?></span>
                            </td>
                            <td>
                              <img src="<?php echo base_url('upload/product/'. $value->image) ?>" alt="" width = "100px">
                            </td>
                             <td>
                              <?php echo $value->quantity ?>
                            </td>
                             <td>
                              <?php echo number_format($value->price).'đ'?>
                            </td>
                             <td>
                              <?php 
                                    echo $value->tenthuonghieu;
                                ?>

                            </td>
                            <td>
                              <?php echo $value->tendanhmuc ?>
                            </td>
                           <td>
                             <label class="badge bg-<?php echo $value->status == 1 ? 'primary' : 'danger'; ?> text-white">
                                  <?php echo $value->status == 1 ? 'Active' : 'Inactive'; ?>
                              </label>
                          </td>
                            <td>
                              <a href="<?php echo base_url('index.php/product/edit/'.$value->productid) ?>" class="btn btn-warning">Edit</a>
                              <a onclick="return confirm('Bạn có muốn xóa sản phẩm <?php echo $value->title ?>');" href="<?php echo base_url('index.php/product/delete/'.$value->productid) ?>" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
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
