<div class="site-content">

<div class="content-area py-1">

<div class="container-fluid">

 <div id="content">
 <?php
         if (!empty($this->session->flashdata('success_message'))) {
           echo $this->session->flashdata('success_message');
         }
  ?>


  <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <?php

        //echo '<pre>'; print_r($trainer);echo '</pre>';

        ?>

        <div class="box">

                    <div class="box-header">
                      <h2>Workout List</h2>
                    </div>
                    <div class="box-body">
                       <div class="widget-content nopadding table-responsive">

                      <table class="table table-bordered data-table" id="tainertable">

                        <thead>

                          <tr>

                            <th>Sr No.</th>
                            <!-- <th>Image</th> -->
                            <th>Trainer Name</th>
                            <th>Day</th>
                            <th>Action</th>
                          </tr>

                        </thead>

                        <tbody>

                          <?php

                          $i=0;

                          foreach ($trainees as $trainee ) { 
                            ?>
                            <tr>
                              
                            <td><?=isset($trainee['id'])?$trainee['id']:'' ?></td>
                            <td><?=ucwords(isset($trainee['UserName'])?$trainee['UserName']:'') ?></td>
                            <td><?=ucwords(isset($trainee['day'])?$days[$trainee['day']]:'') ?></td>
                            <td><a href="<?=isset($trainee['id'])?base_url('/trainee/workout_plan_view/'.$trainee['id']):'#'?>" title="view"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> 
                            <a href="<?=isset($trainee['id'])?base_url('/trainee/workout_plan_delete/'.$trainee['id']):'#'?>" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
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