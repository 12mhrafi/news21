<?php
session_start();
if(isset($_SESSION['id'])){
    header("location: post.php");
}

?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    <?php

                    if (isset($_POST['login'])) {
                        include("config.php");
                        $username = mysqli_real_escape_string($connection, $_POST['username']);
                        $pass = $_POST['password'];

                        $query = "SELECT * FROM user WHERE user = '{$username}' AND pass = '{$pass}'";

                        $result = mysqli_query($connection, $query);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                session_start();
                                $_SESSION['id'] = $row['id'];
                                $_SESSION['user']  = $row['user'];
                                $_SESSION['role']  = $row['role'];
                                header("location: post.php");
                            };
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Username and pass not found!</div>";
                        }
                    }
                    ?>




                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>