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
               <h2>Users</h2>
                  <div class="span6 box-right">
                     <a href="<?= base_url('index.php/trainers/add_trainee')?>" class="btn" name="new_vendor">Add New</a>                  
                  </div>
            </div>
               <div class="row-fluid">
                  <div class="span12">
                     <div class="box">
                      <!--   <div class="box-header">
                           <h2>Customers List</h2>
                        </div> -->
                        <div class="col-xl-12 col-lg-12">
                        <div class="box box-primary">
                          <!--   <div class="box-header">
                              <h3 class="box-title">User List</h3>
                            </div>  -->            
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $num=1;
                                       foreach ($customer as $key => $value) {?>
                                <tr>
                                    <td><?= $num; ?></td>
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
                                    <td><a href="<?php echo base_url("trainers/edit_trainee").'/'.$value['ID']; ?>" title="edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?php echo base_url("trainers/delete_trainee").'/'.$value['ID']; ?>" title="edit"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
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