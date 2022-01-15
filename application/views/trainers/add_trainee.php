<div class="site-content">
  <div class="content-area py-1">
    <div class="container-fluid">
      <section class="content">
        <div  class="page-title">
          <h2>Add Trainee</h2>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <!-- <div class="box-header with-border">
                <h3 class="box-title">Add Trainee</h3>
              </div> -->
              <!-- /.box-header -->
          <!-- form start -->
              <form role="form" action="<?= base_url('index.php/trainers/submit_trainee')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="trainee_name" class="form-control" placeholder="Enter ...">
                  </div>
                 <!--  <div class="form-group">
                    <label>Select Tainers</label>
                     <select class="form-control" name="trainersID">
                        <option disabled>--Select Trainers--</option>
                        <?php
                     foreach ($trainers as $key => $value) {?>
                       <option value="<?= $value['ID'] ?>"><?= $value['UserName']; ?></option>
                     <?php 
                     }
                    ?>
                      </select> 
                   </div> -->          
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="trainee_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" name="trainee_number" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="trainee_address" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="trainee_password" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="trainee_file" id="exampleInputFile">
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="margin: 20px;">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
</div>