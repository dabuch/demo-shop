    <?php include 'header.php'; ?>

    <div class="container mb-3">
        <div class="row">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row mt-3 mb-3">
                        <div class="preview col-md-5"> 
                            <?php 
                                $conn = new mysqli("localhost", "root", "", "kennomej_db");
                                if($conn->connect_error){
                                    die("Failed to connect!".$conn->connect_error);
                                }
                                if(isset($_POST['submit'])) {
                                    $data=$_POST['search'];
                                    $sql="SELECT * FROM products WHERE name='$data'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();

                                    $id = $row['id'];
                                    $category_name = $row['category_name'];
                                    $name = $row['name'];
                                    $brand = $row['brand'];
                                    $memory = $row['memory'];
                                    $price = $row['price'];
                                    $feature = $row['feature'];
                                    $details= $row['details'];
                                    $photo = $row['photo'];

                            ?>                          
                            <div class="preview-pic tab-content">
                                <centere><img src="admin/<?= $row['photo']; ?>" width="400"></centere>                               
                            </div>                           
                        </div>
                        <div class="details col-md-7">
                            <h3 class="product-title" style="color:black;"><?= $name; ?></h3>
                            <h6 style="color:red;"><?= $brand; ?><span> Product </span></h6>
                            <h5 class="price" style="color:black;">Price : ₦ <span><?= $price; ?></span></h5>
                            <h5 class="sizes" style="color:black;">Memory Size : <?= $memory; ?></h5>
                            <h5 class="colors" style="color:black;">Category : <?= $category_name; ?></h5>
                            <h5 class="colors" style="color:black;">Description : </h5> 
                            <h6 style="color:black;"><?= $details; ?></h6>
                            <div class="action">
                                <button class="add-to-cart btn btn-danger" type="button" href="https://wa.me/+23408032434953/?text=urlencodedtext">WhatsApp Us</button>
                                <button class="like btn btn-danger" type="button"><span class="bi bi-heart"></span></button>
                            </div>

                        </div>


                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php';?>



