<?php
     include('conexao.php');
     $newQuery = "SELECT * FROM imagens WHERE caminho LIKE '%.jpg%' OR caminho LIKE '%.png%' OR caminho LIKE '%.gif%'";
     $sql = $mysqli->query($newQuery) or die($mysqli->error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Arquivos Salvos</title>
</head>
<style>
     .foto{
          max-width: 200px;
          max-height: 180px;
     }
</style>
<body>
     <h1>Aqui voce vera os arquivos que estao salvos</h1>
     <?php 
          while($linhas = $sql->fetch_assoc()){
               echo "<img src='$linhas[caminho]' class='foto'>";
          }
     ?>
    <a href="index.php">Clique aqui para voltar para a tela Inicial</a>
</body>
</html>