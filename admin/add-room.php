<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>





	<div class="container my-5">
	<form method="POST" enctype="multipart/form-data">
	 <?php
	 if(isset($_SESSION['upload']))
	 {
		 echo $_SESSION['upload'];
		 unset($_SESSION['upload']);
	 }
	 ?>
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
		    <label>Room Type</label>
			<select style="width:50%;"  class="form-control" name="room_type">
	 			<option>Single</option>
				<option>Family</option>
				<option>Extra Standard</option>
			</select>
		</div>

        <div class="form-group">
		    <label>Description</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_description">
		</div>

        <div class="form-group">
		    <label>Room Image</label>
		    <input style="width:50%;" type="file" class="form-control" name="image" >
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
		$room_description = $_POST['room_description'];
		$current_price = $_POST['current_price'];

		//GET ROOM TYPE ID FROM ROOM TYPE 
		$room_type = $_POST['room_type'];
		$sql = "SELECT * FROM room_type WHERE type_name = '$room_type';";
		$res =  mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($res);
		$room_type_id = $row['room_type_id'];
		echo $room_type_id;



		
		//FOR IMAGE UPLOAD
		$room_image = $_FILES['image']['name'];
		$source_path = $_FILES['image']['tmp_name'];
		$destination_path ="../site/images/".$room_image;

        //now upload
        $upload = move_uploaded_file($source_path , $destination_path);

        //check whether the image is uploaded or not
                 //And if its not uploaded then we will stop process and ridrect with error message

		if($upload==false)
		{
			$_SESSION['upload'] = "<div class='error'>Failed to upload image. </div>";

			 //redirect to add category page
			header('location:'.SITEURL.'admin/add-category.php'); 

			//sstop the process
			die();


		}              

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