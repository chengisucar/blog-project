<?php 

$errors = array('email' => '', 'name' => '', 'article' => '');
$values = array('email' => '', 'name' => '', 'article' => '');

//first check if form is submitted
if(isset($_POST['submit'])){
    
    //validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'field is empty or invalid. Insert a valid email';
        $values['email'] = htmlspecialchars($_POST['email']);
    } else {
        $values['email'] = htmlspecialchars($_POST['email']);
    }
    
    //validate name
    if (empty($_POST['name']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])){
        $errors['name'] = 'field is empty or invalid. Use only letters and spaces';
        $values['name'] = htmlspecialchars($_POST['name']);
    } else {
        $values['name'] = htmlspecialchars($_POST['name']);
    }

    //validate article
    if (empty($_POST['article']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['article'])){
        $errors['article'] = 'field is empty or invalid. Use only letters and spaces';
        $values['article'] = htmlspecialchars($_POST['name']);
    } else {
        $values['article'] = htmlspecialchars($_POST['name']);
    }

    
    if(!array_filter($errors)){
        header('Location: index.php');
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
			<input type="text" name="email" value='<?php echo $values['email']; ?>'>
            <div class="red-text"><?php echo $errors['email'] ?></div>
			<label>Name</label>
			<input type="text" name="name"value='<?php echo $values['name']; ?>'>
            <div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Article</label>
			<input type="text" name="article" value='<?php echo $values['article']; ?>'>
            <div class="red-text"><?php echo $errors['article']; ?></div>
			<div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>

	</section>

	<?php include('templates/footer.php'); ?>

</html>