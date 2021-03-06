<?php 

require_once "autoload.php";

// Trazendo as informações baseado no id

// pagendo o id por parametro
$id_parametro = base64_decode($_GET['id']);
// filtrando o id 
$id = filter_var($id_parametro, FILTER_SANITIZE_NUMBER_INT);
// instanciando a class livro
$lista = new Livro();
// setando o atributo id da class
$lista->__set("idLivro", $id);
//executando o método listaRegistro
$registro = $lista->listaRegistro();

// Adicionado os dados em variaveis 
$codigo = $registro[0]['codigo'];
$titulo = $registro[0]['titulo'];
$genero = $registro[0]['genero'];
$situacao = $registro[0]['situacao'];
$valor = $registro[0]['valor'];
$idioma = $registro[0]['idioma'];
$autor = $registro[0]['autor'];
$observacao = $registro[0]['observacao'];



// Verificando ser os dados foram enviados

if(isset($_POST['alterar']))
{
    
    // Efetuando a limpea das informações enviadas
    $codigo = filter_input(INPUT_POST,"codigo", FILTER_SANITIZE_STRING );
    $titulo = filter_input(INPUT_POST,"titulo", FILTER_SANITIZE_STRING );
    $genero = filter_input(INPUT_POST,"genero", FILTER_SANITIZE_STRING );
    $situacao = filter_input(INPUT_POST,"situacao", FILTER_SANITIZE_STRING );
    $valor = filter_input(INPUT_POST,"valor", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND );
    $idioma = filter_input(INPUT_POST,"idioma", FILTER_SANITIZE_STRING );
    $autor = filter_input(INPUT_POST,"autor", FILTER_SANITIZE_STRING );
    $observacao = filter_input(INPUT_POST,"observacao", FILTER_SANITIZE_STRING);


    // verificando ser os campos foram preenchidos

    if($codigo == "" || $codigo == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo codigo é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    elseif($titulo == "" || $titulo == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo titulo é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    elseif($genero == "" || $genero == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo genero é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    elseif($situacao == "" || $situacao == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo situação é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    elseif($valor == "" || $valor == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo valor é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    elseif($idioma == "" || $idioma == null)
    {
        echo 
        ' <div class="alerta alerta-atencao">
            <p>O campo idioma é obrigatorio</p>
            <img src="resource/img/fecha.svg" onclick="fechaAlerta()" alt="">
        </div>'
        ;
    }
    else
    {
        // Instanciando a class livro
        $cadastro = new Livro();

        // Setando os atributos
        $cadastro->__set("idLivro",$id);
        $cadastro->__set("codigo",$codigo);
        $cadastro->__set("titulo",$titulo);
        $cadastro->__set("genero",$genero);
        $cadastro->__set("situacao",$situacao);
        $cadastro->__set("valor",$valor);
        $cadastro->__set("idioma",$idioma);
        $cadastro->__set("autor",$autor);
        $cadastro->__set("observacao",$observacao);

        // Executando o método alterar
        $cadastro->alterar();
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
<body id="pagina-alterar">
    

    <header class="container">
        <h1>Alteração</h1>
    </header>


    <section class="container">
        <form action="" method="post">
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="codigo">Codigo</label>
                    <input type="text" name="codigo" class="codigo" id="codigo" value="<?php echo $codigo ?>" placeholder="Exemplo: H007236NHK">
                </div>
                <div class="celular-metade">
                    <label for="titulo">Titulo do livro</label>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $titulo ?>" placeholder="Exemplo: Harry Potter">
                </div>
            </div>
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="genero">Gênero</label>
                    <select name="genero" id="genero">
                        <option value="Ficção Literária" <?php echo $genero=='Ficção Literária'?'selected':'';?>>Ficção Literária</option>
                        <option value="Não-Ficção" <?php echo $genero=='Não-Ficção'?'selected':'';?>>Não-Ficção</option>
                        <option value="Suspense" <?php echo $genero=='Suspense'?'selected':'';?>>Suspense</option>
                        <option value="Ficção Cientifica" <?php echo $genero=='Ficção Cientifica'?'selected':'';?>>Ficção Cientifica</option>
                        <option value="Fantasia" <?php echo $genero=='Fantasia'?'selected':'';?>>Fantasia</option>
                        <option value="Horror" <?php echo $genero=='Horror'?'selected':'';?>>Horror</option>
                        <option value="Poesia" <?php echo $genero=='Poesia'?'selected':'';?>>Poesia</option>
                        <option value="Romance" <?php echo $genero=='Romance'?'selected':'';?>>Romance</option>
                      </select>
                </div>
                <div class="celular-metade">
                    <label for="situacao">Situação</label>
                    <select name="situacao" id="situacao">
                        <option value="Ativo" <?php echo $situacao=='Ativo'?'selected':'';?>>Ativo</option>
                        <option value="Bloqueado" <?php echo $situacao=='Bloqueado'?'selected':'';?>>Bloqueado</option>
                      </select>
                </div>
            </div>
            <div class="celula-total">
                <div class="celular-metade">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $valor ?>" placeholder="Exemplo: R$ 120.00">
                </div>
                <div class="celular-metade">
                    <label for="idioma">Idioma</label>
                    <select name="idioma" id="idioma">
                        <option value="Portughes Brasil" <?php echo $idioma=='Portughes Brasil'?'selected':'';?>>Portughes Brasil</option>
                        <option value="Inglês" <?php echo $idioma=='Inglês'?'selected':'';?>>Inglês</option>
                        <option value="Espanhol" <?php echo $idioma=='Espanhol'?'selected':'';?>>Espanhol</option>
                        <option value="Francês" <?php echo $idioma=='Francês'?'selected':'';?>>Francês </option>
                      </select>
                </div>
            </div>

            <div class="celula-total-campo">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" value="<?php echo $autor ?>" placeholder="Exemplo: J. K. Rowling">
            </div>

            <div class="celula-total-campo">
                <label for="observacao">Observação</label>
                <textarea name="observacao" id="observacao" cols="30" rows="10"  placeholder="Quantidade no estoque, Marca do tempo etc."><?php echo $observacao; ?></textarea>
            </div>


            <div class="celula-desicao">
                <a href="index.php" class="botao-cancelar">cancelar</a>
                <button class="botao-continua" type="submit" name="alterar">alterar</button>
            </div>

        </form>

    </section>

</body>
</html>