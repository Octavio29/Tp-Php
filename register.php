<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Este correo electrónico está en uso. ¡Pruebe con otro, por favor!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Volver</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Ocurrió un error");

            echo "<div class='message'>
                      <p>Registro Exitoso!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Iniciar Sesión</button>";
         

         }

         }else{
         
        ?>

            <header>Complete los Datos</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Edad</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Registrarse" required>
                </div>
                <div class="links">
                    Tienes cuenta? <a href="index.php">Iniciar Sesión</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>