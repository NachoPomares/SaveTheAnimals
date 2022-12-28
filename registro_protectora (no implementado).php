<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP User Registration System Example</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post">
                    <h3>Registrarse como protectora</h3>
                    <div class="form-group">
                        <label>Nombre de la protectora:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" />
                    </div>
                    <div class="form-group">
                        <label>Dirección de la protectora:</label>
                        <input type="text" class="form-control" name="direcc" id="direcc" />
                    </div>
                    <div class="form-group">
                        <label>Email de contacto:</label>
                        <input type="email" class="form-control" name="email" id="email" />
                    </div>
                    <div class="form-group">
                        <label>Telefono de contacto:</label>
                        <input type="text" class="form-control" name="telf" id="telf" />
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" class="form-control" name="password_p" id="password_p" />
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                        Sign up
                    </button>
                </form>
		<a>¿Registrarte como un usuario? pincha </a><a href="registro.php">aquí.</a>
		<a>¿Ya tienes una cuenta? pincha </a><a href="login.php">aquí.</a>
            </div>
        </div>
    </div>
</body>
</html>
