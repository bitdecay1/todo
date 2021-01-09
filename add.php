<?php 
require 'config.php';

if ($_POST){
	$title = $_POST['title'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
	#this $pdo is taking query from config.php
	#'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD,$options
	$pdostatement = $pdo->prepare($sql); 
	$result = $pdostatement->execute(
		array(
			':title'=>$title,
			':description'=>$desc
		)
	);
	if($result){
		echo "<script> alert('New ToDo is added');window.location.href='index.php'; </script>";
	}
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Create New</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>
 <body>
 	<div class="card">
 		<div class="card-body">
 			<h2>Create New ToDo</h2>
 			<form action="add.php" class="" method="post">
 				<div class="form-group">
 					<label for=""> Title </label>
 					<input type="text" class="form-control" name="title" value="" required>

 				</div>

 				<div class="form-group">
 					<label for=""> Description </label>
 					<textarea name="description" class="form-control" cols="80" rows="8"></textarea>

 				</div>

 				<div class="form-group"> 
 					<input type="submit" class="btn btn-primary" name="" value="submit">
 					<a href="index.php" type="button" class="btn btn-warning" name=""> Back </a>
 				</div>
 			</form>
 		</div>
 		
 	</div>
 </body>
 </html>