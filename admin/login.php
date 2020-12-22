<?php include('config/constant.php')?>

<!DOCTYPE html>
<head>
    <meta charset = "utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
<body>
    
    <!--Modal: Login / Register Form-->
<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="../images/logo.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                            <form method="POST" class="my-login-validation">
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="forgot.html" class="float-right">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                                        
                        
                                </div>
                                <div class="mt-4 text-center">
                                    Don't have an account? <a href="register.php">Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>


</body>
</html>

<?php
    
    if(isset($_POST['submit']))
    {
        echo $username = $_POST['username'];
        echo $password = $_POST['password'];

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //Execute query
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //User available
            $_SESSION['login'] = "<div class='success'>Login Sucessful</div>";
            header('location:' .SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error'>Username or Password incorrect</div>";
            header('location:' .SITEURL.'admin/login.php');
            //User Not available
        }

    }


?>