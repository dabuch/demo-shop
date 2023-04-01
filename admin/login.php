<?php
  session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include "./admin_config.php";

   $msg = "";

if (isset($_POST['login-btn'])) {
    
    $username   = $_POST['username'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $usertype   = $_POST['usertype'];

    // prepare and bind
    $sql = "SELECT * FROM users WHERE username=? AND usertype=? LIMIT 1"; 
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss", $username, $usertype);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
           
    session_regenerate_id();
    if($row){
    $_SESSION['username'] = $row['username'];
    $_SESSION['role']     = $row['usertype'];
    }
       
    session_write_close();

    if (password_verify($password, $hash_password) && $result->num_rows==1 && $_SESSION['role']=="admin") {
        header("Location: ./admin_home.php");

    } else if ($result->num_rows==1 && $_SESSION['role']=="staff") {
        header("Location: ./staff_home.php");

    } else {
        echo "Username or Password is incorrect";
    } 

}

?>

<html>
   <title>Admin Login</title>
    <head>
     <link rel="stylesheet" type="text/css" href="css/index.css">
     <link rel="stylesheet" type="text/css" href="css/page.css">
     <link rel="shortcut icon" href="images/">
     <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    </head>

    <!DOCTYPE html>
<html lang="en">

 
    <body>



        <div class="container justify-content-center mt-5 mb-3">
            <div class="row justify-content-center">

                <article style="width: 500px;">
                    <form action="../admin/login.php" method="POST" >
                        <center><h3 style="color: #051547;">Admin Login</h3><hr style=
                        "border: 1px solid black;"> </center> 

                        <center>
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div></center>

                        <center>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div></center>

                        <center>
                        <div class="col-md-12">
                            <label for="usertype" class="form-label">I'm a : </label>
                            <input type="radio" name="usertype" value="admin" class="custom-radio"> &nbsp; Admin |
                            <input type="radio" name="usertype" value="staff" class="custom-radio"> &nbsp; Staff 
                        </div>
                        </center>

                        <center><button class="btn btn-danger btn-block" type="submit"
                        name="login-btn">Submit</button>   </center>
                    </form>
                <h5 class="text-danger text=center"><?= $msg; ?></h5>
                </article>

            </div>

        </div> <!-- /container -->



    <style>
    article{
    
    line-height: 40px;
    color:#333;
    width: 95%;
    margin: 0px auto;
    font-size: 14px;
    margin-top: 80px;
    margin-bottom: 100px;
    background-color: #F5F5F5;
    text-align: justify;  
    padding: 50px;
    box-shadow: 1px 1px 7px rgba(0,0,0,0.6);
    border-radius: 15px;
  }
    </style>



