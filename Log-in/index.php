<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form-style.css">
    <title>Inicio Sesion</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php

            include("app/models/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Error en Select");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                } else {
                    echo "<div class='message'>
                      <p>Datos invalidos</p>
                       </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Regresar</button>";

                }
                if (isset($_SESSION['valid'])) {
                    header("Location: app/views/home.php");
                }
            } else {

                ?>
                <header>Inicio de Sesion</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Iniciar Sesion" required>
                    </div>
                    <div class="links">
                        ¿Aun no tienes cuenta? <a href="app/views/sign-up.php">Registrate!</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

</html>