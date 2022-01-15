<div class="site-content">



          

          

<div class="content-area py-1">

<div class="container-fluid">

 <div id="content">

  <div id="content-header"  class="page-title">

    <h2>Approve Trainer </h2>

   <!--  <div class="span6">

      <button class="btn btn-success" name="new_vendor">Add New</button>

    </div> -->

  </div>

  <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="box">
            <div class="box-header">
              <h5>Approve Trainer List</h5>
            </div>
            <div class="box-body">
                <?php

                ?>
                <div class="widget-content nopadding">

                  <table class="table table-bordered data-table" id="tainertable">

                    <thead>

                      <tr>

                        <th>Sr No.</th>

                        <th>Name</th>

                        <th>Transit Number</th>

                        <th>Institution Number</th>

                        <th>Account Number</th>

                        <th>Account Status</th>

                        

                      </tr>

                    </thead><img src="">

                    <tbody>

                      <?php

                        $i=0;

                        foreach ($approve as $key ) {

                          $i++;

                          echo '<tr><td>'.$i.'</td>';

                          

                          echo '<td>'.$key['UserName'].'</td>';

                          echo '<td>'.$key['transitNumber'].'</td>';

                          echo '<td>'.$key['institutionNumber'].'</td>';

                          echo '<td>'.$key['accountNumber'].'</td>';



                          echo '<td>Approved </td>';

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

</div>