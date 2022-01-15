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
             if (!empty($this->session->flashdata('error_message'))) {
               echo $this->session->flashdata('error_message');
             }
             ?>
            <div class="box-header with-border">
              <h3 class="box-title">Change Password  Trainee</h3>
            </div>
            <!-- /.box-header -->
         <!-- form start -->
            <form role="form" action="<?= base_url('trainers/trainee_change_password/'.$trainee_data['ID'])?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Old Password </label>
                  <input type="password" name="old_password" class="form-control" placeholder="Enter ..." value="<?= $trainee_data['UserPassword'];?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password" value="">
                  <div class="error"><?=form_error('new_password');?></div>
                </div>
                 <div class="form-group">
                  <label>Confirm Password </label>
                  <input type="password" name="confirm_password" class="form-control" placeholder="Confirm  Password " value="">
                   <div class="error"><?=form_error('confirm_password');?></div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="margin: 20px;">Save</button>
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