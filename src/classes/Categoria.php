<?php
Class Categoria
{
    public $id;
    public $nome;

    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {

        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir($nome)
    {
        $query = "INSERT INTO categorias (nome) VALUES ('" . $nome . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE categorias set nome = '" . $this->nome . "' WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);

    }

    public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $resposta = $conexao->query($query);
        $lista = $resposta->fetchAll();
        foreach ($lista as $linha){
            $this->nome = $linha['nome'];
        }


    }

    public function excluir()
    {
        $query = "DELETE FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);

    }
}