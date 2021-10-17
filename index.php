<?php 

require_once "autoload.php";

// Script para trazar todos od registros

// Instanciando a class livro
$lista = new Livro();
// executando o método ler 
$dados = $lista->ler();
// Efetuando a contagem de registros
$linha = count($dados);


// Script de Exclusão

if(isset($_GET['id']))
{
    // pagando o id por url
    $id_parametro = base64_decode($_GET['id']);
    $id = filter_var($id_parametro,  FILTER_SANITIZE_NUMBER_INT);

    // Instanciando a class livro
    $remocao = new Livro();
    // Executando o metodo deletar()
    $remocao->deletar($id);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - Simples</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="resource/img/favicon.ico" type="image/x-icon">

    <!-- Estilo css -->
    <link rel="stylesheet" href="resource/css/estilo.css">

    <!-- Icones Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- jquery e jquery mask -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Javscript -->
    <script src="resource/js/main.js"></script>

</head>
<body id="pagina-inicial">

    <?php

    //  Script de apresentação de mensagem de sucesso ou erro

    if(isset($_GET['m']) and $_GET['m'] == 1)
    {
       echo 
       '<div class="alerta alerta-sucesso">
            <p>Cadastro realidado com sucesso!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }

    if(isset($_GET['m']) and $_GET['m'] == 2)
    {
       echo 
       ' <div class="alerta alerta-erro">
            <p>Ops!!, Não foi possivel cadastrar!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
         </div>'
        ;
    }

    if(isset($_GET['m']) and $_GET['m'] == 3)
    {
       echo 
       '<div class="alerta alerta-sucesso">
            <p>Alteração realizada com sucesso!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }

    if(isset($_GET['m']) and $_GET['m'] == 4)
    {
       echo 
       '<div class="alerta alerta-erro">
            <p>Ops!!, Não foi possivel alterar!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
       </div>'
        ;
    }

    if(isset($_GET['m']) and $_GET['m'] == 5)
    {
       echo 
       '<div class="alerta alerta-sucesso">
            <p>Exclusão realizada com sucesso!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }

    if(isset($_GET['m']) and $_GET['m'] == 6)
    {
       echo 
       '<div class="alerta alerta-erro">
            <p>"Ops!!, Não foi possivel excluir!</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }

    ?>
    

    <header class="container">
        <h1>Livros</h1>
        <a href="cadastro.php" class="botao-novo">novo</a>
    </header>


    <section class="container">
        <table>
            <thead>
                <tr>
                    <th>codigo</th>
                    <th>titulo</th>
                    <th>valor</th>
                    <th>observação</th>
                    <th>opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Laço para imprimir os registros 
                    for ($i=0; $i < $linha ; $i++) 
                    { 
                        $id = base64_encode($dados[$i]['id_livro']);
                ?>
                <tr>
                    <td><?php echo $dados[$i]['codigo']; ?></td>
                    <td><?php echo $dados[$i]['titulo']; ?></td>
                    <td><?php echo "R$ " . $dados[$i]['valor']; ?></td>
                    <td><?php echo substr($dados[$i]['observacao'], 0, 50); ?> ...</td>
                    <td>
                        <div class="opcao">
                            <a href="alterar.php?id=<?php echo $id; ?>" class="botao-alterar">
                                <i class='bx bxs-edit-alt'></i>
                            </a>
                            <a  class="botao-remover" onclick='confirmacaoModal("<?php echo $id; ?>")'><i class='bx bxs-trash-alt' ></i></a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>


    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal">
        <h2>ALERTA</h2>
        <img src="resource/img/bxs-error.svg" alt="">
        <p>Tem certeza que deseja excluir esse item?
        </p>
        <div class="celula-desicao">
            <a href="index.php" class="botao-cancelar">cancelar</a>
            <a class="botao-continua" type="submit" id="botaoExclusao">remover</a>
        </div>
    </div>


</body>
</html>