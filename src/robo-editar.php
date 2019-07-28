<?php

require_once 'global.php';

$lista_produtos = Produto::listar();

$query = "UPDATE produtos set preco = :preco, quantidade = :quantidade WHERE id = :id";
$conexao = Conexao::pegarConexao();
$conexao->beginTransaction();

        foreach ($lista_produtos as $produto){
            $stmt = $conexao->prepare($query);

            $novo_preco = rand(1, 100);
            $nova_quantidade = rand(1, 10);

            $stmt->bindValue(':preco', $novo_preco);
            $stmt->bindValue(':quantidade', $nova_quantidade);
            $stmt->bindValue(':id', $produto['id']);
            $stmt->execute();

            echo $produto['nome'] . ' Preço alterado de: ' . $produto['preco'] . ' para: ' . $novo_preco . ' Quantidade alterado de: ' . $produto['quantidade'] . ' para: ' . $nova_quantidade . '<br><br>';
        }

$conexao->commit();





