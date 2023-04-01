<?php include 'header.php'; ?>
<?php include './config.php';?>

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
        $vcategory_name = $row['category_name'];
        $vname = $row['name'];
        $vbrand = $row['brand'];
        $vmemory = $row['memory'];
        $vprice = $row['price'];
        $vdetails= $row['details'];
        $vphoto = $row['photo'];
    }
    
?>

	<div class="container mb-3">
        <div class="row">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row mt-3 mb-3">
                        <div class="preview col-md-5">
                            
                            <div class="preview-pic tab-content">

                                <centere><img src="admin/<?= $row['photo']; ?>" width="400"></centere>
                                
                            </div>
                            
                        </div>
                        <div class="details col-md-7">
                            <h3 class="product-title" style="color:black;"><?= $vname; ?></h3>
                            <h6 style="color:red;"><?= $vbrand; ?><span> Product </span></h6>
                            <h5 class="price" style="color:black;">Price : ₦ <span><?= $vprice; ?></span></h5>
                            <h5 class="sizes" style="color:black;">Memory Size : <?= $vmemory; ?></h5>
                            <h5 class="colors" style="color:black;">Category : <?= $vcategory_name; ?></h5>
                            <h5 class="colors" style="color:black;">Description : </h5> 
                            <h6 style="color:black;"><?= $vdetails; ?></h6>
                            <div class="action">
                                <button class="add-to-cart btn btn-danger" type="button" href="https://wa.me/+23408032434953/?text=urlencodedtext">WhatsApp Us</button>
                                <button class="like btn btn-danger" type="button"><span class="bi bi-heart"></span></button>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>

<script src="./assets/js/main.js"></script>









