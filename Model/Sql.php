<?php


class Sql extends PDO
{
    private $host = HOST;
    private $banco = BANCO;
    private $usuario = USUARIO;
    private $senha = SENHA;


    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->banco", "$this->usuario", "$this->senha");
    }

    public function executaComando($sql, $parametros = array())
    {
        $stmt = $this->prepare($sql);

        foreach($parametros as $indice => $valor)
        {
            $stmt->bindValue($indice, $valor);
        }

        if($stmt->execute())
        {
            return $mensagem = true;
        }
        else
        {
            return $mensagem =  false;
        }
        
    }


    public function select($sql, $parametros = array())
    {
        $stmt = $this->prepare($sql);

        foreach($parametros as $indice => $valor)
        {
            $stmt->bindValue($indice, $valor);
        }

        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}


?>