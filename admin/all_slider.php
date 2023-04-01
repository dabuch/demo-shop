<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>
<?php include './admin_config.php';?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ALL CATEGORIES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_home.php">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">All Categories</li>
        </ol>
        <a href="add_slider.php" class="btn btn-primary" width="200px" style="float: right;">Add Slider</a>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

        <?php if(isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>

            <div class="card-body">
              <h5 class="card-title">ALL CATEGORIES</h5>
              <p>Here's list of all  <code>CATEGORIES</code> including Mobile Phones, Laptops, & Watches.</p>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col-3">#</th>
                    <th scope="col-3">Photo</th>
                    <th scope="col-3">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $sql = "SELECT * FROM slider";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
                                  
                    ?>
                        
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><img src="<?php echo $row['image_path']; ?>" width="60"></td>
                      <td style="display:inline-flex;">
                        <a href="delete_slider.php?id=<?php echo $row['id']; ?>" class="badge bg-danger" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
                      </td>
                    </tr>

                    <?php
                      }
                  ?>   

                </tbody>
              </table>
              <!-- End Bordered Table -->

            </div>
       
        </div>

      </div>
    </section>

       
  </main><!-- End #main -->

<?php include './admin_footer.php';?>