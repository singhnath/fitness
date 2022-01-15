<div class="site-content">

<div class="content-area py-1">

<div class="container-fluid">

 <div id="content">
 <?php
         if (!empty($this->session->flashdata('success_message'))) {
           echo $this->session->flashdata('success_message');
         }
  ?>
  <div id="content-header" class="page-title">

    <h2>Workout Plans</h2>
      <div class="span6 box-right">
         <a href="<?=base_url('/workout/workout_plan_create');?>" class="btn" name="new_vendor">Add New</a>                  
      </div>
  </div>

  <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <?php

        //echo '<pre>'; print_r($trainer);echo '</pre>';

        ?>

        <div class="box">

                    <div class="box-header">
                      <h2>Workout Plan List</h2>
                    </div>
                    <div class="box-body">
                       <div class="widget-content nopadding table-responsive">

                      <table class="table table-bordered data-table" id="tainertable">

                        <thead>

                          <tr>

                            <th>Sr No.</th>
                            <!-- <th>Image</th> -->
                            <th>Trainee Name</th>
                            <th>Day</th>
                            <th>Action</th>
                          </tr>

                        </thead>

                        <tbody>

                          <?php

                          $i=0;

                          foreach ($trainees as $trainee ) { ?>
                            <tr id="<?=$trainee['id'];?>">
                            <td><?=isset($trainee['id'])?$trainee['id']:'' ?></td>
                            <td><?=ucwords(isset($trainee['UserName'])?$trainee['UserName']:'') ?></td>
                            <td><?=ucwords(isset($trainee['day'])?$days[$trainee['day']]:'') ?></td>
                            <td><a href="<?=isset($trainee['id'])?base_url('/workout/workout_plan_edit/'.$trainee['id']):'#'?>" title="edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> 
                            <a href="" title="delete"><i class="fa fa-trash remove" aria-hidden="true"></i></a></td> 
                            <?php } ?>

                            </tr>
                        </tbody>

                      </table>

                      </div>
                  </div>
        </div>

      </div>

    </div>

  </div>

</div>

</div>

</div>

</div>