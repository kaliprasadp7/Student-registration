 <?php
 $insert=false;
 if(isset($_POST['firstname'])){

 $firstname =  $_POST['firstname'];
 $lastname =  $_POST['lastname'];
 $fathername =  $_POST['fathername'];
 $address =  $_POST['address'];
 $phone =  $_POST['phone'];
 $email =  $_POST['email'];



//  //inserting the data into the table(query for inserting data)
global $wpdb;
//  $wpdb-> query(
//    $wpdb -> prepare(
//     $sql="INSERT INTO `student_reg`(`firstname`, `lastname`, `fathername`, `address`, `mobile`, `email`, `time`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s'), '$firstname', '$lastname', '$fathername', '$address', '$phone', '$email' current_timestamp();"
//     )
//   );

  
  $sql="INSERT INTO `student_reg`(`firstname`, `lastname`, `fathername`, `address`, `mobile`, `email`, `time`) VALUES ('$firstname', '$lastname', '$fathername', '$address', '$phone', '$email', current_timestamp())";

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
               echo "<h3 class='submitMsg'>Your details are submitted succesfully.</h3>";
            }
       ?>
       <br>

    <div class="frm" style="width: 800px; margin-left: 150px;" >
      <form method='POST'>
        <div class="row">
            <div class="col">First Name
              <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" required>
            </div>
            <div class="col">Last Name
              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname" required>
            </div>
          </div>
          <div class="col">Father Name
            <input type="text" class="form-control" placeholder="Father name" aria-label="Father name"  name="fathername" required>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>
          </div>
          <div class="col-12">
            <label for="inputphone" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="inputAddress" placeholder="##########" maxlength="10" name="phone" required>
          </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>