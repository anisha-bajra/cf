<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>





	<div class="container my-5">
	<form method="POST">
		<h1>Add Admin</h1>
		<div class="form-group">
		    <label>Id</label>
		    <input style="width:50%;" type="text" class="form-control" name="id" placeholder="Enter id">
		</div>
		<div class="form-group">
		    <label>First Name</label>
		    <input style="width:50%;" type="text" class="form-control" name="firstname" placeholder="Enter name">
		</div>
		<div class="form-group">
		    <label>Last Name</label>
		    <input style="width:50%;" type="text" class="form-control" name="lastname" placeholder="Enter last name">
		</div>
		<div class="form-group">
		    <label>Email address</label>
		    <input style="width:50%;" type="email" class="form-control" name="email_id" placeholder="Enter email">
		</div>
		<div class="form-group">
		    <label>Password</label>
		    <input style="width:50%;" type="password" class="form-control" name="password" placeholder="Password">
		</div>
	  
	  <input type="submit" name="submit" class="btn btn-primary" value="Add Admin">
	</form>
	</div>

<?php 

	if(isset($_POST['submit']))
    {
		$admin_id = $_POST['id'];
        $firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email_id'];
        $password = $_POST['password'];

        //SQL query for saving data in db
        $sql = "INSERT INTO tbl_admin SET 
			admin_id = '$admin_id',
        	firstname = '$firstname',
        	lastname = '$lastname',
			email_id = '$email',
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