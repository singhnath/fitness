     <section class="content" style="margin: 100px 230px;">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
           <?php
             if (!empty($this->session->flashdata('success_message'))) {
               echo $this->session->flashdata('success_message');
             }
             ?>
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
         <!-- form start -->
            <form role="form" action="<?= base_url('trainers/profile')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter ..." value="<?= $profile_data['UserName'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?= $profile_data['UserEmail'];?>">
                </div>
                 <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="text" name="phone_number" class="form-control" placeholder="Enter ..." value="<?= $profile_data['UserPhone'];?>">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." value="<?= $profile_data['UserAddress'];?>"><?= $profile_data['UserAddress'];?></textarea>
                </div>
           <!--      <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" value="<?= $profile_data['UserPassword'];?>disabled" >
                </div>
                <div class="form-group">
                  <label for="new_pass">New Password</label>
                  <input type="password" class="form-control" name="trainee_password" id="exampleInputPassword1" placeholder="Password" value="">
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_trainee_password" id="confirm_trainee_password" placeholder="Password" value="">
                </div> -->
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <img src="<?php echo base_url('img').'/'.$profile_data['UserProfile']; ?>" id="blah" width="70" hieght="80">
                   <input type='file' onchange="readURL(this);" name="file" id="exampleInputFile" />
                   <input type="hidden" name="file" value="<?= $profile_data['UserProfile'] ?>">
                   <input type="hidden" name="ID" value="<?= $profile_data['ID']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="margin: 20px;">Update</button>
                <a href="<?=base_url('trainers/change_password/'.$profile_data['ID']);?>" class="btn btn-primary"  style="margin: 20px;">Change Password</a>
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