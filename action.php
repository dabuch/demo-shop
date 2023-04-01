<?php 
include './config.php';

if(isset($_POST['query'])){
    $inpText=$_POST['query'];
    $query="SELECT name FROM products WHERE name LIKE '%$inpText%'";
    $result = $conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['name']."</a>";
        }
    }
    else {
        echo "<p class='list-group-item-action border-1'>No Product Found!</p>";
    }
}

?>

