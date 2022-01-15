<style>canvas#oltmsVoltageChart {
    height: 323px !important;
}</style>

<div class="site-content">

<div class="content-area py-1">

<div class="container-fluid">

	<div class="container-fluid">

    <div class="row-fluid">
     
      <div class="span12 col-xl-12 col-lg-12">

        <div class="widget-box">

                    <div class="page-title" > 

                      <h2>Dashboard</h2>

                    </div>

                    <?php
                       
                    ?>

               <div class=" widget-content nopadding">

               <div class="box">
              <div class="box-header">
                <!-- <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3> -->
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li> -->
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-box">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative;     text-align: center; padding:20px">
                      <!-- <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas> -->
                      <!-- <img src="<?php echo base_url(); ?>img/home-chart.png"/> -->
                      <div class="box box-info" style="canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}">
                            <div class="box-header with-border">
                                <h3 class="box-title">Line Chart</h3>
                                <div class="box-tools pull-right">
                                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                                </div>
                            </div>
                            <div class="box-body" style="height:352px">
                                <div class="chart">
                                    <canvas id="oltmsVoltageChart" style="height:100px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                   </div>
                  <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div> -->
                </div>
              </div><!-- /.card-body -->
            </div>

                    <div class="">
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
                                    <th>tatus</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Internet Explorer</td>
                                    <td>internetexplorer@yopmail.com</td>
                                    <td>9876543210 </td>
                                    <td>01-02-2022</td>
                                    <td><button type="button" class="btn bg-olive margin">Active</button></td>
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

</div>