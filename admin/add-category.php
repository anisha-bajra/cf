<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>





	<div class="container my-5">
	<form method="POST">
		<h1>Add Category</h1>
		<div class="form-group">
		    <label>Id</label>
		    <input style="width:50%;" type="text" class="form-control" name="room_type_id" placeholder="Enter id">
		</div>
		<div class="form-group">
		    <label>Room Type</label>
		    <input style="width:50%;" type="text" class="form-control" name="type_name" placeholder="Enter category">
		</div>

	  
	    <input type="submit" name="submit" class="btn btn-primary" value="Add Room Category">
	</form>
	</div>

<?php 

	if(isset($_POST['submit']))
    {
		$room_type_id = $_POST['room_type_id'];
        $type_name = $_POST['type_name'];

        //SQL query for saving data in db
        $sql = "INSERT INTO room_type SET 
			room_type_id = '$room_type_id',
        	type_name = '$type_name'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res ==TRUE)
        {

        	$_SESSION['add'] = "Added admin successfully";
        	header('location:' .SITEURL.'/admin/manage-category.php');
        }
        else
        {
        	$_SESSION['add'] = "Failed to add admin";
        	header('location:' .SITEURL.'/admin/add-category.php');
        }
     }
?>

<?php include('partials/footer.php'); ?>