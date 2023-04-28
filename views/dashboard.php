<h1 class=" text-primary text-center">Display table data</h1>
       <br>

       <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center bg-black text-white">
                    <th scope="col">sln</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
   
        <?php
        
        global $wpdb;
            //inserting the data into the table(query for inserting data)
            $retrieve_data = $wpdb->get_results( "SELECT * FROM student_reg" );
            
            global $sln;
            // $query=mysqli_query($sql);
            foreach ($retrieve_data as $retrieved_data){
        ?>

            <thead>
                <tr class="text-center">
                    <td><?php echo $retrieved_data->sln; ?></td>
                    <td><?php echo $retrieved_data->firstname; ?></td>
                    <td><?php echo $retrieved_data->lastname; ?></td>
                    <td><?php echo $retrieved_data->email; ?></td>
                    <td>
                    <button class="btn-primary btn"> <a href="<?php echo PLUGIN_ADMIN_URL.'admin.php?page=view' ?>&id=<?php echo $retrieved_data->sln; ?>" class="text-white"> View</a></button>
                    <button class="btn-secondary btn"> <a href="<?php echo PLUGIN_ADMIN_URL.'admin.php?page=edit' ?>&id=<?php echo $retrieved_data->sln; ?>&fn=<?php echo $retrieved_data->firstname; ?>&ln=<?php echo $retrieved_data->lastname; ?> &fan=<?php echo $retrieved_data->fathername; ?>&ad=<?php echo $retrieved_data->address; ?>&mob=<?php echo $retrieved_data->mobile; ?>&em=<?php echo $retrieved_data->email; ?>" class="text-white"> Update </a></button>

                     
                    <button class="btn-danger btn"> <a href="<?php echo PLUGIN_ADMIN_URL.'admin.php?page=student-registration' ?>&delete=<?php echo $retrieved_data->sln; ?>" class="text-white"> Delete </a>
                   </button>
                    
                    </td>
                </tr>
            </thead>
        <tbody>
            <?php
                 global $wpdb;
                 if(isset($_GET['delete'])){
                 $id=$_GET['delete'];
                 $wpdb->delete(
                     "student_reg", array("sln"=>$id)
                 );
                //for redirect the page after delete into the same page without delete=id
                     header('Location: admin.php?page=student-registration');
                      //end delete
                    }
            }
            ?>
        </table>    