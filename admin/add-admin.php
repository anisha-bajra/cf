<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>





	<div class="container align-items-center my-5 mx-5">
	<form method="POST">
		<h1>Add Admin</h1>
		<div class="form-group">
		    <label>Full Name</label>
		    <input style="width:50%;" type="text" class="form-control" name="fullname" placeholder="Enter name">
		</div>
		<div class="form-group">
		    <label>Email address</label>
		    <input style="width:50%;" type="email" class="form-control" name="username" placeholder="Enter email">
		</div>
		<div class="form-group">
		    <label>Password</label>
		    <input style="width:50%;" type="password" class="form-control" name="password" placeholder="Password">
		</div>
	  <!-- <div class="form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div> -->
	  <input type="submit" name="submit" class="btn btn-primary" value="Add">
	</form>
	</div>

<?php 

	if(isset($_POST['submit']))
    {
        $full_name = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $full_name;

        //SQL query for saving data in db
        $sql = "INSERT INTO tbl_admin SET 
        	fullname = '$full_name',
        	username = '$username',
        	password = '$password'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res ==TRUE)
        {

        	$_SESSION['add'] = "Added admin successfully";
        	header('location:' .SITEURL.'/admin/manage-admin.php');
        }
        else
        {
        	$_SESSION['add'] = "Failed to add admin";
        	header('location:' .SITEURL.'/admin/add-admin.php');
        }
     }
?>

<?php include('partials/footer.php'); ?>