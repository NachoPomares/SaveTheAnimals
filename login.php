<?php

require_once "config.php";
require_once "session.php";

$_error = '';

if (isset($_POST['submit'])) {
	$_email = trim($_POST['email']);
	$_password = trim($_POST['password']);

	// Ver si no estan vacios
	if (empty($_email)) {
		$_error .= 'Introduzca el email.\n'; }
	if (empty($_password)) {
		$_error .= 'Introduzca la contraseña.\n'; }

	if (empty($_error)) {
		$_sql = "SELECT * From usuarios WHERE email = '{$_email}' ";
		$_query = mysqli_query($connection, $_sql);
		$_emails = mysqli_num_rows($_query);

		if (!$_query) {
			die("Error en SQL: " . mysqli_error($connection)); 
		}
		if ($_emails > 0) {

			while($row = mysqli_fetch_array($_query)) {
				$_id = $row['id_u'];
				$_username = $row['username'];
				$_email_bbdd = $row['email'];
				$_password_bbdd = $row['password_u'];
			}
			if (password_verify($_password, $_password_bbdd)) {
				header("location: index.php");
			} else {
				$_error .= 'Contraseña incorrecta.\n';
			}
		} else {
			$_error .= 'No existe una cuenta con ese correo.\n';
		}
	}

	if(!empty($_error)) {
		echo '<script>alert("'.$_error.'")</script>';
		header("Refresh:0");
	}

}



?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Login System</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Login</h3>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" />
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" />
                    </div>
                    <button type="submit" name="submit" id="submit"
                        class="btn btn-outline-primary btn-lg btn-block">Entrar</button>
                </form>
		<a>¿No tienes una cuenta? </a><a href="/registro.php">Crea una. </a>

            </div>
        </div>
    </div>
</body>
</html>
