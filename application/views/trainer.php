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

    <h2>Trainers</h2>
      <div class="span6 box-right">
         <a href="<?= base_url('index.php/users/add_trainers')?>" class="btn" name="new_vendor">Add New</a>                  
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
                      <h2>Trainers List</h2>
                    </div>
                    <div class="box-body">
                       <div class="widget-content nopadding table-responsive">

                      <table class="table table-bordered data-table" id="tainertable">

                        <thead>

                          <tr>

                            <th>Sr No.</th>

                            <!-- <th>Image</th> -->

                            <th>Trainer Name</th>

                            <th>Email</th>

                            <th>Mobile Number</th>

                            <th>Address</th>

                            <th>Skills</th>

                            <th>Experience</td>

                            <th>Hourly Rate(in $)</th>

                            <th>Available Days</th>

                            <th>Available Time</th>
                            <th>Action</th>
                          </tr>

                        </thead>

                        <tbody>

                          <?php

                          $i=0;

                          foreach ($trainer as $key ) {

                            $AvailableDay='';

                            if($key['availableMon'] && !empty($key['availableMon']))

                            {

                              $AvailableDay.='MON';

                            }

                            if($key['availableThe'] && !empty($key['availableThe']))

                            {

                              $AvailableDay.=',THE';

                            }

                            if($key['availableWed'] && !empty($key['availableWed']))

                            {

                              $AvailableDay.=',WED';

                            }

                            if($key['availableThu'] && !empty($key['availableThu']))

                            {

                              $AvailableDay.=',THU';

                            }

                            if($key['availableFri'] && !empty($key['availableFri']))

                            {

                              $AvailableDay.=',FRI';

                            }

                            if($key['availableSat'] && !empty($key['availableSat']))

                            {

                              $AvailableDay.=',SAT';

                            }

                            if($key['availableSun'] && !empty($key['availableSun']))

                            {

                              $AvailableDay.=',SUN';

                            }

                            $i++;

                            echo '<tr>';

                            echo '<td>'.$i.'</td>';

                            

                            echo '<td>'.$key['UserName'].'</td>';

                            echo '<td>'.$key['UserEmail'].'</td>';

                            echo '<td>'.$key['UserPhone'].'</td>';

                            echo '<td>'.$key['traingAddress'].'</td>';

                            echo '<td>'.$key['Skills'].'</td>';

                            echo '<td>'.$key['experience'].'</td>';

                            echo '<td>$'.$key['cost_hours'].'/hr</td>';

                            echo '<td>'.$AvailableDay.'</td>';

                            echo '<td>'.$key['availableHoursStart'].'-'.$key['availableHoursEnd'].'</td>';
                            ?>
                            <td><a href="<?php echo base_url("index.php/users/edit_trainers").'/'.$key['ID']; ?>" title="edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?php echo base_url("index.php/users/delete_trainers").'/'.$key['ID']; ?>" title="edit"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                            <?php
                            echo '<tr>';

                          }

                          ?>

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