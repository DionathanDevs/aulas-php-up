<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="estoque.php" method="post">
        <label for="title">Nome</label>
        <input type="text" id="title" name="title">
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor">
        <label for="price">Preço Unitário</label>
        <input type="number" id="price" name="price">
        <label for="quant">Quantidade em Estoque</label>
        <input type="number" id="quant" name="quant">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>