<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaction History</a> </div>
    <h1>Transaction History</h1>
   <!--  <div class="span6">
      <button class="btn btn-success" name="new_vendor">Add New</button>
    </div> -->
  </div>
  <div class="container-fluid">
    <form class="form-inline" > 
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
         <div class="form-group"> 
          <label for="date" style="margin-bottom: 0"> Date: <input type="text" class="form-control"  id="datepicker"> 
        </div>
        <button type="submit"   class="btn btn-theme">Search</button>
      </form>
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
                    
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                      <!-- <h5>Trainer Account List</h5> -->
                    </div>
                    <?php
                    /*print_r($transHistory);*/
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tainertable">
                        <thead >
                          <tr align="center">
                            <th>Sr No.</th>
                            
                            <th>Trainer Name</th>

                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Activity Date</th>
                            
                            
                            
                          </tr>
                        </thead><img src="">
                        <tbody>
                          <?php
                         /*   $i=0;
                            foreach ($trainerWallet as $key )
                            {
                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             
                             echo '<td>'.$key['walletName'].'</td>';
                             echo '<td>'.$key['walletAmount'].'</td>';
                             echo '</tr>';
                            }*/
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