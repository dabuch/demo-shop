<?php
include './admin_config.php';

    $update="false";
        $category_name = '';
        $name        = '';
        $brand       = '';
        $memory      = '';
        $price       = '';
        $color       = '';
        $details     = '';
        $photo       ='';


    if (isset($_POST['add'])) {
        
        $category_name = $_POST['category_name'];
        $name        = $_POST['name'];
        $brand       = $_POST['brand'];
        $memory      = $_POST['memory'];
        $price       = $_POST['price'];
        $color       = $_POST['color'];
        $details     = $_POST['details'];

        $photo=$_FILES['photo']['name'];

        $temp_name  =$_FILES['photo']['tmp_name'];

        // form validation: ensure that the form is correctly filled
        $sql = "INSERT INTO products (category_name, name, brand, memory, price, color, details, photo)
        VALUES (?,?,?,?,?,?,?,?)";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssssssss", $category_name, $name, $brand, $memory, $price, $color, $details, $photo);       
        $stmt->execute();

        move_uploaded_file($temp_name,"uploads/$photo");

        header('Location: add_product.php');
        
        $_SESSION['response'] = "Registered Successfully";
        $_SESSION['res_type'] = "Success";
    
    }
    if(isset($_GET['edit'])) {
      $id=$_GET['edit'];
    
      $sql="SELECT * FROM products WHERE id=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result=$stmt->get_result();
      $row=$result->fetch_assoc();
    
      $id=$row['id'];
      $category_name=$row['category_name'];
      $name   =$row['name'];
      $brand  = $row['brand'];
      $memory =$row['memory'];
      $price  = $row['price'];
      $color  = $row['color'];
      $details=$row['details'];
      $photo=$row['photo'];
    
    }     
    if(isset($_POST['update'])){
      $id           =$_POST['id'];       
      $category_name= $row['category_name'];
      $name         = $row['name'];
      $brand        = $row['brand'];
      $memory        = $row['memory'];
      $price        = $row['price'];
      $color        = $row['color'];
      $details      = $row['details'];
      $oldimage     = $row['oldimage'];
    
      if(isset($_FILES['photo']['name'])&&($_FILES['photo']['tmp_name']!="")){
        $newimage=$_FILES['photo']['name'];
    
        $temp_name  =$_FILES['photo']['tmp_name'];
        unlink($oldimage);
    
        move_uploaded_file($temp_name,"uploads/$newimage");
      }
      else {
          $oldimage = $newimage;
      }
    
      $sql = "UPDATE products SET category_name=?, name=?, model=?, details=?, photo=? WHERE id=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("sssssi", $category_name, $name, $model, $details, $photo, $id);
      $stmt->execute();
    
      header('Location: add_product.php');
      $_SESSION['response'] = "Product Updated Successfully";
      $_SESSION['res_type'] = "success";

    }
    if(isset($_GET['details'])){
        $id = $_GET['details'];
        $sql = "SELECT * FROM products WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $vid = $row['id'];
        $vcategory_name = $row['cateegory_name'];
        $vname = $row['name'];
        $vbrand = $row['brand'];
        $vmemory = $row['memory'];
        $vprice = $row['price'];
        $vcolor = $row['color'];
        $vdetails= $row['details'];
        $vphoto = $row['photo'];
    }
?>