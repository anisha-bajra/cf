<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>





	<div class="container my-5">
	<form method="POST">
		<h1>Add Rooms</h1>

		<div class="form-group">
		    <label>Room Id</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_id" placeholder="Enter room id">
		</div>

		<div class="form-group">
		    <label>Room Name</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_name" placeholder="Enter room name">
		</div>

        <div class="form-group">
		    <label>Room Type Id</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_type_id">
		</div>

        <div class="form-group">
		    <label>Description</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_description">
		</div>

        <div class="form-group">
		    <label>Room Image</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_image" >
		</div>

        <div class="form-group">
		    <label>Current Price</label>
		    <input style="width:50%;" type="text" class="form-control" name="current_price">
		</div>


	  
	    <input type="submit" name="submit" class="btn btn-primary" value="Add Room">
	</form>
	</div>

<?php 

	if(isset($_POST['submit']))
    {
		$room_id = $_POST['room_id'];
        $room_name = $_POST['room_name'];
        $room_type_id = $_POST['room_type_id'];
        $room_description = $_POST['room_description'];
        $room_image = $_POST['room_image'];
        $current_price = $_POST['current_price'];

        //SQL query for saving data in db
        $sql = "INSERT INTO rooms SET 
			room_id = '$room_id',
        	room_name = '$room_name',
            room_type_id = '$room_type_id',
        	room_description = '$room_description',
            room_image = '$room_image',
        	current_price = '$current_price'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res ==TRUE)
        {

        	$_SESSION['add'] = "Added admin successfully";
        	header('location:' .SITEURL.'/admin/manage-room.php');
        }
        else
        {
        	$_SESSION['add'] = "Failed to add admin";
        	header('location:' .SITEURL.'/admin/add-room.php');
        }
     }
?>

<?php include('partials/footer.php'); ?>