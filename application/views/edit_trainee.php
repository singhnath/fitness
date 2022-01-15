     <section class="content" style="margin: 100px 230px;">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Trainee</h3>
            </div>
            <!-- /.box-header -->
         <!-- form start -->
            <form role="form" action="<?= base_url('index.php/users/submit_edit_trainee')?>" method="post" enctype="multipart/form-data" id="edit_trainee_form">
              <div class="box-body">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="trainee_name" class="form-control" placeholder="Enter ..." value="<?= $data['UserName'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="trainee_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?= $data['UserEmail'];?>">
                </div>
                 <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="text" name="trainee_number" class="form-control" placeholder="Enter ..." value="<?= $data['UserPhone'];?>">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="trainee_address" rows="3" placeholder="Enter ..." value="<?= $data['UserAddress'];?>"><?= $data['UserAddress'];?></textarea>
                </div>
             <!--    <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="trainee_password" id="exampleInputPassword1" placeholder="Password" value="<?= $data['UserPassword'];?>">
                </div> -->
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <img src="<?php echo base_url('img').'/'.$data['UserProfile']; ?>" id="blah" width="70" hieght="80">
                   <input type='file' onchange="readURL(this);" name="trainee_file" id="exampleInputFile" />
                   <input type="hidden" name="trainee_file" value="<?= $data['UserProfile'] ?>">
                   <input type="hidden" name="ID" value="<?= $data['ID']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="margin: 20px;">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

    <script type="text/javascript">
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>