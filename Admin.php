<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['admin_Nome'])){
    header('Location: LogIn.php');
}
?>

<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="Admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
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
            <h1>Admin: <?php echo $_SESSION['admin_Nome']; ?></h1>
        </div>

        <div id="dados">         
            Número de Empresas Cediadas:
            <?php
                $select = "SELECT COUNT(*) AS IDE FROM perfis";
                $result = mysqli_query($conn, $select);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    echo $row["IDE"];
                } else {
                    echo "0";
                }
            ?><br>
            Número de Projetos Assistidos:
            <?php

                $select = "SELECT COUNT(*) AS IDP FROM projetos";
                $result = mysqli_query($conn, $select);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    echo $row["IDP"];
                } else {
                    echo "0";
                }
            ?><br>
            Número de Funcionários Geridos:
            <?php
                $select = "SELECT COUNT(*) AS IDF FROM funcionarios";
                $result = mysqli_query($conn, $select);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    echo $row["IDF"];
                } else {
                    echo "0";
                }
            ?><br>
        </div>
    </body>
</html>