<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="container my-5">
            
            <h2 class="text-center">All Admin</h2>

    
            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn btn-secondary btn-sm my-3">Add Admin</a>
    

            <table class="table  my-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php      
                $sql = "SELECT  `admin_id`, `firstname`, `lastname`, `email_id`, `password` FROM tbl_admin";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
                $num = mysqli_num_rows($res);
                
                if ($num > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($res)) { ?>

            
                <tr>
                <th><?php echo $row['admin_id'];?></th>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['email_id'];?></td>
                <td><?php echo $row['password'];?></td>
                <td> <input type= "submit" name="edit" class="btn btn-primary btn-sm" value="Edit"> </td>
                <td>
                    <form id="del-form" method ="POST">
                        <input type="hidden" name="delete" value="<?php echo $row['admin_id']; ?>">
                        <input type= "submit" onclick="delete_record();" name="delete-admin" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                </td>
                </tr>
            <?php
            }}
            ?>
            </tbody>   
            </table>

        </div>
        <script>
            function delete_record()
            {
                if(confirm("Do you want to Delete!?"))
                {
                    document.getElementById("del-form").action="delete-record.php";
                }
                return true;
            }

        </script>
        

        
<?php include('partials/footer.php'); ?>            