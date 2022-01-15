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
               <h2>Trainees</h2>
                  <div class="span6 box-right">
                     <a href="<?= base_url('index.php/users/add_trainee')?>" class="btn" name="new_vendor">Add New</a>                  
                  </div>
            </div>
            <div class="container-fluid">
               <hr>
               <div class="row-fluid">
                  <div class="span12">
                     <div class="box">
                        <div class="box-header">
                           <h2>Trainee List</h2>
                        </div>
                        <div class="box-body">
                        <?php
                           ?>
                        <div class="widget-content nopadding">
                           <table class="table table-bordered data-table" id="tainertable">
                              <thead>
                                 <tr>
                                    <th>Sr No.</th>
                                    <th>Image</th>
                                    <th>Trainee Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <img src="">
                              <tbody>
                                 <?php
                                    $i=0;
                                    
                                    foreach ($customer as $key ) {
                                    
                                      $i++;
                                    
                                     echo '<tr id="'.$key['ID'].'"><td>'.$i.'</td>';
                                    ?>
                                     <td><img src="<?php echo base_url('img').'/'.$key['UserProfile']; ?>"></td>
                                     <?php
                                     echo '<td>'.$key['UserName'].'</td>';
                                    
                                     echo '<td>'.$key['UserEmail'].'</td>';
                                    
                                     echo '<td>'.$key['UserPhone'].'</td>';
                                    
                                     echo '<td>'.$key['UserAddress'].'</td>';
                                     ?>
                                      <td><a href="<?php echo base_url("index.php/users/edit_trainee").'/'.$key['ID']; ?>" title="edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="" title="delete"><i class="fa fa-trash remove_trainee" aria-hidden="true"></i></a> </td>
                                    <?php
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