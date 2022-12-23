<?php

include($_SERVER["DOCUMENT_ROOT"].'/app/dbconnect/conn.php');

//DELETE
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    // write query for deletion
    $sql = "DELETE FROM users WHERE id = $id_to_delete";
    
    // get the result set (set of rows)
   if(mysqli_query($conn, $sql)){
        // echo "User with id:$id_to_delete deleted successfully";
        header('Location: /index.php');
   } else {
        echo "Query error: " . mysqli_error($conn);
   }

    mysqli_close($conn);
}

//GET USER DETAIL
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
  
    // write query for the user detail
    $sql = "SELECT `id`, `name`, `hobbies`, `created_at` FROM users WHERE id = $id";
    
    // get the result set (set of rows)
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $details = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);

    mysqli_close($conn);

    // print_r($details);
    // echo ini_get('include_path');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include($_SERVER["DOCUMENT_ROOT"].'/app/templates/header.php'); ?>

<h3 class="blue-text center">USER DETAILS</h3>
<div class="container left-align">
    <?php if ($details): ?>
        <h2><?php echo htmlspecialchars($details['id']) ?></h2>
        <p>Name: <?php echo htmlspecialchars($details['name'])?></p>
        <p>Creation Date: <?php echo htmlspecialchars($details['created_at'])?></p>
        <ul>Hobbies: 
            <?php foreach (explode(' ', $details['hobbies']) as $detail) :?>
            <li><?php echo $detail ?></li>
            <?php endforeach ?>
        </ul>
        <form action="/app/detailpage.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $details['id']?>">
            <input type="submit" name="delete" value="DELETE" class="btn red z-depth-0">
        </form>

    <?php else : ?>
        <h4>No such record!</h4>
    <?php endif ?>
</div>

<?php include($_SERVER["DOCUMENT_ROOT"].'/app/templates/footer.php'); ?>

</html>