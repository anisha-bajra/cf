<?php include('partials/menu.php'); ?>
<?php include('config/constant.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
            <br> <br>
   
                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                ?>
            <br><br>

      <!--Add category form starts-->

<form action="" method ="POST" enctype="multipart/form-data">

    <table class ="tbl-30">
        <tr> 
            <td> Title: </td>
            <td>
             <input type="text" name ="title" placeholder="Category title">
            </td>
        </tr>    

        <tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="image">
            </td>


   
        <tr>
            <td>Featured</td>
            <td>
            <input type="radio" name="featured" value="yes">Yes
            <input type="radio" name="featured" value="No">No
            </td>
        </tr>

        <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="yes">Yes
                <input type="radio" name="active" value="no">No
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Category" class="btn-secondary">

            </td>
         </tr>
    </table>
        
     </form>
        <!--Form end-->


        <?php
         //Check whether the submit button is clicked or not
         if(isset($_POST['submit']))
         {
             //echo "Clicked";

             //getvalue from form
             $title = $_POST['title'];

             //button selected or not
                if(isset($_POST['featured']))
                {

                    $featured = $_POST['featured'];

                }
                    else
                    {
                    $featured = "No";  
                    }

             if(isset($_POST['active']))
             {
                 $active = $_POST['active'];

             }
             else
             {
                 $active ="no";

             }

              //Checking whether the image is selected or not
             // print_r($_FILES['image']);
              //die(); //break code here

             if(isset($_FILES['image']['name']))
             {
                 //upload the image
                 //to upload we need image name & source path & destination path
                 $image_name = $_FILES['image']['name'];

                 $source_path = $_FILES['image']['tmp_name'];

                 $destination_path ="../images/category/".$image_name;

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
             }

             else
             {
                    //Dont upload
                    $image_name="";
             }


            //. Insert into db
             $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
             ";

            //execute query and save in db
             $res = mysqli_query($conn, $sql);
 
             //check whether the query is executed or not
             if($res==true)
             {
                 //query executed and category added
                $_SESSION['add']="<div class='success'>Category Added successfully.</div>";
                
                //redirect manage category page
                header('location:' .SITEURL.'admin/manage-category.php') ;
             }
             else
             { 
                 //if failed
                $_SESSION['add']="<div class='error'>Category Failed to add category</div>";
                
                //redirect manage category page

                header('location:'.SITEURL.'admin/manage-category.php'); 
             }
             
            }
            ?>


             

             
         
        

         

    </div>
        </div>
 <?php include('partials/footer.php');?>




