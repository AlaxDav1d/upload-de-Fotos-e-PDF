<?php
     include('conexao.php');
     $arquivo = $_FILES['arquivo'];
     $localArmazenamento = 'arquivosUp/';
     $nameFile = $arquivo['name'];
     $newName = uniqid();
     $extFile = strtolower(pathinfo($arquivo['name'],PATHINFO_EXTENSION));
     $caminho = $localArmazenamento . $newName . '.' . $extFile;
     $sqlQuery = "INSERT INTO imagens(nomeArq,caminho) VALUES('$newName','$caminho')";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Upload de Arquivos</title>
</head>
<style>
     body{
          color: white;
     }
     
     .all{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          font-size: 4vh;
          color: black;
     }
</style>
<body>    
     <div class="all">
     <h1>Upload de Arquivos</h1>
     <form action="" method="POST" enctype="multipart/form-data">
          <input type="file" name="arquivo">
          <input type="submit" value="Enviar Arquivo">
          
          <?php
                    if($extFile != 'png' && $extFile != 'jpg' && $extFile != 'pdf' && $extFile != 'gif'){
                         echo '<script>alert("Permitido somente arquivos: JPG,PNG,GIF ou PDF")</script>';
                    }else{
                         move_uploaded_file($arquivo['tmp_name'],$localArmazenamento . $newName . "." . $extFile);
                         $mysqli->query($sqlQuery) or die($mysqli->error);
                         echo '<script>alert("Arquivo enviado com sucesso!!")</script>';
                    }
          ?>
     </form>
     <a href="arqsUpados.php">Veja as Fotos aqui</a>
     <a href="pdfs.php">Veja os PDF's aqui</a>
     </div>
</body>
</html>