<?php

require_once 'global.php';

$quantidade_roupas = 200;
$categoria_id = 5;

$tipo_roupa = ['Camisa', 'Bermuda', 'Calça', 'Blusa', 'Jaqueta'];
$sexo_roupa = ['Masculina', 'Feminina'];
$cor_roupa = ['Vermelha', 'Preta', 'Azul', 'Verde', 'Laranja'];


$conexao = Conexao::pegarConexao();
$conexao->beginTransaction();

try {
    for ($i = 1; $i <= $quantidade_roupas; $i++) {
        $index_tipo = rand(0, 4);
        $index_sexo = rand(0, 1);
        $index_cor = rand(0, 4);
        $index_quantidade = rand(1, 10);
        $index_preco = rand(1, 100);

        $nome = $tipo_roupa[$index_tipo] . " " . $sexo_roupa[$index_sexo] . " " . $cor_roupa[$index_cor];

        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) 
          VALUES (:nome, :preco, :quantidade, :categoria_id)";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':preco', $index_preco);
        $stmt->bindValue(':quantidade', $index_quantidade);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();

        echo $i - $nome . " cadastrada com sucesso!<br>";
    }
}catch (Exception $e){
    echo $e->getMessage();
    $conexao->rollBack();
}

$conexao->commit();






