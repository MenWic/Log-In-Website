<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/form-style.css">
    <link rel="stylesheet" href="../../assets/css/home-style.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="../views/home.php">Lord's Devs</a></p>
        </div>

        <div class="right-links">
            <a href="edit.php">Editar</a>
            <a href="../controllers/log-out.php">
                <button class="btn">Log Out</button>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <header>Editar Perfil</header>
            <form action="" class="post">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Edad cristiana</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>

            </form>
        </div>
    </div>
</body>

</html>