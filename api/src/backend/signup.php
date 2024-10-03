<?php
    //database connection
    require('../../config/db_connection.php');
    // get database from register form
    $email = $_POST['email'];
    $pass = $_POST['passwd'];
    $pass2 = $_POST['confirm_password'];
    $enc_pass = md5($pass);
    
    // Validate that passwords match
    if ($pass !== $pass2) {
    die("<br>Las contraseñas no coinciden.");
    }
    /*echo "email: " . $email;
    echo "<br>password: " . $pass;
    echo "<br>encrypted password: " . $enc_pass;
    echo "<br>confirm password: " . $pass2;*/
    
    // query to insert data into users table
    $query = "INSERT INTO users (email, password)
     VALUES ('$email', '$enc_pass')";
    
    // execute the query
    $result = pg_query($conn, $query);
    
    if ($result) {
        echo "<br>Registro exitoso!";
    } else {
        echo "Error en el registro: " . pg_last_error($conn);
    }
    
    // close the database connection
    pg_close($conn);
?>