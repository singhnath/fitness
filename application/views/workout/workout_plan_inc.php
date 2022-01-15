
<option disabled>- Select Trainee -</option>
<?php if( isset($trainees) && !empty($trainees)){ foreach ($trainees as $key=> $trainee){ ?>

   <option  <?php if (isset($trainee_row)) {
     $trainee_row_id = isset($trainee_row['traineeID'])?$trainee_row['traineeID'] :'';
     $id = isset($trainee['ID'])?$trainee['ID'] :'';
     if ($id==$trainee_row_id) {
        echo "selected";
     }
    } ?> value="<?=isset($trainee['ID'])?$trainee['ID'] :''; ?>"><?=ucwords(isset($trainee['UserName'])?$trainee['UserName'] :'') ?></option>
<?php  } } ?>