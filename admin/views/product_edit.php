

<?php

$id = $_GET['id'];

include "functions/connect.php";
$readProd = "SELECT * FROM products WHERE id = $id"; 
$queryProd = $conn -> query($readProd);
$product = $queryProd -> fetch_assoc();

?>

<form method="post" action="functions/update_product.php">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="text" name="price" value="<?= $product['price'] ?>" class="form-control" id="price" >
  </div>
  
  <div class="form-group">
    <label for="sale">sale</label>
    <input type="number" name="sale" value="<?= $product['sale'] ?>" class="form-control" id="sale" >
  </div>

  <div class="form-group">
    <label for="img">img</label>
    <input type="file" name="img" value="" class="form-control" id="img" >
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect1">Categories</label>
    <select name="cat" class="form-control" id="exampleFormControlSelect1">
    <?php 
    include "functions/connect.php";
    $read = "SELECT * FROM categories";
    $query = $conn -> query($read);
    foreach($query as $cat){
    ?>
      <option  
        value="<?= $cat['id'] ?>" 
        <?php

          if ($cat['id'] == $product['cat_id']) {
            echo "selected";
          }

         ?>
      ><?= $cat['name'] ?></option>
    <?php } ?>

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>