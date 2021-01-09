<?php 
require 'config.php';
if ($_POST) {
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$id = $_POST['id'];

	$pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' where id='id'");
	$result = $pdostatement->execute();

} else {
	$pdostatement = $pdo->prepare("SELECT * FROm todo WHERE id=".$_GET['id']);
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();	


}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Edit New</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>
 <body>
 	<div class="card">
 		<div class="card-body">
 			<h2>Create New ToDo</h2>
 			<form action="" class="" method="post">
 				<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
 				<div class="form-group">
 					<label for=""> Title </label>
 					<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>

 				</div>

 				<div class="form-group">
 					<label for=""> Description </label>
 					<textarea name="description" class="form-control" cols="80" rows="8"><?php echo $result[0]['description'] ?></textarea>

 				</div>

 				<div class="form-group"> 
 					<input type="submit" class="btn btn-primary" name="" value="UPDATE">
 					<a href="index.php" target="" ype="button" class="btn btn-warning" name=""> Back </a>
 				</div>
 			</form>
 		</div>
 		
 	</div>
 </body>
 </html>