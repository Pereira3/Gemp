<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gemp</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"> </script>
        <link rel="stylesheet" href="./css/Projeto.css">
        <script src="./js/Projeto.js"></script>
    </head>
    <body>
        <div id="logo">
            <a href = "Projeto.php"><img src="./imagens/Gemp.png"></a>
        </div>
        <ul id="menu">
            <li class="li_menu" id="li_pagin"><i class="fa-solid fa-home" id="icons"></i><a href = "Projeto.php">Página Inicial</a></li>
            <li class="li_menu" id="li_logsign"><i class="fa-solid fa-user" id="icons"></i><a href = "LogSign.php">Login / Sign Up</a></li>
        </ul>
        <div id="body">
            <table>
                <tr>
                    <td id="tdButoes">
                        <div class="butao" id="butao_Esq"><</div>
                    </td>
                    <td id="tdTexto">
                        <p>Bem vindo ao site <b id="GEMP">Gemp</b>, a nossa principal função é oferecer soluções completas para gerenciar e melhorar a eficiência do seu negócio.<br></p>
                        <p>O nosso site é projetado para ajudá-lo a simplificar a visualização de certos dados e estatísticas sobre o desempenho da sua empresa.<br></p>
                        <p>Com uma interface fácil de usar e perceber, tem como controlar facilmente todos os aspectos do seu negócio, desde produção até recursos humanos.<br></p>
                        <p>Não importa o tamanho da sua empresa, o nosso sistema de gestão é flexível o suficiente para atender às suas necessidades.<br></p>
                        <p>Para aceder às funcionalidades do site terá de proceder ao login ou ao registo de uma conta nova.<br><br></p>
                    </td>
                    <td id="tdImg">
                        <img id="FuncImg" src="./imagens/Funcionarios.png">
                    </td>
                    <td id="tdButoes">
                        <div class="butao" id="butao_Dir"><i class="fa-solid fa-caret-right"></i></div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="body2">
            <table>
                <tr>
                    <td id="tdButoes">
                        <div class="butao" id="butao_Esq2"><i class="fa-solid fa-caret-left"></i></div>
                    </td>
                    <td id="tdTexto">
                        <p>Com isto o nosso site oferece mais detalhadamente os seguintes serviços:<br></p>
                        <ul>
                            <li>Funcionários:
                                <ul>
                                    <li>Visualização dos dados de cada Funcionário</li>
                                </ul>
                            </li>
                            <li>Projetos:
                                <ul>
                                    <li>Progresso</li>
                                    <li>Orçamento</li>
                                </ul>
                            </li>
                            <li>Estatísticas Da Empresa:
                                <ul>
                                    <li>Salário Médio</li>
                                    <li>Quantidade de Projetos Trabalhados</li>
                                    <li>Quantidade de Funcionários Totais</li>
                                    <li>Dinheiro Gasto pela Empresa</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                    <td id="tdImg">
                        <img id="FuncImg" src="./imagens/Gestao.png">
                    </td>
                    <td id="tdButoes">
                        <div class="butao" id="butao_Dir2">></div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>