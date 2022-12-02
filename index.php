<?php 

$servername = "db";
$username = "php_docker";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php_docker", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // sql to create table
  $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;



?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<?php include('templates/footer.php'); ?>

</html>