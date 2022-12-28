<?php

require_once "config.php";
require_once "session.php";

if (isset($_POST['submit'])) {
   $_username = trim($_POST['username']);
   $_email = trim($_POST['email']);
   $_password = trim($_POST['password']);
   $_password_hash = password_hash($_password, PASSWORD_BCRYPT);

   $_email_check_query = mysqli_query($connection, "SELECT * FROM usuarios WHERE email = '{$_email}' ");
   $_email_check = mysqli_num_rows($_email_check_query);
   $_username_check_query = mysqli_query($connection, "SELECT * FROM usuarios WHERE username = '{$_username}' ");
   $_username_check = mysqli_num_rows($_username_check_query);

   $_error = '';

   if ($_email_check > 0) {
	$_error .= 'El email ya esta en uso.\n';
   }

   if (strlen($_password) < 8) {
	$_error .= 'La contraseña debe tener 8 carácteres como mínimo.\n';
   }

   if ($_username_check > 0) {
        $_error .= 'El nomhbre de usuario ya esta en uso.\n';
   }

   if (empty($_error)) {
	$_sql = "INSERT INTO usuarios (username, email, password_u) VALUES ('{$_username}', '{$_email}', '{$_password_hash}')";
        $_sql_query = mysqli_query($connection, $_sql);

	if(!$_sql_query) {
		die("MySQL query failed" . mysqli_error($connection));
	} else {
		header('Location: register_success.html');
		//exit;
	}
   } else {
	echo '<script>alert("'.$_error.'")</script>';
	header("Refresh:0");
   }


   mysqli_close($db);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Registro de usuarios con PHP</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Registrarse</h3>
		    <div class="form-group">
                        <label>Nombre de usuario:</label>
                        <input type="text" class="form-control" name="username" id="username" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" required />
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required />
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                        Registrarse
                    </button>
                </form>
		<a>Para registrarse como una protectora pincha </a><a href="registro_protectora.php">aquí.</a>
		<a>¿Ya tienes una cuenta? pincha </a><a href="login.php">aquí.</a>
            </div>
        </div>
    </div>
</body>
</html>
