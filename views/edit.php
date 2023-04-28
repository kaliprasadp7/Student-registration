<?php
if(!isset($_GET['id'])){
    header('location: admin.php?page=student-registration');
    // if view id is empty then it will redirect to dashboard

}


$sln = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$fan = $_GET['fan'];
$ad = $_GET['ad'];
$mob = $_GET['mob'];
$em = $_GET['em'];

$insert=false;
if(isset($_POST['firstname'])){

$firstname =  $_POST['firstname'];
$lastname =  $_POST['lastname'];
$fathername =  $_POST['fathername'];
$address =  $_POST['address'];
$phone =  $_POST['phone'];
$email =  $_POST['email'];
$sln = $_GET['id'];






//  //inserting the data into the table(query for inserting data)
global $wpdb;

 $sql="UPDATE `student_reg` SET `firstname`='$firstname',`lastname`='$lastname',`fathername`='$fathername',`address`='$address',`mobile`='$phone',`email`='$email',`time`=current_timestamp() WHERE sln=$sln";

 // $wpdb-> query($sql);

 //  echo $sql;

   
   if($wpdb->query($sql)==true)
   {
    $insert=true;
   } 
   else{
    echo "Error: $sql <br> $wpdb->error";
   }
   
   $wpdb->close();
   }



?>

<h1 class="h1-title">Welcome to the Student Registration Page</h1>
       <?php
           if($insert==true)
            {
               echo "<h3 class='submitMsg'>Your details are updated succesfully.</h3>";
            }
       ?>
       <br>

    <div class="frm" style="width: 800px; margin-left: 150px;" >
      <form method='POST'>
        <div class="row">
            <div class="col">First Name
              <input type="text" class="form-control" value=<?php echo $fn ?> aria-label="First name" name="firstname" required>
            </div>
            <div class="col">Last Name
              <input type="text" class="form-control" value=<?php echo $ln ?> aria-label="Last name" name="lastname" required>
            </div>
          </div>
          <div class="col">Father Name
            <input type="text" class="form-control" value=<?php echo $fan ?> aria-label="Father name"  name="fathername" required>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" value=<?php echo $ad ?> name="address" required>
          </div>
          <div class="col-12">
            <label for="inputphone" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="inputAddress" value=<?php echo $mob ?> maxlength="10" name="phone" required>
          </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" value=<?php echo $em ?> aria-describedby="emailHelp" name="email" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
    </div>