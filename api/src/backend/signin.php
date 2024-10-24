<?php

// DB connection
    require('../../config/db_connection.php');

// get data from login form
    $email = $_POST['email'];
    $pass = $_POST['passwd'];
    $enc_pass = md5($pass);

//query
$query = 
    "SELECT * FROM users 
    WHERE email = '$email'
    AND password = '$enc_pass'
    ";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        header('refresh:0; url=http://127.0.0.1/beta/api/src/home.php');
    }else {
        echo("<br> correo o contraseña invalida.");
        header('refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    }
?>