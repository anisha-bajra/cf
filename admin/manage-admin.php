<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            
            <h1>Manage Admin</h1>

    
            <!-- Button to Add Admin -->
            <button  class="btn-danger my-3"><a href="add-admin.php">Add Admin</a></button>
    

            <table class="table  my-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php      
                $sql = "SELECT  `id`, `fullname`, `username` FROM tbl_admin";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
                $num = mysqli_num_rows($res);
                
                if ($num > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($res)) { ?>

            
                <tr>
                <th><?php echo $row['id'];?></th>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['username'];?></td>
                <td> <input type= "submit" name="edit" class="btn btn-primary btn-sm" value="Edit"> </td>
                <td>
                    <form action="delete-admin.php" method ="post">
                    <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                     <input type= "submit" name="delete-btn" class="btn btn-danger btn-sm" value="Delete"></form> </td>
                </tr>
            <?php
            }}
            ?>
            </tbody>   
            </table>

        </div>
        

        
<?php include('partials/footer.php'); ?>            