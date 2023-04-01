<?php
 include './admin_config.php';

    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $query = "Select photo FROM products WHERE id=?";
        $stmt2=$conn->prepare($query);
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        $result2=$stmt2->get_result();
        $row=$result2->fetch_assoc();

        $imagepath=$row['photo'];
        unlink($imagepath);

        $sql = "Delete FROM products WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        header('Location: all_products.php');
        $_SESSION['message'] = "Product Deleted Successfully";
    }
    
?>