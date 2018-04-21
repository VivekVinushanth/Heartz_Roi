<?php
require_once('../core/init.php');
if (!is_logged_in()) {
  header("Location:login.php");
}
include 'include/head.php';
include 'include/navigation.php';

$doctor_name=((isset($_POST['doctor_name']))?sanitize($_POST['doctor_name']):'');
$speciality=((isset($_POST['speciality']))?sanitize($_POST['speciality']):'');
$booking_date=((isset($_POST['booking_date']))?sanitize($_POST['booking_date']):'');
$booking_time=((isset($_POST['booking_time']))?sanitize($_POST['booking_time']):'');
$booking_date_time=$booking_date.' '.$booking_time;
$errors=array();


 ?>
 <form class="" method="post">
   <div class="form-group">

     <?php
     $user_date_query=$db->query("SELECT * FROM users WHERE id='$user_id'");
     $user_data=mysqli_fetch_assoc($user_date_query);
     $username=$user_data['full_name'];
     $user_nic=$user_data['nic_number'];
     $patient_id=$user_data['id'];
     if($_POST){
     //validating
     $required=array('doctor_name','speciality','booking_date');
     foreach ($required as $key ) {
       if (empty($_POST[$key])) {
         $errors[].='You must fill all the fields!';
         break;
       }
      }
      if (!empty($errors)) {
        echo display_error($errors);
      }
      else {
        //add to databs
       $booking_query=$db->query("INSERT INTO booking(patient_name,user_id,nic_number,doctor_name,date,speciality) Values('$username','$patient_id','$user_nic','$doctor_name','$booking_date_time','$speciality')");
        header('Location:index.php');

      } }?>

   </div>
   <div class="col-md-6" id="channel">


   <div class="form-group col-md-8">
     <label for="doctor_name">Doctor</label>
     <input type="text" class="form-control" name="doctor_name" value="<?php echo $doctor_name; ?>" placeholder="Doctor's Name">
   </div>

   <div class="form-group col-md-8">
     <label>Speciality</label>
       <select name="speciality" class="form-control" id="sel1">
         <?php
          $query_speciality=$db->query("SELECT * FROM speciality");
          ?>

       <option value="Any Specialization"selected="selected">Any Specialization</option>
       <?php while($speciality_array=mysqli_fetch_assoc($query_speciality)): ?>
       <?php echo $speciality_array['speciality'] ?>
          <option value="<?php echo $speciality_array['speciality']; ?>"><?php echo $speciality_array['speciality']; ?></option>
        <?php endwhile; ?>
     </select>

   </div>
   <div class="form-group col-md-8">
   <div class=" col-md-6">
     <label for="datepicker">Date</label>
      <input type='date' name="booking_date"  class="form-control" id='datepicker' value="<?php echo $booking_date; ?>">

   </div>
   <div class="col-md-6">
     <label for="">Time</label>
     <select class="form-control" name="booking_time">
       <option value="16:00">4:00</option>
       <option value="16:30">4:30</option>
       <option value="17:00">5:00</option>
       <option value="17:30">5:30</option>
       <option value="18:00">6:00</option>
       <option value="18:30">6:30</option>

     </select>
   </div>
   </div>

   <div class="form-group col-md-8">
     <button type="submit" class="btn btn-success pull-right" name="book">Channel</button>

   </div>

 </form>
</div>
 <?php

include 'include/footer.php';
  ?>
