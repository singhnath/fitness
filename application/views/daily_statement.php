<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Daily Statement</a> </div>
    <h1>Daily Statement</h1>
   <!--  <div class="span6">
      <button class="btn btn-success" name="new_vendor">Add New</button>
    </div> -->
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

                    
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                      
                      <p  >Date: <input type="text"  id="datepicker"></p> 
                    </div>

                    
                    
                    <?php
                    /*echo $daily;*/
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tainertable">
                        <thead>
                          <tr>
                            <th>Sr No.</th>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Trainer Name</th>
                            <th>Booking Date</th>
                            <th>Schedule Date</th>
                            <th>Schedule Time</th>
                            <th>Payment Amount</th>
                            <th>transaction ID</th>
                            <th>Charges ID</th>
                            
                          </tr>
                        </thead><img src="">
                        <tbody>
                          <?php

                            $i=0;
                            foreach ($daily as $key ) {
                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             
                             echo '<td>'.$key['bookingID'].'</td>';
                             echo '<td>'.$key['customerName'].'</td>';
                             echo '<td>'.$key['trainerName'].'</td>';
                             echo '<td>'.$key['bookingDate'].'</td>';
                             echo '<td>'.$key['bookedDate'].'</td>';
                             echo '<td>'.$key['bookedTime'].'</td>';
                             echo '<td><i class="fa fa-dollar"></i>'.$key['paymentAmount'].'</td>';
                             echo '<td>'.$key['transactionID'].'</td>';
                             echo '<td>'.$key['chargeID'].'</td>';
                             
                             echo '</tr>';
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