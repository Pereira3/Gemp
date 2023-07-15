<?php
    @include 'config.php';
    session_start();
?>

<html>
    <head>
        <title>User Page</title>
        <link rel="stylesheet" href="./css/User.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
        <script src="./js/User.js"></script>
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
            <h1>User: <?php echo $_SESSION['user_Nome']; ?></h1>
        </div>

        <?php
            $EmpNome = $_SESSION['user_Nome'];
            $IDE = $_SESSION['IDE'];
        ?>
        
        <div id="dados">
            <div id="body">
                <button class="button" id="ButtonDefault">Geral</button>
                <button class="button" id="ButtonAP">Adicionar Projeto</button>
                <button class="button" id="ButtonAF">Adicionar Funcionário à Empresa</button>
                <button class="button" id="ButtonVP">Ver Projetos</button>
                <button class="button" id="ButtonVF">Ver Funcionários</button>
                <button class="button" id="ButtonRP">Remover Projeto</button>
                <button class="button" id="ButtonRF">Remover Funcionário</button><br><br>
                <div id="Default">
                    <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dadospe";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);
                        echo "&nbspNúmero de Projetos Encarregues: &nbsp" . $response;

                    ?><br><br>
                    <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dadosfc";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);
                        echo "&nbspNúmero de Funcionários Contratados:&nbsp" . $response;

                    ?><br><br>
                    <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dadosdgp";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);
                        echo "&nbspDinheiro Médio Gasto em Projetos:&nbsp" . $response;

                    ?><br><br>
                    <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dadosidm";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);
                        echo "&nbspIdade Média entre os Funcionários:&nbsp" . $response;

                    ?><br><br>
                    <div id="icondiv"><i id="IconL" class="fa-solid fa-circle-half-stroke"></i></div>
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&dadoshdtm";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);
                        echo "&nbspHoras de Trabalho Médias feitas pelos Funcionários:&nbsp" . $response;

                    ?><br><br>
                </div>


                <!-- ----------FUNÇÕES DE ADICIONAR---------- -->
                <div id="AP">
                    
                    <form method="POST">
                        <input id="input" required autocomplete="off" type="text" name="nome" placeholder="Nome"><br>
                        <input id="input" required autocomplete="off" type="number" min="0" name="custo" placeholder="Custo"><br>
                        <input id="input" required autocomplete="off" type="text" name="tema" placeholder="Tema"><br><br>
                        <button class="button" name="button">Adicionar Projeto</button><br>
                    </form>
                    
                    <?php
                        if(isset($_POST['button'])){

                            $Nome = urlencode($_POST['nome']);
                            $Custo = urlencode($_POST['custo']);
                            $Tema = urlencode($_POST['tema']);
                            
                            $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nome=".$Nome."&custo=".$Custo."&tema=".$Tema."&inserir=1";
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $curl_response = curl_exec($curl);
                            curl_close($curl);

                            header("Location: User.php");
                        }
                    ?>

                </div>
                <div id="AF">

                    <form method="POST">
                        <input id="input" required autocomplete="off" type="text" name="nome" placeholder="Nome"><br>
                        <input id="input" required autocomplete="off" type="number" min="18" max="70" name="idade" placeholder="Idade"><br>
                        <input id="input" required autocomplete="off" type="text" name="funcao" placeholder="Função"><br>
                        <input id="input" required autocomplete="off" type="number" min="1" max="12" name="horas" placeholder="Horas de Trabalho Diárias"><br><br>
                        <button class="button" name="button2">Adicionar Funcionário</button><br>
                    </form>
                    
                    <?php
                        if(isset($_POST['button2'])){

                            $Nome = urlencode($_POST['nome']);
                            $Idade = urlencode($_POST['idade']);
                            $Função = urlencode($_POST['funcao']);
                            $HorasDT = urlencode($_POST['horas']);
                            
                            $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&nome=".$Nome."&idade=".$Idade."&funcao=".$Função."&horas=".$HorasDT."&inserir=1";
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $curl_response = curl_exec($curl);
                            curl_close($curl);

                            header("Location: User.php");
                        }
                    ?>

                </div>


                <!-- ----------FUNÇÕES DE VER---------- -->
                <div id="VP">
                    <?php
                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&vproj=1";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);

                        if (isset($response['Projetos'])) {
                            
                            $Projetos = $response['Projetos'];

                            if (!empty($Projetos)) {
                                echo "<table border='1' style='text-align: center; border-radius: 10px; border-color: #3e98ff;'>";
                                echo    "<tr>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDP</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 30px; padding-left: 30px; background-color: #3e98ff;'>Nome</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Custo</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 80px; padding-left: 80px; background-color: #3e98ff;'>Tema</th>
                                        </tr>";
                                foreach ($Projetos as $Projeto) {
                                    echo "<tr>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Projeto['IDP'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Projeto['Nome'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Projeto['Custo'] . "</td>";
                                    echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Projeto['Tema'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "Nenhum Projeto Encontrado...";
                            }

                        }else{
                            echo "Erro ao obter os Projetos...";
                        }
                    ?>
                </div>
                <div id="VF">
                    <?php

                        $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&vfunc=1";
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $curl_response = curl_exec($curl);
                        curl_close($curl);

                        $response = json_decode($curl_response, true);

                        if (isset($response['Funcionarios'])){
                            
                            $Funcionarios = $response['Funcionarios'];

                            if (!empty($Funcionarios)) {
                                echo "<table border='1' style='text-align: center; border-radius: 10px; border-color: #3e98ff;'>";
                                echo    "<tr>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>IDF</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 30px; padding-left: 30px; background-color: #3e98ff;'>Nome</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Idade</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px; background-color: #3e98ff;'>Horas Diárias de Trabalho</th>
                                            <th style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 80px; padding-left: 80px; background-color: #3e98ff;'>Função</th>
                                        </tr>";
                                foreach ($Funcionarios as $Funcionario) {
                                    echo "<tr>";
                                        echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Funcionario['IDF'] . "</td>";
                                        echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 30px; padding-left: 30px;'>" . $Funcionario['Nome'] . "</td>";
                                        echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 10px; padding-left: 10px;'>" . $Funcionario['Idade'] . "</td>";
                                        echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 20px; padding-left: 20px;'>" . $Funcionario['HorasDT'] . "</td>";
                                        echo "<td style='text-align: center; border-radius: 7px; border-color: #3e98ff; padding-right: 80px; padding-left: 80px;'>" . $Funcionario['Funcao'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "Nenhum Funcionario Encontrado...";
                            }

                        }else{
                            echo "Erro ao obter os Funcionarios...";
                        }
                    ?>
                </div>
                

                <!-- ----------FUNÇÕES DE REMOVER---------- -->
                <div id="RP">
                    <form method="POST">
                        <input id="input" required autocomplete="off" type="number" name="IDProjetos" placeholder="IDP"><br>
                    </form>
                    
                    <?php
                        if(isset($_POST['IDProjetos'])){

                            $IDProjetos = urlencode($_POST['IDProjetos']);
                            
                            $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&IDProjetos=".$IDProjetos."&remproj";
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $curl_response = curl_exec($curl);
                            curl_close($curl);

                            header("Location: User.php");
                        }
                    ?>
                </div>
                <div id="RF">
                    <form method="POST">
                        <input id="input" required autocomplete="off" type="number" name="IDFuncionarios" placeholder="IDF"><br>
                    </form>
                    
                    <?php
                        if(isset($_POST['IDFuncionarios'])){

                            $IDFuncionarios = urlencode($_POST['IDFuncionarios']);
                            
                            $url= "http://localhost:8888/Projeto/api.php?ide=".$IDE."&IDFuncionarios=".$IDFuncionarios."&remfunc";
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $curl_response = curl_exec($curl);
                            curl_close($curl);

                            header("Location: User.php");
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>