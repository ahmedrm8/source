<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat = $_POST['cat'];

$imgName = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];

/**
 * 
 * 1 - check if image uploaded
 * 2 - check extension
 * 3 - check size 
 * 4 - random image name
 * 5 - move uploaded file
 * 6 - insert into table 
 * */

// 1 - check if image uploaded
if ($_FILES['img']['error'] == 0 ) {

	// 2 - check extension
	$extensions = ['jpg','png','gif'];
	$ext = pathinfo($imgName , PATHINFO_EXTENSION);

	if (in_array($ext, $extensions)) {

		// 3 - check size

		if ($_FILES['img']['size'] < 2000000) {

			//4 - random image name
			
			$newName = md5(uniqid()) . "." . $ext ;

			
			move_uploaded_file($temp, "../images/$newName");	

		} else {

			echo 'file size is too big';
			exit();

		}

	} else {

		echo 'wrong file extesnios';
		exit();
	}

} else {

	echo "you must upload an image";
	exit();
}




include 'connect.php';

$insert = "INSERT INTO products (name , price , sale , cat_id , images) VALUES ('$name' , '$price' , '$sale' , '$cat' , '$newName')";

$query = $conn -> query($insert);

if ($query) {

	header("location: ../products.php");

} else {

	echo $conn -> error ;

}