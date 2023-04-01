<?php 

  include 'admin_config.php';

    $update=false;
    $id="";
    $category_name ="";
    $photo="";
  
    if(isset($_GET['id'])) {
      $id=$_GET['id'];
  
      $sql="SELECT * FROM category WHERE id=?";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result=$stmt->get_result();
      $row=$result->fetch_assoc();

      $id = $row['id'];
      $category_name = $row['category_name'];
      $photo =$row['photo'];
      
  }
  
    if(isset($_POST['update_cat'])){

        $id            = $_POST['id'];
        $category_name = $_POST['category_name'];
        $oldimage      = $_POST['oldimage'];
  
        if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
          $newimage="uploads/".$_FILES['image']['name'];
          unlink($oldimage);
          move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
        }
         else{
             $newimage=$oldimage;
          }
        // form validation: ensure that the form is correctly filled
        $sql="UPDATE category SET category_name=?,photo=? WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("ssi",$category_name,$newimage,$id);       
        $stmt->execute();
  
        header ("Location: edit_category.php?msg=Product Updated Successfully");
        $_SESSION['message'] = "Product Updated Successfully!";
    
      }

?>

<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Edit Category Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <?php include './message.php'; ?>

            <div class="card">
              <div class="card-body">
              <a href="add_category.php" class="btn btn-primary m-3" width="200px" >Add New Category</a>
              <hr>
                <!-- No Labels Form -->
                  <form action="./edit_category.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="col-md-12">
                        <label for="category_name" class="form-label">Category</label>
                        <input type="text" name="category_name" class="form-control" value="<?=$category_name; ?>">
                    </div>

                    <div class="col-md-12 justify-content-center">
                        <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                        <input type="file" name="image" class="custom-file">
                        <img src="<?= $photo; ?>" width="150" class="img-thumbnail">
                    </div><br><br>

                    <div class="text-center">
                        <input type="submit" name="update_cat" class="btn btn-success btn-block" value="Update Category">
                        <input type="reset" name="clear" class="btn btn-secondary btn-block" value="Reset Category">
                    </div>
                  </form><!-- End No Labels Form -->

              </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php include './admin_footer.php';?>