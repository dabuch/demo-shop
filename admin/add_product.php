
<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

<?php
include 'admin_config.php';

if (isset($_POST['add'])) {
  $id        = $_POST['id'];
  $category_name = $_POST['category_name'];
  $name        = $_POST['name'];
  $brand       = $_POST['brand'];
  $memory      = $_POST['memory'];
  $price       = $_POST['price'];
  $feature       = $_POST['feature'];
  $details     = $_POST['details'];

  $photo=$_FILES['image']['name'];
  $upload="uploads/".$photo;

  if (empty($category_name) || empty($name) || empty($brand) || empty($memory) || empty($price) || empty($feature) ||
    empty($details) || empty($photo)) {

      $_SESSION['message'] = "Please fill all fields!"; 
      exit(); 

  } else {

    // form validation: ensure that the form is correctly filled
    $sql = "INSERT INTO products(id,category_name,name,brand,memory,price,feature,details,photo)
    VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("issssssss",$id,$category_name,$name,$brand,$memory,$price,$feature,$details,$upload);       
    $stmt->execute();
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

    $_SESSION['message'] = "Product Added Successfully!"; 
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
    <div

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <?php include ('message.php'); ?>

            <div class="card">
              <div class="card-body">
                <a href="add_product.php" class="btn btn-primary m-3" width="200px">Add New Product</a>
                <hr>

                <!-- No Labels Form -->
                  <form action="./add_product.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="col-md-6">
                        <label for="category_name" class="form-label">Category</label>
                        <select id="inputState" name="category_name" class="form-select">
                            <option selected disabled value="">Select Category</option>
                            <option value="Phones">Phones</option>
                            <option value="Laptops">Laptops</option>
                            <option value="Watches">Tablets</option>
                            <option value="Games">Fairly Used</option>
                            <option value="Phones">Accessory</option>
                            <option value="Watches">Watches</option>
                            <option value="Games">Games</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                    </div>

                    <div class="col-md-6">
                        <label for="brand" class="form-label">Brand</label>
                        <select id="inputState" name="brand" class="form-select">
                            <option selected disabled value="">Select Brand</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Huawei">Huawei</option>
                            <option value="Infinix">Infinix</option>
                            <option value="Tecno">Tecno</option>
                            <option value="Redmi">Redmi</option>
                            <option value="Oppo">Oppo</option>
                            <option value="HP">HP</option>
                            <option value="Dell">Dell</option>
                            <option value="Toshiba">Toshiba</option>
                            <option value="Google">Google</option>
                            <option value="Sony">Sony</option>
                            <option value="HTC">HTC</option>
                            <option value="Motorola">Motorola</option>
                            <option value="Microsoft">Microsoft</option>
                            <option value="Nokia">Nokia</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="memory" class="form-label">Memory Size</label>
                        <select id="inputState" name="memory" class="form-select">
                            <option selected disabled value="">Select Memory Size</option>
                            <option value="64 GB">64 GB</option>
                            <option value="128 GB">128 GB</option>
                            <option value="256 GB">256 GB</option>
                            <option value="512 GB">512 GB</option>
                            <option value="1 TB">1 TB</option>
                            <option value="2 TB">2 TB</option>
                            <option value="3 TB">3 TB</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price">
                    </div>

                    <div class="col-md-6">
                        <label for="color" class="form-label">Feature</label>
                        <select id="inputState" name="feature" class="form-select">
                            <option selected disabled value="">Is Featured?</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="details" class="form-label">Description</label>
                        <textarea id="default" class="form-control" rows="8" name="details"></textarea>
                    </div><br><br>

                    <div class="col-md-6 justify-content-center">
                        <label for="customFile" class="form-label">Photo</label>
                        <input type="file" name="image" class="custom-file">
                    </div><br><br>

                    <div class="text-center">
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Product">
                        <input type="reset" name="clear" class="btn btn-secondary btn-block" value="Reset Product">
                    </div>
                  </form>
                  <!-- End No Labels Form -->
                  <?php 
                   $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                   if (strpos($fullUrl, "add_product=empty") == true) {
                    echo "<p style=color:red;>You did not fill all forms!</p>";
                    exit();
                   }
                  ?>
              </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php include './admin_footer.php';?>

