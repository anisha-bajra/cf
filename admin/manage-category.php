<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="container my-5">
            
        <h2 class="text-center">Room Categories</h2>

    
            <!-- Button to Add Admin -->
            <a href="add-category.php" class="btn btn-secondary btn-sm my-3">Add Category</a>
    

            <table class="table  my-4">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Room Category</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php      
                $sql = "SELECT  `room_type_id`, `type_name` FROM room_type";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
                $num = mysqli_num_rows($res);
                
                if ($num > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($res)) { ?>

            
                <tr>
                <th><?php echo $row['room_type_id'];?></th>
                <td><?php echo $row['type_name'];?></td>
                <td> <input type= "submit" name="edit" class="btn btn-primary btn-sm" value="Edit"> </td>
                <td>
                    <form action="delete-record.php" method ="GET">
                        
                        <input type="hidden"  name="id-delete" value="<?php echo $row['room_type_id'];?>">
                        <input type="submit" onclick="return delete_record()" name="delete-category" class="btn btn-danger btn-sm" value="Delete">
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
                
                return confirm("Do you want to Delete?");
                
            }

        </script>
        
        

        
<?php include('partials/footer.php'); ?>            