<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
            <?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\pages/admin_template/_sidebar.php'); ?>
               <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                      <div class="card mt-3">
                      <div class="card-header">
                        Edit Brand
                      </div>
                      <div class="card-body">
                      <?php 
                          if ($this->session->flashdata('success_message')) {
                            echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                          }else if($this->session->flashdata('fail_message')){
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('fail_message').'</div>';
                          }
                      ?>
                      <form action=" <?php echo base_url('index.php/brand/update/'.$brands->brandid);?>" method="post"  enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title"
                            name="title" value="<?php echo $brands->title?>">
                             <?php echo form_error('title'); ?>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Slug</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug" name="slug" 
                            value="<?php echo $brands->slug?>">
                             <?php echo form_error('slug'); ?>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="description"
                            value="<?php echo $brands->description?>">
                             <?php echo form_error('description'); ?>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="form-control mt-2" id="exampleInputPassword1" placeholder="Description" name="image">
                            <?php if(isset($error)) {echo $error;} ?>
                          </div>
                          <div class="form-group">
                            <label for="">Status</label>
                             <select class="form-control mt-2" aria-label="Default select example" name="status">
                          <?php if ($brands->status == 1): ?>
                              <option value="1" selected>Active</option>
                              <option value="0">Inactive</option>
                          <?php else: ?>
                              <option value="1">Active</option>
                              <option value="0" selected>Unactive</option>
                          <?php endif; ?>
                          </select>
                          </div>

                          <button type="submit" class="btn btn-primary mt-2 w-25">Edit</button>
                      </form>
                </div>
                </div>

            </div>
          </div>
        </div>
</div>
                    

                </div>
                  <!-- /.container-fluid -->
</div>     <!-- End of Main Content -->