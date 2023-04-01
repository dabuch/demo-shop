
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./config.php";

if (isset($_POST['register_btn'])) {

        $username    = $_POST['username'];
        $email        = $_POST['email'];
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $usertype     = $_POST['usertype'];

        // form validation: ensure that the form is correctly filled

        $sql = "INSERT INTO users (username, email, password, usertype)
        VALUES (?,?,?,?)";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $password, $usertype);
        $stmt->execute();

        $_SESSION['message'] = "Product Updated Successfully!";

        header("Location: admin/login.php");

        
        $conn->close();
    
}

?>



<?php include 'header.php' ;?>

<div class="container">
<center><div class="row" style="width: 600px;">
        <article>
            <form action="register.php" method="POST" class="row g-3">
            <center><h2 style="color: #051547;"> User Registration</h2>
            <hr style="border: 1px solid black;"> </center> 
            <?php if(isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                <b><?= $_SESSION['response']; ?></b>
                </div>
                <?php } unset($_SESSION['response']); ?>

                <div class="col-md-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <center><div class="col-md-12">
                    <label for="usertype" class="form-label">I'm a : </label>
                    <input type="radio" name="usertype" value="admin" class="custom-radio"> &nbsp; Admin |
                    <input type="radio" name="usertype" value="staff" class="custom-radio"> &nbsp; Staff |
                </div></center>

                <center>
                <div class="col-12">
                    <button class="btn btn-danger" type="submit" name="register_btn" 
                    style="margin-top: 20px;"> Register</button>
                </div>
                </center>

            </form>

        </article>
    </div> </center><br><br>

</div> <!-- /container -->

<?php include "footer.php" ;?>


<style>
    article{   
    line-height: 30px;
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
