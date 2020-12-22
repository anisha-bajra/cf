
<?php
   include('config/constant.php');
       if(isset($_POST['delete-btn']))
{
   $id = $_POST['delete'];

   $query = "DELETE FROM tbl_admin WHERE id='$id' ";
   $query_run = mysqli_query($conn, $query);

   if($query_run)
   {
       $_SESSION['status'] = "Your Data is Deleted";
       $_SESSION['status_code'] = "success";
       header('Location: manage-admin.php'); 
   }
   else
   {
       $_SESSION['status'] = "Your Data is NOT DELETED";       
       $_SESSION['status_code'] = "error";
       header('Location: manage-admin.php'); 
   }    
}
?>

