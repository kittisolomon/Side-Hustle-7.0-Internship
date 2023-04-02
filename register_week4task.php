<?php

require "week3task_dbcon.php";

$error_msg = "";
$success_msg = "";

if (isset($_POST["submit"])) {

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $checkUser = mysqli_query($db_con, "SELECT * FROM users WHERE username = '$username' ");

    $checkMail = mysqli_query($db_con, "SELECT * FROM users WHERE email = '$email' ");

    if (mysqli_num_rows($checkUser) > 0) {

        $error_msg = "Username has been taken!";

    } elseif (mysqli_num_rows($checkMail) > 0) {

        $error_msg = "E-mail already Exist";


    } elseif ($password !== $confirm_password) {

        $error_msg = "Password Mis-match";

    } else {

        $encrypt_password = md5($password);

        $sql = "INSERT INTO users (firstname,lastname,username,email,gender,password)

 VALUES('$firstname','$lastname','$username','$email','$gender','$encrypt_password')";

        $query = mysqli_query($db_con, $sql);

        if ($query) {

            $success_msg = "Registration Successful!";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <style>
        div[class='input-group-text'] {
            color: #B5404F;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-primary {
            background-color: #B5404F;
            border: solid 1px #B5404F;
        }

        .btn-primary:hover {
            background-color: #C55967;
            border: solid 1px #B5404F;
        }
    </style>
</head>

<body>
    <div>
        <div class="container form-wrapper">
            <form method="POST">
                <div class="row flex">
                    <header class="form-header">USER REGISTRATION</header>
                    <div class='col-md-8  text-center py-3'>
                        <?php if (!empty($success_msg)) {
                            echo "<span class='alert alert-success '> $success_msg </span>";
                        } ?>
                    </div>
                    <div class='col-md-8 text-center py-2'>
                        <?php if (!empty($error_msg)) {
                            echo "<span class=' alert alert-danger '> $error_msg </span>";
                        } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Firstname:</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Lastname:</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username">
                        </div>
                    </div>

                    <div class="col-md-8 py-2">
                        <label for="">Email:</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>

                            <input type="email" name="email" class="form-control" placeholder="Enter E-mail">
                        </div>
                    </div>

                    <div class="col-md-8 py-2">
                        <div class="form-group"></div>
                        <label for="gender">Gender:</label>
                        <select name="gender" id="" class="form-control">
                            <option value="select">--Select Gender--</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-8 py-2">
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                    </div>

                    <div class="col-md-8 py-2">
                        <div class="form-group">
                            <label for="">Confirm Password:</label>
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Re-type Password">
                        </div>
                    </div>

                    <div class="col-md-8 d-grid py-2">
                        <div class="form-group"></div>
                        <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                    </div>


                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>
</html>