<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

<?php
include 'admin_config.php';

if (isset($_POST['add'])) {
    
    $id   = $_POST['id'];
    $category_name = $_POST['category_name'];

    $photo= $_FILES['photo']['name'];

    $temp_name  = $_FILES['photo']['tmp_name'];

    // form validation: ensure that the form is correctly filled
    $sql = "INSERT INTO `category`(`id`, `category_name`, `photo`)
    VALUES ('$id', '$category_name', '$photo')";

    move_uploaded_file($temp_name,"uploads/$photo");

    $result = mysqli_query($conn, $sql);
    if($result)
    {
      header ("Location: add_category.php") ;

    } else {
      echo "Something went wrong!";
     
    }

}

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Product Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

        <?php include ('message.php'); ?>

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add New Category</h5>

                <!-- No Labels Form -->
                  <form action="./add_category.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="col-md-6">
                        <label for="category_name" class="form-label">Category</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                    </div>
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6 justify-content-center">
                        <label for="customFile" class="form-label">Photo</label>
                        <input type="file" name="photo" class="custom-file">
                    </div>
                    <div class="col-md-6">

                    </div><br><br>

                    <div class="text-center">
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Category">
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