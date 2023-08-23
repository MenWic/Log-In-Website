<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/form-style.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php
            include("../models/config.php");

            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                //Verificar que el email no se haya utilizado aun
                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                //Si no es 0, hay 1 cuenta con ese correo, por ende, ERROR
                if (mysqli_num_rows($verify_query) != 0) {

                    echo "<div class='message'>
                            <p>El email ya ha sido usado, usa uno distinto.</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Regresar</button>";

                } else { //Si no se ha usado el corrreo, hacemos la incersion a la db
                    mysqli_query($con, "INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Ocurrio un Error");

                    echo "<div class='message'>
                            <p>Registro completado!</p>
                        </div> <br>";
                    echo "<a href='../../index.php'><button class='btn'>Inicia Sesion</button>";

                }
            } else {

                ?>

                <header>Crear Cuenta</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Edad Cristiana</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Registrar" required>
                    </div>
                    <div class="links">
                        ¿Ya tienes una cuenta? <a href="../../index.php">Inicia Sesion</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

</html>