<?php

class Livro
{
    // atributos
    private $idLivro;
    private $codigo;
    private $titulo;
    private $genero;
    private $situacao;
    private $valor;
    private $idioma;
    private $autor = "";
    private $observacao = "";

    // Métodos

    public function __get($parametro)
    {
        return $this->$parametro;
    }

    public function __set($parametro, $valor)
    {
        $this->$parametro = $valor;
    }

    public function cadastro()
    {
        $sql = new Sql();

        $parametros = array(
            ":CODIGO" => $this->codigo,
            ":TITULO" => $this->titulo,
            ":SITUACAO" => $this->situacao,
            ":GENERO" => $this->genero,
            ":VALOR" => $this->valor,
            ":IDIOMA" => $this->idioma,
            ":AUTOR" => $this->autor,
            ":OBSERVACAO" => $this->observacao
        );

        $resposta = $sql->executaComando("INSERT INTO livro (codigo, titulo, situacao, genero, valor, idioma, autor, observacao) VALUES 
        (:CODIGO, :TITULO, :SITUACAO, :GENERO, :VALOR, :IDIOMA, :AUTOR, :OBSERVACAO)", $parametros);

        if($resposta == true)
        {
            header("Location:index.php?m=1");
            exit;
        }
        else
        {
            header('Location:index.php?m=2');
            exit;
        }

    }

    public function alterar()
    {
        $sql = new Sql();

        $parametros = array(
            ":ID" => $this->idLivro,
            ":CODIGO" => $this->codigo,
            ":TITULO" => $this->titulo,
            ":SITUACAO" => $this->situacao,
            ":GENERO" => $this->genero,
            ":VALOR" => $this->valor,
            ":IDIOMA" => $this->idioma,
            ":AUTOR" => $this->autor,
            ":OBSERVACAO" => $this->observacao
        );

        $resposta = $sql->executaComando("UPDATE livro SET codigo=:CODIGO,titulo=:TITULO,situacao=:SITUACAO,genero=:GENERO,valor=:VALOR,idioma=:IDIOMA,autor=:AUTOR,observacao=:OBSERVACAO WHERE id_livro = :ID", $parametros);

        if($resposta == true)
        {
            header('Location:index.php?m=3');
            exit;
        }
        else
        {
            header('Location: index.php?m=4');
            exit;
        }
    }

    public function listaRegistro()
    {
        $sql = new Sql();

        $parametros = array(
            ":ID" => $this->idLivro
        );

        $resposta = $sql->select("SELECT  codigo, titulo, situacao, genero, valor, idioma, autor, observacao FROM livro WHERE id_livro = :ID", $parametros);

        return $resposta;
    }

    public function ler()
    {
        $sql = new Sql();

        $parametros = array();

        $resposta = $sql->select("SELECT id_livro, codigo, titulo, situacao, genero, valor, idioma, autor, observacao FROM livro", $parametros);

        return $resposta;

    }

    public function deletar($id)
    {
        $sql = new Sql();

        $parametros = array(
            ":ID" => $id
        );

        $resposta = $sql->executaComando("DELETE FROM livro WHERE id_livro = :ID", $parametros);

        if($resposta == true)
        {
            header('Location: index.php?m=5');
        }
        else
        {
            header('Location: index.php?m=6');
        }
    }

}



?>