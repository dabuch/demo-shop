<?php include 'header.php'; ?>
<?php include './config.php'; ?>
<?php 
    if(isset($_GET['details'])){
        $id = $_GET['details'];
        $sql = "SELECT * FROM category WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $vid = $row['id'];
        $vcategory_name = $row['category_name'];
        $vname = $row['name'];
        $vbrand = $row['brand'];
        $vmemory = $row['memory'];
        $vprice = $row['price'];
        $vcolor = $row['color'];
        $vdetails= $row['details'];
        $vphoto = $row['photo'];
    }
    
?>

  <main class="container">

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              <?php
                $sql = "SELECT * FROM slider ORDER BY id DESC LIMIT 6";
                $stmt=$conn->prepare($sql);
                $stmt->execute();
                $result=$stmt->get_result();
                $row=$result->fetch_assoc();


                $i = 0;
                foreach ($result as $row) {
                    $actives = '';
                    if($i == 0){
                    $actives = 'active';
                }                                      
              ?>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?= $i; ?>" class="<?= $actives; ?>" aria-current="true" aria-label="Slide 1"></button>
              <?php $i++; } ?>
          </div>
          <div class="carousel-inner">
            <?php
              $i = 0;
              foreach ($result as $row) {
                  $actives = '';
              if($i == 0){
                  $actives = 'active';
              }                                      
              ?>
              <div class="carousel-item <?=$actives; ?>">
                  <img src="admin/<?= $row['image_path']; ?>" width="100%" height="450px">
              </div>
              <?php $i++; } 
            ?>
              
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
        </div>


        <hr>

        <div class="panel bg-danger">
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; color: white;"> CATEGORIES </h3>
          </div>
        </div>

        <div class="container">          
          <div class="row">
            <div class="owl-carousel">
              <?php 
              $category_query = "SELECT * FROM `category` LIMIT 8";
              $category_result = mysqli_query($conn, $category_query);
              if(mysqli_num_rows($category_result) > 0) 
                {
                  foreach ($category_result as $item)
                  {
                  ?>     
                  <div class="item">
                    <div class="card">
                      <img src="admin/<?= $item['photo'];?>" width="100%" height="200px" alt="products image">
                      <a href="" class="w-100 btn btn-lg btn-danger text-light" width=100% ><?=$item['category_name'];?></a>
                    </div>
                  </div>
                  
                  <?php
                  }
                }
              ?>
            </div>
          </div>
        </div>

        <div class="panel bg-danger">
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; color: white;"> FEATURED PRODUCTS</h3>
          </div>
        </div>

        <div class="p-2 p-md-2 mb-2 text-white rounded bg-dark">
          <div class="container">          
            <div class="row text-center">
              <div class="owl-carousel">
                <?php
                $category_query = "SELECT * FROM `products` WHERE feature='Yes' LIMIT 20";
                $category_result = mysqli_query($conn, $category_query);
                if(mysqli_num_rows($category_result) > 0) 
                  {
                    foreach ($category_result as $item)
                    {
                    ?>     
                    <div class="item">
                      <div class="card">
                        <img src="admin/<?= $item['photo'];?>" width="100%" height="200px" alt="products image">
                        <p class="card-title" style="color: black;"><strong><?php echo substr($item['name'], 0, 25);?></strong></p>
                        <p class="card-title" style="color: red;"><strong><?=$item['brand'];?></strong></p>
                        <p class="card-title" style="color: red;"><strong>₦<?=$item['price'];?></strong></p>
                        <a href="details.php?details=<?= $item['id']; ?>" class="w-100 btn btn-lg btn-danger text-light" width=100% style="padding:10px;" >View Detail</a>
                      </div>
                    </div>
                    
                    <?php
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>

        <hr>

        <div class="panel bg-danger">
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center; color: white;"> OUR PRODUCTS </h3>
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

            <div class="row mt-1 mb-3 text-center">
              <?php 

                $product_query = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
                $product_result = mysqli_query($conn, $product_query);
                $product_check = mysqli_num_rows($product_result) > 0;  
                      
                if($product_check)
                  {
                    while($row = mysqli_fetch_array($product_result))
                    {
                    ?>
                    <div class="col-md-3 mt-1">
                      <div class="card">
                        <img src="admin/<?=$row['photo'];?>" width="100%" height="250px" alt="products image">
                        <div class="card-body">
                          <p class="card-title" style="color: black;"><strong><?php echo substr($row['name'], 0, 25);?></strong></p>
                          <p class="card-title" style="color: chocolate;"><strong><?=$row['brand'];?></strong></p>
                          <p class="card-title" style="color: chocolate;"><strong>₦<?=$row['price'];?></strong></p>
                          <a href="details.php?details=<?= $row['id']; ?>" class="w-100 btn btn-lg btn-danger text-light" width=100%>View Detail</a>
                        </div>
                      </div>
                    </div>
                    <?php
                      }
                    }
                    else
                    {
                      echo 'No Product Found';
                  }
                ?>

            </div>
         
            <center><a href="our_products.php" class="btn btn-danger" width="200px">View More Products</a></center>

        </div><br>

        <div class="container">
          <div class="panel bg-danger" style="margin: 5px;">
              <div class="panel-heading">
                  <h3 class="panel-title" style="text-align: center; color: white;"> BRANDS WE SELL </h3>
              </div>
          </div>
          <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="images/Brand-design/hp-logo.png" width="150">
                  </div>
                  <div class="swiper-slide">
                      <img src="images/Brand-design/apple-logo.png" width="150">
                  </div>
                  <div class="swiper-slide">
                      <img src="images/Brand-design/infinix.png" width="150">
                  </div>
                  <div class="swiper-slide">
                      <img src="images/Brand-design/huawei-logo1.png" width="150">
                  </div>
                  <div class="swiper-slide">
                      <img src="images/Brand-design/tecno-logo1.png" width="150">
                  </div>
                  <div class="swiper-slide">
                      <img src="images/Brand-design/Samsung-logo1.png" width="150">
                  </div>

              </div>
          <div class="swiper-pagination"></div>
        </div><br>

  </div>

<?php include 'footer.php';?>

  <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel();
    });
  </script>

<script>
     $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        speed: 3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
    </script>

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


