<?php
session_start();

include("../models/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/form-style.css">
    <link rel="stylesheet" href="../../assets/css/home-style.css">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Lord's Dev</a> </p>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            echo "<a href='edit.php?Id=$res_id'>Editar Perfil</a>";
            ?>

            <a href="../controllers/log-out.php"> <button class="btn">Cerrar Sesion</button> </a>

        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hola <b>
                            <?php echo $res_Uname ?>
                        </b>, Bienvenido al único camino verdadero!</p>
                </div>
                <div class="box">
                    <p>Tu email es <b>
                            <?php echo $res_Email ?>
                        </b>, Dios te bendiga, siervo.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>Tienes <b>
                            <?php echo $res_Age ?>
                        </b> años en los caminos del Señor, Felicidades!</p>
                </div>
            </div>
        </div>

    </main>
</body>

</html>