<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="container my-5">
            
        <h2 class="text-center">Rooms</h2>

    
            <!-- Button to Add Admin -->
            <a href="add-room.php" class="btn btn-secondary btn-sm my-3">Add Rooms</a>
    

            <table class="table  my-4">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Room Name</th>
                <th scope="col">Room Type ID</th>
                <th scope="col">Description</th>
                <th scope="col">Room Image</th>
                <th scope="col">Current Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php      
                $sql = "SELECT `room_id`,`room_name`,`room_type_id`,`room_description`, `room_image`, `current_price` FROM rooms";
                $res = mysqli_query($conn, $sql) or die(mysqli_error());
                $num = mysqli_num_rows($res);
                
                if ($num > 0) {
            // output data of each row
            while($row = mysqli_fetch_array($res)) { ?>

            
                <tr>
                <th><?php echo $row['room_id'];?></th>
                <td><?php echo $row['room_name'];?></td>
                <td><?php echo $row['room_type_id'];?></td>
                <td><?php echo $row['room_description'];?></td>
                <td><?php echo $row['room_image'];?></td>
                <td><?php echo $row['current_price'];?></td>
                <td> <input type= "submit" name="edit" class="btn btn-primary btn-sm" value="Edit"> </td>
                <td>
                    <form id="del-form" method ="POST">
                        <input type="hidden" name="delete" value="<?php echo $row['room_id']; ?>">
                        <input type= "submit" onclick="delete_record();" name="delete-room" class="btn btn-danger btn-sm" value="Delete">
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
                if(confirm("Do you want to Delete?"))
                {
                    document.getElementById("del-form").action="delete-record.php";
                }
                return true;
            }

        </script>
        

        
<?php include('partials/footer.php'); ?>            