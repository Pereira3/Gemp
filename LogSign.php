<?php

@include 'config.php';

if(isset($_POST['button'])){

    $nome = $_POST['fullname'];
    $email = $_POST['email'];
    $cemail = $_POST['cemail'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $perfil = $_POST['perfil'];

    $data = array(
        'signup' => 1,
        'nome' => $nome,
        'email' => $email,
        'cemail' => $cemail,
        'password' => $password,
        'cpassword' => $cpassword,
        'perfil' => $perfil
    );

    $query = http_build_query($data);
    $url = "http://localhost:8888/Projeto/api.php?" . $query;
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($curl_response, true);

    if ($response['success']) {
        header('Location: LogIn.php');
        exit;
    }

};

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gemp Sign Up</title>
        <link rel="stylesheet" href="./css/LogSign.css">
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
            <h1>Sign Up</h1>
            <?php
                if(!($response['success'])){
                    $error = $response['error'];
                    foreach ($error as $errorMsg) {
                        echo '<div class="error-msg">' . $errorMsg . '</div>';
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
                    <select name="perfil" id="selectPerfil" required>
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