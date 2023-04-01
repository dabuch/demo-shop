<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Category Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
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

              $sql = "SELECT * FROM `category` WHERE id = $id LIMIT 1";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

              $cid = $row['id'];
              $ccategory_name = $row['category_name'];
              $cphoto = $row['photo'];

              ?>
              <img src="<?= $cphoto; ?>" width="100%">
              <div class="card-body">
                <h5 class="card-title" style="color: black;"><strong>ID :</strong> <?= $cid; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Category : </strong><?= $ccategory_name; ?></h5>                
              </div>
            </div>

          </div>

        </div>
      </section>

</main><!-- End #main -->

<?php include 'admin_footer.php';?>