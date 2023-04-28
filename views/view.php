<?php
if(!isset($_GET['id'])){
    header('location: admin.php?page=student-registration');
    // if view id is empty then it will redirect to dashboard

}

?>

<h1 class=" text-primary text-center">Display table row no(<?php echo $_GET['id'] ?>) data</h1>
       <br>

       <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center bg-black text-white">
                    <th scope="col">sln</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
        <tbody>
            <?php
             global $wpdb;
             if(isset($_GET['id'])){
                 $id=$_GET['id'];
                 $view_row_data = $wpdb->get_row("SELECT * FROM student_reg WHERE sln = $id");
                
                //  print_r($view_row_data);
                //foreach ($view_row_data as $retrieved_data){
            ?>

             <thead>
                <tr class="text-center">
                    <td><?php echo $view_row_data->sln; ?></td>
                    <td><?php echo $view_row_data->firstname; ?></td>
                    <td><?php echo $view_row_data->lastname; ?></td>
                    <td><?php echo $view_row_data->fathername; ?></td>
                    <td><?php echo $view_row_data->address; ?>
                    <td><?php echo $view_row_data->mobile; ?>
                    <td><?php echo $view_row_data->email; ?>
                    <td><?php echo $view_row_data->time; ?>
                </tr>
            </thead>
        <tbody>
            <?php
              }
            //}
            ?>
    </table>    