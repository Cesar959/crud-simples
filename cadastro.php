<?php require_once "autoload.php" ?>
<?php

// Verificando ser os dados foram enviados

if(isset($_POST['cadastro']))
{
    // Efetuando a limpea das informações enviadas
    $vars = [
        'codigo',
        'titulo',
        'genero',
        'situacao',
        'idioma',
        'autor',
        'observacao',
    ];
    foreach ($vars as $indice) {
        $$indice = filter_input(INPUT_POST,$indice, FILTER_SANITIZE_STRING );
    }
    $valor = filter_input(INPUT_POST,"valor", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND );

    // verificando ser os campos foram preenchidos
    if($codigo == "" || $codigo == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo codigo é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    elseif($titulo == "" || $titulo == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo titulo é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    elseif($genero == "" || $genero == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo genero é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    elseif($situacao == "" || $situacao == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo situação é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    elseif($valor == "" || $valor == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo valor é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    elseif($idioma == "" || $idioma == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
             <p>O campo idioma é obrigatorio</p>
             <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="Botão Fecha">
          </div>'
         ;
    }
    else
    {
        // Instanciando a class livro
        $cadastro = new Livro();

        // Setando os atributos
        $cadastro->__set("codigo",$codigo);
        $cadastro->__set("titulo",$titulo);
        $cadastro->__set("genero",$genero);
        $cadastro->__set("situacao",$situacao);
        $cadastro->__set("valor",$valor);
        $cadastro->__set("idioma",$idioma);
        $cadastro->__set("autor",$autor);
        $cadastro->__set("observacao",$observacao);
    
        // Executando o método cadastro
        $cadastro->cadastro();
    }


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
<body id="pagina-cadastro">
    

    <header class="container">
        <h1>Cadastro</h1>
    </header>


    <section class="container">
        <form method="post">
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="codigo">Codigo</label>
                    <input type="text" name="codigo" class="codigo" id="codigo" placeholder="Exemplo: H007236NHK">
                </div>
                <div class="celular-metade">
                    <label for="titulo">Titulo do livro</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Exemplo: Harry Potter">
                </div>
            </div>
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="genero">Gênero</label>
                    <select name="genero" id="genero">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="Ficção Literária">Ficção Literária</option>
                        <option value="Não-Ficção">Não-Ficção</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Ficção Cientifica">Ficção Cientifica</option>
                        <option value="Fantasia">Fantasia</option>
                        <option value="Horror">Horror</option>
                        <option value="Poesia">Poesia</option>
                        <option value="Romance">Romance</option>
                      </select>
                </div>
                <div class="celular-metade">
                    <label for="situacao">Situação</label>
                    <select name="situacao" id="situacao">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Bloqueado">Bloqueado</option>
                      </select>
                </div>
            </div>
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" placeholder="Exemplo: R$ 120.00">
                </div>
                <div class="celular-metade">
                    <label for="idioma">Idioma</label>
                    <select name="idioma" id="idioma">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="Portughes Brasil">Portughes Brasil</option>
                        <option value="Inglês">Inglês</option>
                        <option value="Espanhol">Espanhol</option>
                        <option value="Francês">Francês </option>
                      </select>
                </div>
            </div>

            <div class="celula-total-campo">
                <label for="autor">Autor</label>
                <input type="text"  name="autor" id="autor" placeholder="Exemplo: J. K. Rowling">
            </div>

            <div class="celula-total-campo">
                <label for="observacao">Observação</label>
                <textarea name="observacao" id="observacao" cols="30" rows="10" placeholder="Quantidade no estoque, Marca do tempo etc."></textarea>
            </div>


            <div class="celula-desicao">
                <a href="index.php" class="botao-cancelar">cancelar</a>
                <button class="botao-continua" type="submit" name="cadastro">continua</button>
            </div>

        </form>

    </section>



</body>
</html>