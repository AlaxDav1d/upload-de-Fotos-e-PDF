<?php
     include('conexao.php');
     $newQuery = "SELECT * FROM imagens WHERE caminho LIKE '%.pdf%'";
     $sql = $mysqli->query($newQuery) or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Arquivos Salvos</title>
</head>
<body>
     <h1>Aqui voce vera os PDF's que estão salvos</h1>
     <?php 
          while($linhas = $sql->fetch_assoc()){
               echo "<iframe src='$linhas[caminho]'></iframe>";
          }
     ?>
    <a href="index.php">Clique aqui para voltar para a tela Inicial</a>
</body>
</html>