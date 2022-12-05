<?php 

//connect to db
include('app/dbconnect/conn.php');

// write query for all pizzas
$sql = 'SELECT id, name, hobbies FROM users ORDER BY created_at';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$users = mysqli_fetch_all($result, 1); //used 1 instead of MYSQLI_ASSOC. literally same thing

// free the $result from memory (good practise)
mysqli_free_result($result);

// close connection
mysqli_close($conn);

// print_r($users);

?>

<!DOCTYPE html>
<html>
	
	<?php include('app/templates/header.php'); ?>

	<h4 class="center grey-text">Users</h4>
	<div class="container ">
		<div class="row">

		<?php foreach($users as $user){ ?>
		
			<div class="col s6 md6">
				<div class="card z-depth-6">
					<div class="card-content center">
						<h2><?php echo $user['id']; ?></h2>
						<h4><?php echo $user['name'] ?></h4>
						<ul>
							<?php foreach(explode(' ', $user['hobbies']) as $hobby) :?>
							<li><?php echo $hobby ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="card-action right-align">
						<a href="app/detailpage.php?id=<?php echo $user['id']?>" class="brand-text">more info</a>
					</div>
				</div>
			</div>

		<?php } ?>

		</div>
	</div>
	<?php include('app/templates/footer.php'); ?>

</html>