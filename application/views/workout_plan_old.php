

<div class="site-content">

<div class="content-area py-1">

<div class="container-fluid">

	<div class="container-fluid">

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">
                    <?php
               if (!empty($this->session->flashdata('success_message'))) {
                 echo $this->session->flashdata('success_message');
               }
               if (!empty($this->session->flashdata('error_message'))) {
                 echo $this->session->flashdata('error_message');
               }
               ?>
                    <div class="page-title" > 

                      <h2>Create Workout Plan</h2>

                    </div>

                    <?php
                       
                    ?>

               <div class="widget-content nopadding">
          <div class="col-xl-12 col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Workout </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php //echo validation_errors(); ?>
            <form role="form" method="post" name="form" action="<?= base_url('workout/submit_workoutPlan') ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Trainee</label>
                                <select class="form-control" name="traineeID">
                                     <option disabled>select Trainee</option>
                                    <?php
                                    foreach ($trainee as $value) {?>
                                    <option value="<?= $value['ID'] ?>"><?= $value['UserName'] ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Day</label>
                                <select class="form-control" name="day">
                                    <option disabled>select Day</option>
                                    <option value="20">Day 20</option>
                                    <option value="30">Day 30</option>
                                    <option value="40">Day 40</option>
                                    <option value="50">Day 50</option>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Workout</label>
                                <select class="form-control" name="workoutID[]">
                                    <option disabled>select Workout</option>
                                     <?php
                                    foreach ($workout as $value) {?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-5">
                            <div class="form-group">
                            <label for="exampleInputEmail1">How many <small>(repetition did you do ?)</small></label>
                            <input type="text" class="form-control" name="how_many[]" placeholder="20">
                            </div>
                        </div>
                    </div> 
                        <div id="new_chq"></div>
                        <input type="hidden" value="1" id="total_chq">  
            
                        <div class="col-xs-2">
                            <ul class="add-list">
                                <li><a href="#" title="add"><i class="fa fa-plus add" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="delete"><i class="fa fa-trash remove" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>          
                    <div class="box-footer" style="margin-top:20px">
                    <button type="submit" class="btn ">Save</button>
                    </div>
                </div>
              <!-- /.box-body -->

              
            </form>
          </div>
          <!-- /.box -->
        </div>

        </div>

        </div>

      </div>

    </div>

  </div>

	

</div>

</div>

</div>
