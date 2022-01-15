
<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
	<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
                    <div > 
                      <h5>schedule Booking</h5>
                    </div>
                    <?php
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table">
                        <thead>
                          <tr>
                          	<th>Sno</th>
                            <th>Booking Id</th>
                            <th>Customer Name</th>
                            <th>Trainer Name</th>
                            <th>Hours</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $i=0;
                            foreach ($ongoing_booking as $key ) {

                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             echo '<td>'.$key['bookingID'].'</td>';
                             echo '<td>'.$key['userNm'].'</td>';
                             echo '<td>'.$key['TrainerNm'].'</td>';
                             echo '<td>'.$key['bookedHours'].'</td>';
                             echo '<td>'.$key['bookedDate'].'</td>';
                             echo '<td>'.$key['bookedTime'].'</td>';
                             echo '<td>$'.$key['cost_hours'] * $key['bookedHours'] .'</td>';
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