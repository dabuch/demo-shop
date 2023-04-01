<?php include './admin_header.php';?>
<?php include './admin_sidebar.php';?>
<?php include './admin_config.php';?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>ALL PRODUCTS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_home.php">Home</a></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">All Products</li>
        </ol>
        <a href="add_product.php" class="btn btn-primary" width="200px" style="float: right;">Add Product</a>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">
            <div class="card-body">
              <h5 class="card-title">ALL PRODUCTS</h5>
              <p>Here's list of all  <code>PRODUCTS</code> including Mobile Phones, Laptops, & Watches.</p>
              <!-- Bordered Table -->

              <table class="table table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category </th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Memory</th>
                    <th scope="col">Price (₦)</th>
                    <th scope="col">Feature</th>
                    <th scope="col">Details</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM products ORDER BY id DESC";
                  $result = mysqli_query($conn, $sql);

                  while($row = mysqli_fetch_assoc($result)) {
                                
                  ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['memory']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['feature']; ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td><img src="<?php echo $row['photo']; ?>" width="60"></td>
                    <td style="display:inline-flex; height:auto">
                      <a href="admin_details.php?id=<?php echo $row ['id']; ?>"><i class="bi bi-eye" style="color:green"></i></a>&nbsp; &nbsp; &nbsp; 
                      <a href="edit_product.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square" style="color:blue"></i></a> &nbsp; &nbsp; &nbsp;
                      <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to delete this record?');"><i class="bi bi-trash" style="color:red"></i></a>
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

<script type="text/javascript">
    $(document).ready(function(){
      $('table').DataTable();
    });
</script>