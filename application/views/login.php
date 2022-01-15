 <html lang="en">

    

<head>

        <title>Admin</title><meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/matrix-login.css" />

        <link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



    </head>

    <body style=" background-color: #2e363f1a; overflow: hidden;">

 <div  >

         

 <div id="loginbox">            
                <?php
               if (!empty($this->session->flashdata('error'))) {
                 echo $this->session->flashdata('error');
               }
               ?>
            <form id="loginform" class="form-vertical" action="<?php echo base_url(); ?>index.php/welcome/admin_login" method="POST">

				 <div class="control-group normal_text " > <h3><!-- <img src="<?php echo base_url(); ?>/img/logo.png" alt="Logo" style="filter: invert(100%);" /> --></h3>
                    <h3>Workout (4.0)</h3></div>


                      <div class="control-group">

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>

                          <!--   <input name="userName" type="text" placeholder="Username" required/> -->
                        <!--   <div class="form-group"> -->
                              <!-- <label>Select</label> -->
                              <select class="form-control" name="UserType">
                                <option disabled>--User Type--</option>
                                <option value="0">Admin</option>
                                <option value="1">Trainers</option>
                                <option value="2">Trainee</option>
                              </select>
                        <!--  </div> -->

                        </div>

                    </div>

                </div>
                  
                <div class="control-group">

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>

                            <input name="email" type="email" placeholder="email here..." required/>

                        </div>

                    </div>

                </div>

                <div class="control-group">

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>

                            <input name="userPassword" type="password" placeholder="Password" required />

                        </div>

                    </div>

                </div>

                <div class="form-actions">

                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>

                    <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>

                </div>

            </form>

            <form id="recoverform" action="#" class="form-vertical">

				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

				

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />

                        </div>

                    </div>

               

                <div class="form-actions">

                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>

                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>

                </div>

            </form>

</div>

</div>

