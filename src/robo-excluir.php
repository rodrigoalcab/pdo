<?php

require_once 'global.php';

$lista_produtos = Produto::listar();

//DIRETO
//$query = "DELETE FROM produtos WHERE preco <= :preco AND quantidade <= :quantidade";
//DIRETO

$query = "DELETE FROM produtos WHERE id = :id";
$conexao = Conexao::pegarConexao();
$conexao->beginTransaction();

$preco_minimo = 50;
$quantidade_minima = 5;

        foreach ($lista_produtos as $produto){
            $stmt = $conexao->prepare($query);

            if($produto['preco'] <= $preco_minimo && $produto['quantidade'] <= $quantidade_minima) {

                $stmt->bindValue(':id', $produto['id']);
                $stmt->execute();

                echo $produto['nome'] . ' Preco: ' . $produto['preco'] . ', quantidade: ' . $produto['quantidade'] . ' excluído com sucesso!' . '<br><br>';
            }else{}
        }

$conexao->commit();





