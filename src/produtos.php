<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php'; ?>
<?php

try{
    $lista = Produto::listar();
}catch (Exception $e){
    Erro::trataErro();
}


?>

<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) >= 0) {?>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha) { ?>
                <tr>
                    <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td><?php echo $linha['preco'] ?></td>
                    <td><?php echo $linha['quantidade'] ?></td>
                    <td><?php echo $linha['categoria_nome'] ?></td>
                    <td><a href="/produtos-editar.php?=<?php echo $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a href="produtos-excluir-post.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else{
            echo "<p>Nenhum produto cadastrado";
        }?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
