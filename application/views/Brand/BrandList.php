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
                    <h4 class="card-title">List Brand</h4>
                    <a class="btn btn-primary mb-2" href="<?php echo base_url('index.php/brand/add') ?>">Thêm danh mục</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($brands as $key => $value): ?>
                            <tr>
                            <td>
                                <?php echo $value->brandid ?>
                            </td>
                            <td>
                              <span class="font-weight-bold"><?php echo $value->title ?></span>
                            </td>
                            <td>
                              <?php echo $value->description ?>
                            </td>
                            <td>
                              <img src="<?php echo base_url('upload/brand/'. $value->image) ?>" alt="" width = "100px">
                            </td>
                           <td>
                              <label class="badge bg-<?php echo $value->status == 1 ? 'primary' : 'danger'; ?> text-white">
                                  <?php echo $value->status == 1 ? 'Active' : 'Inactive'; ?>
                              </label>
                          </td>
                            <td>
                              <a href="<?php echo base_url('index.php/brand/edit/'.$value->brandid) ?>" class="btn btn-warning">Edit</a>
                              <a onclick="return confirm('Bạn có muốn xóa nhãn <?php echo $value->title ?>');" href="<?php echo base_url('index.php/brand/delete/'.$value->brandid) ?>" class="btn btn-danger">Delete</a>
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
