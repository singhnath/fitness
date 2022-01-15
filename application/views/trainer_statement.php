<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Trainer Account</a> </div>
    <h1>Trainer Account</h1>
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
                      <h5>Trainer Statement List</h5>
                    </div>
                    <?php
                    /*print_r($trainer)  ;*/
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tainertable">
                        <thead>
                          <tr>
                            <th>Sr No.</th>
                            <th>Trainer Name</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <!-- <th>Credit </th> -->
                            <th>Commission</th>
                            <th>Release Date</th>
                            <th>Payment Status</th>
                             
                          </tr>
                        </thead><img src="">
                        <tbody>
                          <?php
                            $i=0;

                           
                            foreach ($trainer as $key ) {
                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             
                             echo '<td>'.$key['trainerName'].'</td>';
                             echo '<td>'.$key['customerName'].'</td>';
                             echo '<td><i class="fa fa-dollar"></i>'.$key['totalAmount'].'</td>';
                             /*echo '<td>'.$key['credit'].'</td>';*/
                             echo '<td>'.$key['commission'].'</td>';
                             
                             if ($key['releaseStatus'] < 3) {
                               echo '<td></td>';
                               echo '<td>Not released</td>';
                               
                             }else{
                                echo '<td>'.$key['releaseDate'].'</td>'; 
                                echo '<td>Released</td>';
                                
                             }
                             
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