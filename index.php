<?php 

require 'config.php';



 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Document</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>
 <body>


 	<?php 
 	$pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
 	$pdostatement -> execute();
 	$result = $pdostatement->fetchALL();
 	 ?>
 	<div class="card">
 		<div class="card-body">
 			<h2>Todo Home Page</h2>
 			
 			<div>
 				<a href="add.php" type="button" class="btn btn-success">Create New</a>
 			</div>
 			<br>
 			<table class="table table-striped">
 				<thead>
 					<tr>
 						<th>ID</th>
 						<th>Description</th>
 						<th>Created</th>
 						<th>Actions</th>

 					</tr>

 				</thead>
 				<tbody>
 					<?php 
 					$i=1;
 					if($result){
 						foreach($result as $value){

 					?>
 					<tr>
 						<td><?php echo $i; ?></td>
 						<td><?php echo $value['title'] ?></td>
 						<td><?php echo $value['description'] ?></td>
 						<td><?php echo date('m-d-Y',strtotime($value['created_at'])) ?></td>
 						<td>
 							<a href="edit.php?id=<?php echo $value['id']; ?>" type="button" class="btn btn-warning">Edit</a>
 							<a href="delete.php?id=<?php echo $value['id']; ?>" style="color:red" type="button" class="btn btn-danger">delete</a>
 						</td>
 					</tr>
 					<?php 
 					$i++;
 					 
 						}
 					
 					}
 					?>
 				</tbody>

 			</table>
 		</div>
 	</div>
 	
 </body>
 </html>