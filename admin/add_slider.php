<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

<?php
include 'admin_config.php';

$msg = '';

if (isset($_POST['upload'])) {
    $image= $_FILES['image']['name'];
    $path  = 'uploads/'.$image;

    $sql=$conn->query("INSERT INTO slider (image_path) VALUES ('$path')");

    if($sql){
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $message = 'Image Uploaded Successfully!';
    } else {
        $message = 'Image Upload Failed';
    }

}

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Slider</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Add Slider</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">

        <div class="col-lg-6">

        <?php include ('message.php'); ?>

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add New Slider</h5>

                <!-- No Labels Form -->
                  <form action="./add_slider.php" method="POST" class="row g-3" enctype="multipart/form-data">
                    <div class="text-center">
                        <input type="file" name="image" class="form-control p-1" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" name="upload" class="btn btn-primary btn-block" value="Upload Slider">
                    </div>
                  </form><!-- End No Labels Form -->

              </div>
            </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php include './admin_footer.php';?>