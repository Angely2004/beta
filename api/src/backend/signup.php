<?php
    //database connection
    require('../../config/db_connection.php');
    // get database from register form, recibe datos
    $email = $_POST['email'];
    $pass = $_POST['passwd'];
    $pass2 = $_POST['confirm_password'];
    $enc_pass = md5($pass);
    
    // Validate if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        die("<br>El email ya está registrado.");
        header('refresh:0; url=http://127.0.0.1/beta/api/src/.html');
    }else {
        echo "<script>alert('restration successful')</script>";
        header('refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    }
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
    echo "<script>alert('restration successful')</script>";
    header('refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    
    if ($result) {
        echo "<br>Registro exitoso!";
    } else {
        echo "Error en el registro: " . pg_last_error($conn);
    }
    
    // close the database connection
    pg_close($conn);
?>