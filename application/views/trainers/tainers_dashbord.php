

<div class="site-content">

<div class="content-area py-1">

<div class="container-fluid">

	<div class="container-fluid">

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

                    <div class="page-title" > 

                      <h2>Dashboard</h2>

                    </div>

                    <?php
                       
                    ?>

               <div class="widget-content nopadding">

               <div class="box">
             <!-- -->
            <div class="card-box">
                <!-- AREA CHART -->
                <!-- LINE CHART -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Line Chart</h3>
                               <!--  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div> -->
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="oltmsVoltageChart" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
              </div><!-- /.card-body -->
            </div>

                    <div class="col-xl-12 col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header">
                              <h3 class="box-title">User List</h3>
                            </div>             
                            <div class="box-body workout-table table-responsive">
                            <table id="example2" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registration Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $num=1;
                                       foreach ($customer as $key => $value) {?>
                                <tr>
                                    <td>1</td>
                                    <td><?= $value['UserName']; ?></td>
                                    <td><?= $value['UserEmail']; ?></td>
                                    <td><?= $value['UserPhone']; ?></td>
                                    <td><?= $value['registration_date']; ?></td>
                                    <?php
                                    if ($value['user_status']==1) {?>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                   <?php }else{?>
                                    <td><button type="button" class="btn btn-danger">Deactive</button></td>
                                  <?php }
                                    ?>
                                   
                                </tr>
                            <?php $num++; } ?>
                                
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

</div>