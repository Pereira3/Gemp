<?php
    @include 'config.php';
    session_start();
?>

<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="./css/Admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
        <script src="./js/Admin.js"></script>
    </head>
    <body>
        <div id="logo">
            <a href = "Projeto.php"><img src="./imagens/Gemp.png"></a>
        </div>
        <ul id="menu">
            <li class="li_menu" id="li_pagin"><i class="fa-solid fa-home" id="icons"></i><a href = "Projeto.php">Página Inicial</a></li>
            <li class="li_menu" id="logout"><i class="fa-solid fa-arrow-right-from-bracket" id="icons"></i><a href = "Logout.php">Logout</a></li>
        </ul>
        
        <div id="utilizador">
            <h1>Admin: <?php echo $_SESSION['admin_Nome']; ?></h1>
        </div>

        <?php
            $IDE = $_SESSION['IDE'];
        ?>
        <script>
            var AdminName = "<?php echo $_SESSION['admin_Nome']; ?>";
        </script>

        <div id="dados">

            <button class="button" id="ButtonDefault">Geral</button>
            <button class="button" id="ButtonGEMP">GEMP</button>
            <button class="button" id="ButtonRE">Remover Empresa</button>
            <button class="button" id="ButtonPDF" href="pdf.php" download="pdf.php">Gerar PDF</button><br><br>

            <div id="Default">
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nadmins";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspNúmero de Admins:&nbsp" . $response;

                ?><br><br>   
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nempced";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspNúmero de Empresas Cediadas:&nbsp" . $response;

                ?><br><br>
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nprojass";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspNúmero de Projetos Assistidos:&nbsp" . $response;

                ?><br><br>
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nfuncgeridos";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspNúmero de Funcionários Geridos:&nbsp" . $response;

                ?><br><br>
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&idademf";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspIdade Média entre os Funcionários:&nbsp" . $response;

                ?><br><br>
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dinheiromgp";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspDinheiro Médio Gasto em Projetos:&nbsp" . $response;

                ?><br><br>
                <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                <?php

                    $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&horastrabalhomf";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);

                    $response = json_decode($curl_response, true);
                    echo "&nbspHoras de Trabalho Médias feitas pelos Funcionários:&nbsp" . $response;

                ?><br><br>
                </div>
            
            <div id="GEMP">

                <?php

                    $url = "http://localhost:8888/Projeto/api.php";
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $curl_response = curl_exec($curl);
                    curl_close($curl);
                    
                    $data = json_decode($curl_response, true);
                    
                    if (isset($data['EMPRESAS']) && isset($data['FUNCIONARIOS']) && isset($data['PROJETOS'])) {
                        $empresas = $data['EMPRESAS'];
                        $funcionarios = $data['FUNCIONARIOS'];
                        $projetos = $data['PROJETOS'];
                    
                        echo "<div style='text-align: center;'>";

                            echo "<h2>Tabela de Empresas</h2>";
                            if (!empty($empresas)) {
                                echo "<table border='1' style='text-align: center; margin-left:auto; margin-right:auto; border-radius: 10px; border-color: #3e98ff;'>";
                                echo "<tr>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDE</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Nome</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Email</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Perfil</th>";
                                echo "</tr>";
                        
                                foreach ($empresas as $empresa) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $empresa['IDE'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $empresa['Nome'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $empresa['Email'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $empresa['Perfil'] . "</td>";
                                    echo "</tr>";
                                }
                        
                                echo "</table>";
                            } else {
                                echo "Nenhuma Empresa Encontrada...";
                            }
                        
                            echo "<h2>Tabela de Funcionários</h2>";
                            if (!empty($funcionarios)) {
                                echo "<table border='1' style='text-align: center; margin-left:auto; margin-right:auto; border-radius: 10px; border-color: #3e98ff;'>";
                                echo "<tr>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDF</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDE</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Nome</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Idade</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Função</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>HorasDT</th>";
                                echo "</tr>";
                        
                                foreach ($funcionarios as $funcionario) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['IDF'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['IDE'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['Nome'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['Idade'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['Funcao'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $funcionario['HorasDT'] . "</td>";
                                    echo "</tr>";
                                }
                        
                                echo "</table>";
                            } else {
                                echo "Nenhum Funcionário Encontrado...";
                            }
                        
                            echo "<h2>Tabela de Projetos</h2>";
                            if (!empty($projetos)) {
                                echo "<table border='1' style='text-align: center; margin-left:auto; margin-right:auto; border-radius: 10px; border-color: #3e98ff;'>";
                                echo "<tr>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDP</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDE</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Nome</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Custo</th>";
                                echo "<th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Tema</th>";
                                echo "</tr>";
                        
                                foreach ($projetos as $projeto) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $projeto['IDP'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $projeto['IDE'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $projeto['Nome'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $projeto['Custo'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $projeto['Tema'] . "</td>";
                                    echo "</tr>";
                                }
                        
                                echo "</table>";

                                
                            } else {
                                echo "Nenhum Projeto Encontrado...";
                            }

                        echo "</div>";
                    
                    } else {
                        echo "Erro ao obter os dados da base de dados...";
                    }
                ?>
            </div>
            
            <div id="RE">
                <form method="POST">
                    <input id="input" required autocomplete="off" type="number" name="IDEmpresa" placeholder="IDE"><br>
                </form>

                <?php
                    if(isset($_POST['IDEmpresa'])){

                        $IDEmpresa = urlencode($_POST['IDEmpresa']);
            
                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&IDEmpresa=".$IDEmpresa."&rememp";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        header("Location: Admin.php");
                    }
                ?>
            </div>
        </div>
    </body>
</html>