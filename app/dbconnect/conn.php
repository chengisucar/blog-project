<?php

//  echo phpinfo();

// connect to the database
$conn = mysqli_connect('db', 'php_user', 'password', 'php_db');

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
} 

?>