
    <?php include('partials/menu.php'); ?>
    <?php include('config/constant.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br/><br/>
        <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                ?>
                <br/><br/>
        <!-- Button to Add Category -->
        <a href="<?php echo ('http://localhost/bandipurinn/admin/add-category.php');?>" class="btn-primary">Add Category</a>
        <br/><br/><br/>
    <br/><br/><br/>

    <table class="tbl-full">
  <thead>
    <tr>
    <th>S.N</th>
            <th>Title</th>;
            <th>Image</th>;
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
            <td>
            <a href="#" class="btn-secondary">Update Category</a>
            <a href="#" class="btn-danger">Delete  Category</a>   
            </td>
         </tr>
  </thead>

                <?php   
                //To get categories from db
                $sql = "SELECT * FROM tbl_category";

                //Execute query
                $res = mysqli_query($conn , $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check data in db
                if($count>0)
                {
                    //we have data in db
                    //get data and displau
                    while($row=mysqli_fetch_assoc($res)) //fetch data fromdb and save in row which will be in array format
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                       
                       
                       ?>
                     <tbody>
                     <tr>
                     <th>1</th>
                                <th><?php echo $title; ?></th>
                                <th><?php echo $image_name; ?></th>;
                                <th><?php $featured; ?></th>
                                <th><?php $active; ?></th>
                                <td>
                                <a href="#" class="btn-secondary">Update  Category</a>
                                <a href="#" class="btn-danger">Delete  Category</a>   
                                </td>
                            </tr>
                     <tr>
                        <th>2</th>
                        <th><?php echo $title; ?></th>
                                <th><?php echo $image_name; ?></th>
                                <th><?php $featured; ?></th>
                                <th><?php $active; ?></th>
                                <td>
                                <a href="#" class="btn-secondary">Update  Category</a>
                                <a href="#" class="btn-danger">Delete  Category </a>   
                                </td>
                        </tr>
                        <tr>
                        <th>3</th>
                        <th><?php echo $title; ?></th>
                                <th><?php echo $image_name; ?></th>
                                <th><?php $featured; ?></th>
                                <th><?php $active; ?></th>
                                <td>
                                <a href="#" class="btn-secondary">Update  Category</a>
                                <a href="#" class="btn-danger">Delete  Category</a>   
                                </td>
                         </tr>
                                </tbody>
                                    </table>

                
                        <?php


                        
                                    }
                                }
                                else
                                {
                                    //we dont have data
                                    //display msg inside table
                                    ?>  <!--broken php to start anther just to write html code in betn -->

                                    <tr>
                                        <td colspan="6"><div class="error">No Category Added.</div><td>
                                    </tr>




                                    <?php
                                }

                                ?>






                <?php include('partials/footer.php'); ?>