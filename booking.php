<?php require_once '../core/init.php';
if (!is_logged_doctor()) {
  header("Location:login.php");
}

include 'include/head.php';
include 'include/navigation.php';
  $doctor_query=$db->query("SELECT * FROM doctors WHERE id='$user_id'");
  $doctor_info=mysqli_fetch_assoc($doctor_query);
  $doctor_name=$doctor_info['full_name'];
  $errors=array();
  if ($doctor_info['approved']==0) {

    ?>
    <div class="text-center text-danger">
      <h2>Not approved. Please contact administrator.</h2>

    </div>
    <?php

  }else {



 ?>

  <div class="col-md-10">
    <div class="panel panel-info">

    <div class="panel-heading text-center">
        <span class="title text-center">Bookings</span>
    </div>
    </div>
    <table class="table table-user-information table-striped">
      <thead>
        <tr>
          <th>Reference Number
          </th>
          <th>Patient</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $booking_user=$db->query("SELECT * FROM booking WHERE doctor_id='$user_id'");
        while($booking_results=mysqli_fetch_assoc($booking_user)):
          $patientID=$booking_results['user_id'];
          $patient=mysqli_fetch_assoc($db->query("SELECT * FROM users WHERE id='$patientID'"));
          ?>
        <tr>
          <th><?php echo $booking_results['reference_number']; ?></th>
          <th><?php echo($patient['full_name']); ?></th>
          <th><?php echo date_fo($booking_results['date']); ?></th>
          <th><?php
            $start_date=$booking_results['date'];
          //  echo $start_date;
            $expire=strtotime($start_date);
            $today=strtotime(date("Y-m-d H:i"));
            if($today>=$expire){
              echo '<span class="text-danger">Expired</span>';
            }else {
              echo '<span class="text-success">Active</span>';
            } ?>


          </th>
          <td> <a href="patients.php?edit=<?php echo $booking_results['reference_number'];  ?>" class="btn btn-xs btn-default"> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
          <td><a href="patients.php?delete=<?php echo $booking_results['reference_number']; ?>" class="btn btn-xs btn-danger"> <span class="glyphicon glyphicon-remove"></span> </a></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>

</div>
<?php }
 include 'include/footer.php';
  ?>
