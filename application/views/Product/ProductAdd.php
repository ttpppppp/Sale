<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <?php include('C:\Users\trant\OneDrive\Desktop\Xamp\htdocs\projectsale\application\views\pages/admin_template/_sidebar.php'); ?>

               <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card">
                  <div class="card-body">
                    <?php 
                      if ($this->session->flashdata('success_message')) {
                        echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                      }else if($this->session->flashdata('fail_message')){
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('fail_message').'</div>';
                      }
                    ?>
                    <h4 class="card-title">Add Product</h4>
                    <form action=" <?php echo base_url('index.php/product/store');?>" method="post"  enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title"
                        name="title">
                         <?php echo form_error('title'); ?>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Quantity"
                        name="quantity">
                         <?php echo form_error('quantity'); ?>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Cấu hình</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter configuration"
                        name="configuration">
                         <?php echo form_error('configuration'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price"
                        name="price">
                         <?php echo form_error('price'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Slug" name="slug">
                         <?php echo form_error('slug'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="description">
                         <?php echo form_error('description'); ?>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" class="form-control-file mt-2" id="exampleInputPassword1" placeholder="" name="image">
                        <?php if(isset($error)) {echo $error;} ?>
                      </div>
                      <div class="form-group">
                        <label for="">Categoris</label>
                        <select class="form-control" id="status" name="categories">
                          <?php foreach ($categories as $key => $value): ?>
                            <option value="<?= $value->categoryid ?>" selected><?= $value->title ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Brands</label>
                        <select class="form-control" id="status" name="brands">
                          <?php foreach ($brands as $key => $value): ?>
                            <option value="<?= $value->brandid ?>" selected><?= $value->title ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option value="1" selected>Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2 w-25">Add</button>
                        <a href="<?php echo base_url('index.php/dashboard'); ?>" class="btn btn-light">Back</a>
                      </div>
                  </form>
  </div>
</div>
                    

                </div>
                  <!-- /.container-fluid -->
</div>     <!-- End of Main Content -->