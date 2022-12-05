<?php

// connect to the database
$conn = mysqli_connect('db', 'php_docker', 'password', 'php_docker');

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

?>