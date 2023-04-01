<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Product Detail Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      <hr>

      <section class="section">
        <div class="row justify-content-center m-1">

          <div class="col-md-10 justify-content-center">


            <div class="card">
            <?php

              include 'admin_config.php';

              $id = $_GET['id'];

              $sql = "SELECT * FROM `products` WHERE id = $id LIMIT 1";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

              $vid = $row['id'];
              $vcategory_name = $row['category_name'];
              $vname = $row['name'];
              $vbrand = $row['brand'];
              $vmemory = $row['memory'];
              $vprice = $row['price'];
              $vfeature = $row['feature'];
              $vdetails= $row['details'];
              $vphoto = $row['photo'];

              ?>
              <img src="<?= $vphoto; ?>" width="100%">
              <div class="card-body">
                <h5 class="card-title" style="color: black;"><strong>ID :</strong> <?= $vid; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Category : </strong><?= $vcategory_name; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Name : </strong><?= $vname; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Brand :</strong> <?= $vbrand; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Memory : </strong><?= $vmemory; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Price : </strong><?= $vprice; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Feature : </strong><?= $vfeature; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Details : </strong><?= $vdetails; ?></h5>
                
              </div>
            </div>

          </div>

        </div>
      </section>

</main><!-- End #main -->

<?php include 'admin_footer.php';?>
