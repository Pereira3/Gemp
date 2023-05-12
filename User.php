<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['user_Nome'])){
    header('Location: LogIn.php');
}
?>

<html>
    <head>
        <title>User Page</title>
        <link rel="stylesheet" href="User.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
        <script src="User.js"></script>
    </head>
    <body>

        <div id="logo">
            <a href = "Projeto.html"><img src="./imagens/Gemp.png"></a>
        </div>
        <ul id="menu">
            <li class="li_menu" id="li_pagin"><i class="fa-solid fa-home" id="icons"></i><a href = "Projeto.html">Página Inicial</a></li>
            <li class="li_menu" id="logout"><i class="fa-solid fa-arrow-right-from-bracket" id="icons"></i><a href = "Logout.php">Logout</a></li>
        </ul>
        <div id="utilizador">
            <h1>User: <?php echo $_SESSION['user_Nome']; ?></h1>
        </div>

        <div id="dados">
            <div id="body">
                <button class="button" id="ButtonDefault">Geral</button>
                <button class="button" id="ButtonAP">Adicionar Projeto</button>
                <button class="button" id="ButtonAF">Adicionar Funcionário à Empresa</button>
                <button class="button" id="ButtonAlP">Alterar Projeto</button>
                <button class="button" id="ButtonAlF">Alterar Funcionário</button><br><br>
                <div id="Default">
                    <h1>Default Page</h1>
                </div>
                <div id="AP">
                    <h1>Adicionar Projeto Page</h1>
                </div>
                <div id="AF">
                    <h1>Adicionar Funcionário Page</h1>
                </div>
                <div id="AlP">
                    <h1>Alterar Projeto Page</h1>
                </div>
                <div id="AlF">
                    <h1>Alterar Funcionário Page</h1>
                </div>
            </div>
        </div>
    </body>
</html>