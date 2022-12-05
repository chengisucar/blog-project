<?php

include($_SERVER["DOCUMENT_ROOT"].'/app/dbconnect/conn.php');

$errors = array('name' => '', 'email' => '', 'hobbies' => '');
$values = array('name' => '', 'email' => '', 'hobbies' => '');

//first check if form is submitted
if(isset($_POST['submit'])){
    
    
    
    //validate name
    if (empty($_POST['name']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])){
        $errors['name'] = 'field is empty or invalid. Use only letters and spaces';
        $values['name'] = htmlspecialchars($_POST['name']);
    } else {
        $values['name'] = htmlspecialchars($_POST['name']);
    }

    //validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'field is empty or invalid. Insert a valid email';
        $values['email'] = htmlspecialchars($_POST['email']);
    } else {
        $values['email'] = htmlspecialchars($_POST['email']);
    }

    //validate article
    if (empty($_POST['hobbies']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['hobbies'])){
        $errors['hobbies'] = 'field is empty or invalid. Use only letters and spaces';
        $values['hobbies'] = htmlspecialchars($_POST['hobbies']);
    } else {
        $values['hobbies'] = htmlspecialchars($_POST['hobbies']);
    }

    
    if(!array_filter($errors)){

        $values['email'] = mysqli_real_escape_string($conn, $_POST['email']);
        $values['name'] = mysqli_real_escape_string($conn, $_POST['name']);
        $values['hobbies'] = mysqli_real_escape_string($conn, $_POST['hobbies']);

        $sql = "INSERT INTO users(name, hobbies) VALUES('$values[name]', '$values[hobbies]')";

        if(mysqli_query($conn, $sql)) {
            header('Location: ../index.php');
        } else {
            echo nl2br("Query error: \n").mysqli_error($conn);
        }

    }

}
            


?>

<!DOCTYPE html>
<html>
	
	<?php include($_SERVER["DOCUMENT_ROOT"].'/app/templates/header.php'); ?>

    <section class="container grey-text">
		<h4 class="center">Add Your Article</h4>
		<form class="white" action="add.php" method="POST">
            <label>Name</label>
			<input type="text" name="name" value='<?php echo $values['name']; ?>'>
            <div class="red-text"><?php echo $errors['name'] ?></div>
			<label>Email</label>
			<input type="text" name="email"value='<?php echo $values['email']; ?>'>
            <div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Hobbies</label>
			<input type="text" name="hobbies" value='<?php echo $values['hobbies']; ?>'>
            <div class="red-text"><?php echo $errors['hobbies']; ?></div>
			<div class="center">
                <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>

	</section>

	<?php include($_SERVER["DOCUMENT_ROOT"].'/app/templates/footer.php'); ?>

</html>