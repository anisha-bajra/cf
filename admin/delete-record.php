
<?php
   include('config/constant.php');
    if(isset($_GET['delete-admin']))
    {
        $id = $_GET['delete'];

        $query = "DELETE FROM tbl_admin WHERE admin_id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            header('location:' .SITEURL.'/admin/manage-admin.php'); 
        }
        else
        {
            header('location:' .SITEURL.'/admin/manage-admin.php'); 
        }    
    }
    if(isset($_GET['delete-category']))
    {
        $id = $_GET['id-delete'];

        $query = "DELETE FROM room_type WHERE room_type_id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            
            header('location:' .SITEURL.'/admin/manage-category.php'); 
        }
        else
        {
            
            header('location:'.SITEURL.'/admin/manage-category.php'); 
        }    
    }
    if(isset($_GET['delete-room']))
    {
        $id = $_GET['delete-id'];

        $query = "DELETE FROM rooms WHERE room_id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {

            header('location:' .SITEURL.'/admin/manage-room.php'); 
        }
        else
        {
            header('location:'.SITEURL.'/admin/manage-room.php'); 
        }    
    }
?>

