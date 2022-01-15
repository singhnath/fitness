<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Release Payment</a> </div>
    <h1>Release Payment</h1>
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
                      <!-- <h5>Trainer Account List</h5> -->
                    </div>
                    <?php
                    /*print_r($release);*/
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tainertable">
                        <thead >
                          <tr align="center">
                            <th>Sr No.</th>
                            <th>Booking ID</th>
                            <th>Trainer Name</th>
                            <th>Request Date</th>
                            <th>Service Charge</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead><img src="">
                        <tbody>
                          <?php
                            $i=0;
                            foreach ($release as $key ) {
                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             
                             echo '<td>'.$key['bookingID'].'</td>';
                             echo '<td>'.$key['UserName'].'</td>';
                             echo '<td>'.$key['releaseRequestDate'].'</td>';
                             echo '<td><i class="fa fa-dollar"></i>'.$key['paymentAmount'].'</td>';

                             echo '<td ><button class="btn btn-info btn-md" style="font-size:24px; background-color: #aa82d6;
                                    border-color: #aa82d6;" " id="rbtn" onclick="releasePayment('.$key['releaseID'].','.$key['trainerID'].','.$key['paymentAmount'].')"><i class="fa fa-credit-card"></i></button> </td>';
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