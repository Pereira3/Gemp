<?php

@include 'config.php';
session_start();

if(isset($_POST['button'])){
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = " SELECT * FROM perfis WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        if($row['Perfil'] == 'admin'){
            $_SESSION['admin_Nome'] = $row['Nome'];
            header('Location: Admin.php');
        }else if($row['Perfil'] == 'user'){
            $_SESSION['user_Nome'] = $row['Nome'];
            header('Location: User.php');
        }
    }else{
        $error[] = 'Dados inseridos incorretos!';
    }
};

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gemp Login</title>
        <link rel="stylesheet" href="Login.css">
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
            <h1>Login</h1>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <form method="POST">
                <input id="input" required autocomplete="off" type="email" name="email" placeholder="Email Da Empresa"><br>
                <input id="input" required autocomplete="off" type="password" name="password" placeholder="Palavra-Passe"><br>
                <button class="button" name="button">Entrar</button><br>
                Não tem Conta? <a id="redirect" href="./LogSign.php">Clique aqui</a>
            </form>
        </div>

    </body>
</html>