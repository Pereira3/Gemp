<?php
    
    header("Content-Type:application/json");
    include('config.php');
    


    //---------------------------------------------------------------------------
    //-------------------COMANDOS RELATIVOS AO LOGGIN E SINGUP-------------------
    //---------------------------------------------------------------------------



    if (isset($_GET['signup']) && isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['cemail']) && isset($_GET['password']) && isset($_GET['cpassword']) && isset($_GET['perfil'])) {
     
        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $cemail = mysqli_real_escape_string($conn, $_GET['cemail']);
        $password = mysqli_real_escape_string($conn, $_GET['password']);
        $cpassword = mysqli_real_escape_string($conn, $_GET['cpassword']);
        $perfil = mysqli_real_escape_string($conn, $_GET['perfil']);
    
        $select = "SELECT * FROM perfis WHERE email = '$email'";
        $result = mysqli_query($conn, $select);
    
        if (mysqli_num_rows($result) > 0) {
            $error[] = 'Utilizador já existente!';
        } else {
            if ($password != $cpassword) {
                $error[] = 'Password não corresponde!';
            } else if ($email != $cemail) {
                $error[] = 'Email não corresponde!';
            } else {
                $nome = mysqli_real_escape_string($conn, $_GET['nome']);
                $Insert = "INSERT INTO perfis(Nome, Email, Password, Perfil) VALUES ('$nome', '$email', '$password', '$perfil')";
                mysqli_query($conn, $Insert);
    
                $response = array('success' => true);
    
                echo json_encode($response);
                exit;
            }
        }
    
        $response = array('success' => false, 'error' => $error);
        echo json_encode($response);
        exit;
    }

    if (isset($_GET['email']) && isset($_GET['password'])) {

        $email = mysqli_real_escape_string($conn, $_GET['email']);
        $password = mysqli_real_escape_string($conn, $_GET['password']);
    
        $select = "SELECT * FROM perfis WHERE email = '$email' && password = '$password'";
        $result = mysqli_query($conn, $select);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $response = array('success' => true, 'row' => $row);
        } else {
            $response = array('success' => false, 'error' => 'Dados inseridos incorretos!');
        }
    
        echo json_encode($response);
        exit;
    }   


    //---------------------------------------------------------------------------
    //----------------------COMANDOS NO FIM DE ESTAR LOGADO----------------------
    //---------------------------------------------------------------------------



    if (!(isset($_GET['ide']))) {
        $query = "SELECT * FROM perfis";
        $query2 = "SELECT * FROM funcionarios";
        $query3 = "SELECT * FROM projetos";
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);
    
        $empresas = array();
        $funcionarios = array();
        $projetos = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $empresa = array(
                'IDE' => $row['IDE'],
                'Nome' => $row['Nome'],
                'Email' => $row['Email'],
                'Password' => $row['Password'],
                'Perfil' => $row['Perfil']
            );
            $empresas[] = $empresa;
        }
    
        while ($row = mysqli_fetch_assoc($result2)) {
            $funcionario = array(
                'IDF' => $row['IDF'],
                'IDE' => $row['IDE'],
                'Nome' => $row['Nome'],
                'Idade' => $row['Idade'],
                'Funcao' => $row['Funcao'],
                'HorasDT' => $row['HorasDT']
            );
            $funcionarios[] = $funcionario;
        }
    
        while ($row = mysqli_fetch_assoc($result3)) {
            $projeto = array(
                'IDP' => $row['IDP'],
                'IDE' => $row['IDE'],
                'Nome' => $row['Nome'],
                'Custo' => $row['Custo'],
                'Tema' => $row['Tema']
            );
            $projetos[] = $projeto;
        }
    
        $response = array(
            'EMPRESAS' => $empresas,
            'FUNCIONARIOS' => $funcionarios,
            'PROJETOS' => $projetos
        );
    
        echo json_encode($response);
        exit;
    } else {
        


        //---------------------------------------------------------------------------
        //--------------------COMANDOS RELATIVOS AO FICHEIRO USER--------------------
        //---------------------------------------------------------------------------



        //--------------------COMANDOS DE INSERT--------------------
        if(isset($_GET['nome']) && isset($_GET['custo']) && isset($_GET['tema']) && isset($_GET['inserir'])){
        
            $Insert = "INSERT INTO projetos(Nome, Custo, Tema, IDE) VALUES ('".$_GET['nome']."','".$_GET['custo']."', '".$_GET['tema']."',".$_GET['ide'].")";
            mysqli_query($conn, $Insert);
            header("Location: User.php");
            exit;

        }else if(isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['funcao']) && isset($_GET['horas']) && isset($_GET['inserir'])){
            
            $Insert = "INSERT INTO funcionarios(IDE, Nome, Idade, Funcao, HorasDT) VALUES (".$_GET['ide'].",'".$_GET['nome']."','".$_GET['idade']."', '".$_GET['funcao']."', '".$_GET['horas']."')";
            mysqli_query($conn, $Insert);
            header("Location: User.php");
            exit;


        //--------------------COMANDOS DE VISUALIZAÇÃO NAS TABELAS--------------------
        }else if(isset($_GET['vproj'])){

            $select = "SELECT * FROM projetos WHERE projetos.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);

            $Projetos = array();

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $Projeto = array(
                        'IDP' => $row['IDP'],
                        'Nome' => $row['Nome'],
                        'Custo' => $row['Custo'],
                        'Tema' => $row['Tema']
                    );
                    $Projetos[] = $Projeto;
                }
            }
        
            $response = array('Projetos' => $Projetos);
            echo json_encode($response);
            exit;

        }else if(isset($_GET['vfunc'])){

            $select = "SELECT * FROM funcionarios WHERE funcionarios.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);

            $Funcionarios = array();

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $Funcionario = array(
                        'IDF' => $row['IDF'],
                        'Nome' => $row['Nome'],
                        'Idade' => $row['Idade'],
                        'Funcao' => $row['Funcao'],
                        'HorasDT' => $row['HorasDT']
                    );
                    $Funcionarios[] = $Funcionario;
                }
            }
        
            $response = array('Funcionarios' => $Funcionarios);
            echo json_encode($response);
            exit;

            
        //--------------------COMANDOS DE REMOÇÃO--------------------
        }else if(isset($_GET['IDProjetos']) && isset($_GET['remproj'])){

            $Remove = "DELETE FROM projetos WHERE projetos.IDP = {$_GET['IDProjetos']} AND projetos.IDE = ".$_GET['ide'];
            mysqli_query($conn, $Remove);
            header("Location: User.php");
            exit;

        }else if(isset($_GET['IDFuncionarios']) && isset($_GET['remfunc'])){

            $Remove = "DELETE FROM funcionarios WHERE funcionarios.IDF = {$_GET['IDFuncionarios']} AND funcionarios.IDE = ".$_GET['ide'];
            mysqli_query($conn, $Remove);
            header("Location: User.php");
            exit;
        
          
        //--------------------COMANDOS DE INFORMAÇÃO GERAL--------------------
        }else if(isset($_GET['dadospe'])){
            $select = "SELECT COUNT(*) AS IDP FROM projetos WHERE projetos.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $response = $row["IDP"];
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['dadosfc'])){
            $select = "SELECT COUNT(*) AS IDF FROM funcionarios WHERE funcionarios.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $response = $row["IDF"];
            } else {
                $response = "0";
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['dadosdgp'])){

            $select = "SELECT AVG(Custo) AS Media FROM projetos WHERE projetos.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = "0";
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['dadosidm'])){
            $select = "SELECT AVG(Idade) AS Media FROM funcionarios  WHERE funcionarios.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['dadoshdtm'])){
            $select = "SELECT AVG(HorasDT) AS Media FROM funcionarios WHERE funcionarios.IDE = ".$_GET['ide'];
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;
        
               


        //---------------------------------------------------------------------------
        //--------------------COMANDOS RELATIVOS AO FICHEIRO ADMIN--------------------
        //---------------------------------------------------------------------------



        //--------------------COMANDOS DE INFORMAÇÃO GERAL--------------------
        }else if(isset($_GET['nadmins'])){
            $select = "SELECT COUNT(*) AS IDE FROM perfis WHERE perfis.Perfil = 'admin'";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $response = $row["IDE"];
            } else {
                $response = "0";
            }
        }else if(isset($_GET['nempced'])){
            $select = "SELECT COUNT(*) AS IDE FROM perfis WHERE perfis.Perfil = 'user' ";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $response = $row["IDE"];
            } else {
                $response = "0";
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['nprojass'])){
            $select = "SELECT COUNT(*) AS IDP FROM projetos";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $response = $row["IDP"];
            } else {
                $response = "0";
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['nfuncgeridos'])){
            $select = "SELECT COUNT(*) AS IDF FROM funcionarios";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $response = $row["IDF"];
            } else {
                $response = "0";
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['idademf'])){
            $select = "SELECT AVG(Idade) AS Media FROM funcionarios";
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['dinheiromgp'])){
            $select = "SELECT AVG(Custo) AS Media FROM projetos";
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;
        }else if(isset($_GET['horastrabalhomf'])){
            $select = "SELECT AVG(HorasDT) AS Media FROM funcionarios";
            $result = mysqli_query($conn, $select);
        
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response = round($row['Media']);
            } else {
                $response = 0;
            }

            echo json_encode($response);
            exit;


        //--------------------COMANDOS DE REMOÇÃO--------------------
        }else if(isset($_GET['IDEmpresa']) && isset($_GET['rememp'])){

            $Remove = "DELETE FROM perfis WHERE perfis.IDE = ".$_GET['IDEmpresa'];
            $Remove2 = "DELETE FROM funcionarios WHERE funcionarios.IDE = ".$_GET['IDEmpresa'];
            $Remove3 = "DELETE FROM projetos WHERE projetos.IDE = ".$_GET['IDEmpresa'];
            mysqli_query($conn, $Remove);
            mysqli_query($conn, $Remove2);
            mysqli_query($conn, $Remove3);
            header("Location: Admin.php");
            exit;

        }
    }


    echo json_encode($response); exit;

?>