<?php 

$errors = array('email' => '', 'name' => '', 'article' => '');
//first check if form is submitted
if(isset($_POST['submit'])){
    
    //validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'field is empty or invalid. Insert a valid email';
    } 
    
    //validate name
    if (empty($_POST['name']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])){
        $errors['name'] = 'field is empty or invalid. Use only letters and spaces';
    }

    //validate article
    if (empty($_POST['article']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['article'])){
        $errors['article'] = 'field is empty or invalid. Use only letters and spaces';
    }

}
            


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

    <section class="container grey-text">
		<h4 class="center">Add Your Article</h4>
		<form class="white" action="add.php" method="POST">
            <label>Your Email</label>
			<input type="text" name="email">
            <div class="red-text"><?php echo $errors['email'] ?></div>
			<label>Name</label>
			<input type="text" name="name">
            <div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Article</label>
			<input type="text" name="article">
            <div class="red-text"><?php echo $errors['article']; ?></div>
			<div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>

	</section>

	<?php include('templates/footer.php'); ?>

</html>