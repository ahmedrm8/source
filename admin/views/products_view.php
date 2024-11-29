

		<a class="btn btn-primary" href="?action=add">Add product</a>
		<br>
		<br>
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>price</th>
							<th>sale</th>
							<th>images</th>
							<th>category</th>
							<th>controls</th>
						</tr>
					</thead>
					<tbody>
	<?php 
     
    include "functions/connect.php";
    $readProd = "SELECT * FROM products";
    $queryProd = $conn -> query($readProd);
    foreach ($queryProd as $product){
	?>
		<tr>
			<td><?= $product['id'] ?></td>
			<td><?= $product['name'] ?></td>
			<td><?= $product['price'] ?></td>
			<td><?= $product['sale'] ?></td>
			<td><img width='100px' src="images/<?= $product['images'] ?>" alt=""></td>
			<td><?php

			$cat = $product['cat_id'] ;
			$readCat = "SELECT name FROM categories WHERE id = $cat";
			$queryCat = $conn -> query($readCat);
			$category = $queryCat -> fetch_assoc();
			echo $category['name'];

			 ?></td>
			<td>
				<a class="btn btn-primary" href="?action=edit&id=<?= $product['id']  ?>">Edit</a>	
				

		<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?= $product['id'] ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        are you sure you want to delete <?= $product['name'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="functions/delete_product.php?id=<?= $product['id'] ?>">confirm</a>
      </div>
    </div>
  </div>
</div>

			</td>
		</tr>
	<?php } ?>
					</tbody>
				</table>