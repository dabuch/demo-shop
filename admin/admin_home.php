
<?php include '../admin/admin_header.php';?>
<?php include '../admin/admin_sidebar.php';?>
<?php include '../admin/admin_config.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_home.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Categories</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-ui-checks-grid"></i>
                    </div>
                    <?php 
                      $query = "SELECT * FROM category";
                      $query_result = mysqli_query($conn, $query);
                      if($category_total = mysqli_num_rows($query_result))
                      {
                        echo '<div class="ps-3"><h6>'.$category_total.'</h6></div>';
                      }
                      else
                      {
                        echo '<h6>No Data Found</h6>';
                      }
                    ?>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Products</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM users";
                        $query_result = mysqli_query($conn, $query);
                        if($users_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$users_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Phones</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-phone"></i>
                    </div>
                    <?php 
                      $query = "SELECT * FROM products WHERE category_name='phones'";
                      $query_result = mysqli_query($conn, $query);
                      if($product_total = mysqli_num_rows($query_result))
                      {
                        echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                      }
                      else
                      {
                        echo '<h6>No Data Found</h6>';
                      }
                    ?>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Laptops</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-laptop"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products WHERE category_name='laptops'";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Tablets</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products WHERE category_name='tablets'";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Games</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-video3"></i>
                    </div>
                    <?php 
                      $query = "SELECT * FROM products WHERE category_name='games'";
                      $query_result = mysqli_query($conn, $query);
                      if($product_total = mysqli_num_rows($query_result))
                      {
                        echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                      }
                      else
                      {
                        echo '<h6>No Data Found</h6>';
                      }
                    ?>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Fairly Used</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-phone-vibrate"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products WHERE category_name='fairly used'";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Watches</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-watch"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products WHERE category_name='watches'";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Accessory</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-plug-fill"></i>
                    </div>
                    <?php 
                      $query = "SELECT * FROM category WHERE category_name='accessory'";
                      $query_result = mysqli_query($conn, $query);
                      if($product_total = mysqli_num_rows($query_result))
                      {
                        echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                      }
                      else
                      {
                        echo '<h6>No Data Found</h6>';
                      }
                    ?>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Products</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM products";
                        $query_result = mysqli_query($conn, $query);
                        if($product_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$product_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Number Of Slider</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-images"></i>
                    </div>
                      <?php 
                        $query = "SELECT * FROM slider";
                        $query_result = mysqli_query($conn, $query);
                        if($slider_total = mysqli_num_rows($query_result))
                        {
                          echo '<div class="ps-3"><h6>'.$slider_total.'</h6></div>';
                        }
                        else
                        {
                          echo '<h6>No Data Found</h6>';
                        }
                      ?>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

<?php include 'admin_footer.php';?>