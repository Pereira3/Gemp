<?php

@include 'config.php';

if(isset($_POST['button'])){
    
    $nome = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $cemail = ($_POST['cemail']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $perfil = $_POST['perfil'];

    $select = " SELECT * FROM perfis WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        //Email =
        $error[] = 'Utilizador já existente!';
    }else{
        if($password != $cpassword){
            $error[] = 'Password não corresponde!';
        }else if($email != $cemail){
            $error[] = 'Email não corresponde!';
        }else{
            $insert = "INSERT INTO perfis(Nome, Email, Password, Perfil) VALUES('$nome', '$email', '$password', '$perfil')";
            mysqli_query($conn, $insert);
            header('Location: LogIn.php');
        }
    }
};

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gemp Sign Up</title>
        <link rel="stylesheet" href="LogSign.css">
        <script src="Projeto.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
    </head>
    <body>
        <div id="logo">
            <a href = "Projeto.html"><img src="./imagens/Gemp.png"></a>
        </div>
        <ul id="menu">
            <li class="li_menu" id="li_pagin"><i class="fa-solid fa-home" id="icons"></i><a id="pi" href = "Projeto.html">Página Inicial</a></li>
        </ul>

        <div id="body">
            <h1>Sign Up</h1>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <form method="POST">
                <input id="input" required autocomplete="off" type="text" name="fullname" placeholder="Nome Da Empresa"><br>
                <input id="input" required autocomplete="off" type="email" name="email" placeholder="Email Da Empresa"><br>
                <input id="input" required autocomplete="off" type="email" name="cemail" placeholder="Confirme o Email"><br>
                <input id="input" required autocomplete="off" type="password" name="password" placeholder="Palavra-Passe"><br>
                <input id="input" required autocomplete="off" type="password" name="cpassword" placeholder="Confirme a Palavra-Passe"><br>
                <div id="divselect">
                    <select name="perfil" required>
                        <option selected default value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button class="button" name="button">Registo</button><br>
                Já tem Conta? <a id="redirect" href="./LogIn.php">Clique aqui</a>
            </form>
        </div>

    </body>
</html>