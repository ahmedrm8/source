

<form method="post" action="functions/insert_product.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" name="name" value="" class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="text" name="price" value="" class="form-control" id="price" >
  </div>
  
  <div class="form-group">
    <label for="sale">sale</label>
    <input type="number" name="sale" value="" class="form-control" id="sale" >
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
      <option value="<?= $cat['id'] ?>" ><?= $cat['name'] ?></option>
    <?php } ?>

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>