<?php 

  include 'admin_config.php';

    $update=false;
    $id="";
    $category_name ="";
    $name="";
    $brand="";
    $memory="";
    $price="";
    $feature="";
    $details="";
    $photo="";
  
    if(isset($_GET['id'])) {
      $id=$_GET['id'];
  
      $sql="SELECT * FROM products WHERE id=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result=$stmt->get_result();
      $row=$result->fetch_assoc();

      $id = $row['id'];
      $category_name = $row['category_name'];
      $name        = $row['name'];
      $brand       = $row['brand'];
      $memory      = $row['memory'];
      $price       = $row['price'];
      $feature     = $row['feature'];
      $details     = $row['details'];
      $photo       = $row['photo'];
      
  }
  
    if(isset($_POST['update'])){

        $id        = $_POST['id'];
        $category_name = $_POST['category_name'];
        $name        = $_POST['name'];
        $brand       = $_POST['brand'];
        $memory      = $_POST['memory'];
        $price       = $_POST['price'];
        $feature     = $_POST['feature'];
        $details     = $_POST['details'];
        $oldimage    = $_POST['oldimage'];
  
        if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
          $newimage="uploads/".$_FILES['image']['name'];
          unlink($oldimage);
          move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
        }
         else{
             $newimage=$oldimage;
          }
        // form validation: ensure that the form is correctly filled
        $sql="UPDATE products SET category_name=?,name=?,brand=?,memory=?,price=?,feature=?,details=?,photo=? WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssssssssi",$category_name,$name,$brand,$memory,$price,$feature,$details,$newimage,$id);       
        $stmt->execute();
  
        $_SESSION['message'] = "Product Updated Successfully!";
        header ("Location: all_products.php?msg=Product Updated Successfully");
    
      }

?>

<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Edit Product Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <?php include './message.php'; ?>

            <div class="card">
              <div class="card-body">
              <a href="add_product.php" class="btn btn-primary" width="200px" >Add New Product</a>
              <hr>
                <!-- No Labels Form -->
                  <form action="edit_product.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="col-md-6">
                        <label for="category_name" class="form-label">Category</label>
                        <input type="text" name="category_name" class="form-control" value="<?=$category_name; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$name; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" value="<?=$brand; ?>">

                    </div>

                    <div class="col-md-6">
                        <label for="memory" class="form-label">Memory Size</label>
                        <input type="text" name="memory" class="form-control" value="<?=$memory; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="<?=$price; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="feature" class="form-label">Feature</label>
                        <input type="text" name="feature" class="form-control" value="<?=$feature; ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="details" class="form-label">Description</label>
                        <textarea id="default" class="form-control" rows="8" name="details"><?=$details; ?></textarea>
                    </div><br><br>

                    <div class="col-md-6 justify-content-center">
                        <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                        <input type="file" name="image" class="custom-file">
                        <img src="<?= $photo; ?>" width="150" class="img-thumbnail">
                    </div><br><br>

                    <div class="text-center">
                        <input type="submit" name="update" class="btn btn-success btn-block" value="Update Product">
                        <input type="reset" name="clear" class="btn btn-secondary btn-block" value="Reset Product">
                    </div>
                  </form><!-- End No Labels Form -->

              </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php include './admin_footer.php';?>

