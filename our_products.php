<?php include './admin/admin_config.php'; ?>

<?php include 'header.php'; ?>
  <main class="container">

        <div class="panel danger">
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; color: white;"> OUR PRODUCTS</h3>
          </div>
        </div>
        <div class="container">
          <div class="row">

            <div class="col-md-8 offset-md-2">
              <form action="detail.php" class="form-inline p-3" method="POST">
                <input type="text" name="search" id="search" placeholder="Search..." style="width:70%; height:39px;">
                <input type="submit" name="submit" value="Search" class="btn btn-danger btn-lg round-0" style="width:20%; height:39px; padding:2px;">
              </form>
            </div>
            <div class="col-md-4" style="position: relative; margin-top:-8px; margin-left:215px;">
              <div class="list-group" id="show-list">

              </div>
            </div>
          </div>
        </div>

        <hr>

        <div class="container" id="products" style="margin-top: 10px;">

            <div class="row mt-1 mb-3">
                <?php 

                  $results_per_page = 16;

                  $sql = "SELECT * FROM products";
                  $result= mysqli_query($conn, $sql);
                  $number_of_results = mysqli_num_rows($result);
                  $number_of_pages = ceil($number_of_results/$results_per_page);

                    if (!isset($_GET['page'])) {
                        $page = 1;                           
                    } else {
                        $page = $_GET['page'];
                    }

                    $Previous = $page - 1;
                    $Next = $page + 1;

                    $this_page_first_result = ($page-1)*$results_per_page;

                    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT " . $this_page_first_result .',' . $results_per_page;
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                    
                  ?>
                      <div class="col-md-3 mt-1">
                          <div class="card">
                              <img src="admin/<?=$row['photo'];?>" width="100%" height="250px" alt="products image">
                              <div class="card-body p-0">
                                  <h5 class="card-title" style="color: black; text-align:center;"><?php echo substr($row['name'], 0, 18);?></h5>
                                  <h5 class="card-title" style="color: chocolate; text-align:center;"><?=$row['category_name'];?></h5>
                                  <h5 class="card-title" style="color: red; text-align:center;">₦<?=$row['price'];?></h5>
                                  <a href="details.php?details=<?= $row['id']; ?>" class="btn btn-danger d-xl-block">View Detail</a>
                              </div>
                          </div>
                      </div>
                      <?php } ?>
                        
                      <nav aria-label="Page navigation" style="margin-top: 30px;">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                              <a class="page-link" href="our_products.php?page=<?= $Previous; ?>">Previous</a>
                            </li>
                            <?php 
                            for ($page = 1; $page<= $number_of_pages; $page++) : ?>
                            <li class="page-item">
                              <a class="page-link" href="our_products.php?page=<?= $page; ?>"><?= $page; ?></a>
                            </li>
                            <?php endfor; ?>                           
                            <li class="page-item">
                                <a class="page-link" href="our_products.php?page=<?= $Next; ?>">Next</a>
                            </li>
                        </ul>
                      </nav>
                        

            </div>



        </div>


<?php include 'footer.php';?>

<style>
    .active {
        color:white;
        background-color: red;
    }
</style>

<script type="text/javascript">
      $(document).ready(function(){
        $("#search").keyup(function(){
          var searchText = $(this).val();
          if(searchText!=''){
            $.ajax({
              url:'action.php',
              method:'post',
              data:{query:searchText},
              success:function(response){
                $("#show-list").html(response);
              }
            });
          }
          else {
            $("#show-list").html('');
          }
        });
        $(document).on('click','a',function(){
          $("#search").val($(this).text());
          $("#show-list").html('');
        });
      });
    </script>