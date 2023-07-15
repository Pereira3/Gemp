<?php

@include 'config.php';
session_start();

if (isset($_POST['button'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $url = "http://localhost:8888/Projeto/api.php?email=".urlencode($email)."&password=".urlencode($password);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($curl_response, true);

    if ($response['success']) {
        $row = $response['row'];
        if ($row['Perfil'] == 'admin') {
            $_SESSION['admin_Nome'] = $row['Nome'];
            $_SESSION['IDE'] = $row['IDE'];
            header('Location: Admin.php');
            exit;
        } else if ($row['Perfil'] == 'user') {
            $_SESSION['user_Nome'] = $row['Nome'];
            $_SESSION['IDE'] = $row['IDE'];
            header('Location: User.php');
            exit;
        }
    }
};

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gemp Login</title>
        <link rel="stylesheet" href="./css/Login.css">
        <script src="Projeto.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
    </head>
    <body>
        <div id="logo">
            <a href = "Projeto.php"><img src="./imagens/Gemp.png"></a>
        </div>
        <ul id="menu">
            <li class="li_menu" id="li_pagin"><i class="fa-solid fa-home" id="icons"></i><a id="pi" href = "Projeto.php">Página Inicial</a></li>
        </ul>

        <div id="body">
            <h1>Login</h1>
            <?php
                if(!($response['success'])){
                    $error = $response['error'];
                    echo '<div class="error-msg">'.$error.'</div>';
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