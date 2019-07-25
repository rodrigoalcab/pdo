<?php

require_once "global.php";

$categoria = new Categoria();
$nome = $_POST["nome"];
$categoria->inserir($nome);

header('Location: categorias.php');