<div class="site-content">

          
          
<div class="content-area py-1">
<div class="container-fluid">
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Trainer Wallet</a> </div>
    <h1>Trainer Wallet</h1>
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
                    /*print_r($trainerWallet);*/
                    ?>
                    <div class="widget-content nopadding">
                      <table class="table table-bordered data-table" id="tainertable">
                        <thead >
                          <tr align="center">
                            <th>Sr No.</th>
                            
                            <th>Trainer Name</th>

                            <th>Wallet Amount</th>
                            
                            
                            
                          </tr>
                        </thead><img src="">
                        <tbody>
                          <?php
                            $i=0;
                            foreach ($trainerWallet as $key ) {
                              $i++;
                             echo '<tr><td>'.$i.'</td>';
                             
                             echo '<td>'.$key['walletName'].'</td>';
                             echo '<td>'.$key['walletAmount'].'</td>';
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