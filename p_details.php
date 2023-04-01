<?php include 'header.php';?>
<?php include './admin/config.php';?>

<?php 
    if(isset($_GET['details'])){
        $id = $_GET['details'];
        $sql = "SELECT * FROM products WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $vid = $row['id'];
        $vcategory_id = $row['category_id'];
        $vname = $row['name'];
        $vbrand = $row['brand'];
        $vmemory = $row['memory'];
        $vdetails= $row['details'];
        $vphoto = $row['photo'];
    }
    
?>

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
        <div class="row justify-content-center m-3">
          <div class="col-lg-8">

            <div class="card">
              <img src="./admin/uploads/<?= $vphoto; ?>" width="100%" height="450px">
              <div class="card-body">
                <h5 class="card-title" style="color: black;"><strong>ID :</strong> <?= $id; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Brand :</strong> <?= $vbrand; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Name : </strong><?= $vname; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Memory : </strong><?= $vmemory; ?></h5>
                <h5 class="card-title" style="color: black;"><strong>Details : </strong><?= $vdetails; ?></h5>
                
              </div>
            </div>

          </div>

        </div>
      </section>



<?php include 'footer.php';?>
