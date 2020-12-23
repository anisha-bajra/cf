
<?php
   include('config/constant.php');
    if(isset($_POST['delete-admin']))
    {
        $id = $_POST['delete'];

        $query = "DELETE FROM tbl_admin WHERE admin_id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            header('location:' .SITEURL.'/admin/manage-admin.php'); 
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('location:' .SITEURL.'/admin/manage-admin.php'); 
        }    
    }
    if(isset($_POST['delete-category']))
    {
        $id = $_POST['delete'];

        $query = "DELETE FROM room_type WHERE room_type_id='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['status'] = "Your Data is Deleted";
            $_SESSION['status_code'] = "success";
            header('location:' .SITEURL.'/admin/manage-category.php'); 
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT DELETED";       
            $_SESSION['status_code'] = "error";
            header('location:'.SITEURL.'/admin/manage-category.php'); 
        }    
    }
?>

