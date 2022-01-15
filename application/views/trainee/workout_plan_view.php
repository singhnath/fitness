

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
                     ?>

                    <div class="page-title" > 

                      <h2><?=isset($workout_plan_id)?'View':'Create' ?> Workout Plan</h2>

                    </div>

               <div class="widget-content nopadding">
          <div class="col-xl-12 col-lg-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?=isset($workout_plan_id)?'View':'Create' ?> Workout </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php //echo validation_errors(); ?>
            <form role="form" action="<?=isset($workout_plan_id)?base_url('/trainee/workout_plan_view/'.$workout_plan_id):base_url('/trainee/workout_plan_add')?>" method="post" name="form">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Trainees</label>
                                <select class="form-control" name="trainee_id">
                                    <option disabled>- Select Trainee -</option>
                                <?php if( isset($trainees) && !empty($trainees)){ foreach ($trainees as $key=> $trainee){ ?>
                               
                                   <option  <?php if (isset($trainee_row)) {
                                     $trainee_row_id = isset($trainee_row['traineeID'])?$trainee_row['traineeID'] :'';
                                     $id = isset($trainee['ID'])?$trainee['ID'] :'';
                                     if ($id==$trainee_row_id) {
                                        echo "selected";
                                     }
                                    } ?> value="<?=isset($trainee['ID'])?$trainee['ID'] :''; ?>"><?=ucwords(isset($trainee['UserName'])?$trainee['UserName'] :'') ?></option>
                                <?php  } } ?>
                                </select>
                                <div class="error"><?=form_error('traineeID')?></div>
                            </div>
                        </div>
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Days</label>
                                <select class="form-control" name="day">
                                    <option disabled>- Select Day -</option>
                                <?php if( isset($days) && !empty($days)){ foreach ($days as $key=> $day){ ?>
                                    <option 
                                       <?php if (isset($trainee_row)) {
                                         $trainee_row_id = isset($trainee_row['day'])?$trainee_row['day'] :'';
                  
                                           if ($key==$trainee_row_id) {
                                              echo "selected";
                                           }
                                    } ?>
                                     value="<?=isset($key)?$key:''; ?>"><?=ucwords(isset($day)?$day:'') ?></option>
                                <?php  } } ?>
                                </select>
                            </div>
                        </div>
                    </div>  
                   <?php if (!isset($trainee_row)) { ?>
                    <div class="row how_many_row">
                        <div class="col-xs-5">
                             <div class="form-group">
                                <label>Workouts</label>
                                <select class="form-control" name="workout_id[]">
                                    <option disabled >- Select Workouts -</option>
                                    <?php if( isset($workouts) && !empty($workouts)){ foreach ($workouts as $key=> $workout){ ?>
                                    <option value="<?=isset($workout['id'])?$workout['id'] :''; ?>"><?=ucwords(isset($workout['name'])?$workout['name'] :'') ?></option>
                                <?php  } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                            <label for="exampleInputEmail1">How Many <small>(Repetition did you do ?)</small></label>
                            <input type="text" class="form-control" name="repetition[]" placeholder="20">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <ul class="add-list">
                                <li><a href="javascript:void(0);" title="add" class="add_how_many"><i class="fa fa-plus"  aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                  <?php   }  ?>
                     
                     <?php if (isset($trainee_row) && isset($trainee_row['workout_id']) && $trainee_row['workout_id']!='' && $workout_ids=explode(',', $trainee_row['workout_id'])) { if (is_array($workout_ids)) { if (isset($trainee_row['repetition']) && $trainee_row['repetition']!=''){
                         $repetitions=explode(',', $trainee_row['repetition']);
                        } 
                         foreach ($workout_ids as $key=> $workout_id) { ?>
                            
                            <div class="row <?=($key==0)?'how_many_row':'how_many_row_remove';?>">
                              <div class="col-xs-5">
                                   <div class="form-group">
                                      <label>Workouts</label>
                                      <select class="form-control" name="workout_id[]">
                                          <option disabled >- Select Workouts -</option>
                                          <?php if( isset($workouts) && !empty($workouts)){ foreach ($workouts as $workout){ ?>
                                          <option <?php echo ($workout['id']==$workout_id)?'selected':'';   ?> value="<?=isset($workout['id'])?$workout['id'] :''; ?>"><?=ucwords(isset($workout['name'])?$workout['name'] :'') ?></option>
                                      <?php  } } ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-xs-5">
                                  <div class="form-group">
                                  <label for="exampleInputEmail1">How Many <small>(Repetition did you do ?)</small></label>
                                  <input type="text" class="form-control" value="<?=isset($repetitions[$key])?$repetitions[$key]:'' ?>" name="repetition[]" placeholder="20">
                                  </div>
                              </div>
                              <div class="col-xs-2">
                                  <ul class="add-list">
                                      <?php if ($key==0) { ?>
                                       <li><a href="javascript:void(0);" title="add" class="add_how_many"><i class="fa fa-plus"  aria-hidden="true"></i></a></li>
                                    <?php  }else{ ?>
                                      <li><a href="javascript:void(0);" class="h_many_row_r_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                   <?php } ?>
                                  </ul>
                              </div>
                          </div>

                   <?php  }  } } ?>

                                  
                    <div class="box-footer" style="margin-top:20px">
                    <button type="submit" class="btn ">Save</button>
                    </div>
                </div>
              <!-- /.box-body -->
            </form>
            <!-- How many add more data stats, it has to be hiden, and out of the form -->
            <div style="display: none;" id="how_many_row">
                <div class="row how_many_row_remove">   
                <div class="col-xs-5">
                     <div class="form-group">
                        <label>Workout</label>
                         <select class="form-control" name="workout_id[]">
                            <option disabled >- Select Workouts -</option>
                            <?php if( isset($workouts) && !empty($workouts)){ foreach ($workouts as $key=> $workout){ ?>
                            <option value="<?=isset($workout['id'])?$workout['id'] :''; ?>"><?=ucwords(isset($workout['name'])?$workout['name'] :'') ?></option>
                        <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-5">
                    <div class="form-group">
                    <label for="exampleInputEmail1">How Many <small>(Repetition did you do ?)</small></label>
                    <input type="text" class="form-control" name="repetition[]" placeholder="20">
                    </div>
                </div>
                <div class="col-xs-2">
                    <ul class="add-list">
                         <!-- <li><a href="javascript:void(0);" title="add" class="add_how_many"><i class="fa fa-plus"  aria-hidden="true"></i></a></li> -->
                        <li><a href="javascript:void(0);" class="h_many_row_r_btn" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
              </div>
            </div>
            <!-- How many add more data ends, it has to be hiden and out of the form -->
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