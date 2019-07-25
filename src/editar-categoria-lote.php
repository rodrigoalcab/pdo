<?php

require_once "classes/Categoria.php";

$categoria = new Categoria();
$lista = $categoria->listar();

foreach ($lista as $linha){
    $nova = new Categoria($linha['id']);
    $nova->nome = "Categoria " . $nova->nome;
    $nova->atualizar();
}

$novasCategorias = $categoria->listar();
echo "<pre>";
print_r($novasCategorias);
echo "<pre>";
