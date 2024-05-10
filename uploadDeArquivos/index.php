<?php
include('conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
    $localArmazenamento = 'arquivosUp/';
    $newName = uniqid();
    $extFile = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));

    if ($extFile != 'png' && $extFile != 'jpg' && $extFile != 'pdf' && $extFile != 'gif') {
        echo '<script>alert("Permitido somente arquivos: JPG, PNG, GIF ou PDF")</script>';
    } else {
        $caminho = $localArmazenamento . $newName . '.' . $extFile;
        move_uploaded_file($arquivo['tmp_name'], $caminho);
        $sqlQuery = "INSERT INTO imagens(nomeArq, caminho, nomeReal) VALUES ('$newName', '$caminho', '{$arquivo['name']}')";
        $mysqli->query($sqlQuery) or die($mysqli->error);
        echo '<script>alert("Arquivo enviado com sucesso!!")</script>';
    }
}
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
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          margin: 0;
     }
     .all{
          display: flex;
          align-items: center;
          justify-content: flex-start;
          flex-direction: column;
          font-size: 4vh;
          background-color: rgb(40, 92, 92);
          height: 100vh;
          color: #fff;
     }
     .links{
          display: flex;
          align-self: center;
          margin-left: -25%;
          justify-content: space-around;
          width: 150%;
     }
     h1{
          margin: 5% 0 7%;
     }
     form{
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          width: 100%;
          margin-bottom: 15%;
     }
     input[type='file']{
          display: none;
     }
     label{
          background-color: black;
          padding: 5%;
          margin: 2%;
          z-index: 1;
          cursor: pointer;
          border-radius: 5px;
          transition: 200ms;
          user-select: none;
     }
     label:hover{
          box-shadow: -0.1px 1px 15px black;

     }
     label:active{
          transform: scale(0.990);
     }
     a{
          user-select: none;
          color: #fff;
          width: 90%;
          margin: 2%;
          border: 1px solid black;
          padding: 2.5% 5%;
          border-radius: 5px;
          transition: 400ms;
          text-transform: capitalize;
          text-shadow: 0.1px 1px 10px black;
          text-decoration: none;
     }
     a:hover{
          background-color: #000;
          text-shadow: none;
     }
     input[type='submit']{
          margin-top: 3%;
          background-color: transparent;
          color: #fff;
          height: 4vh;
          width: 25vh;
          border: 1px solid black;
          cursor: pointer;
          transition: 200ms;
          border-radius: 5px;
          font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
     }
     input[type='submit']:hover{
          background-color:rgb(37, 84, 84);
     }

</style>
<body>    
     <div class="all">
          <h1>Upload de Arquivos</h1>
          <div class="tudo">
               <form action="" method="POST" enctype="multipart/form-data">
                    <label for="file">Selecionar Arquivo</label>
                    <input type="file" name="arquivo" id="file">
                    <input type="submit" value="Enviar">
               </form>
               <div class="links">
                    <a href="arqsUpados.php">Veja as Fotos aqui</a>
                    <a href="pdfs.php">Veja os PDF's aqui</a>
               </div>
          </div>
     </div>
</body>
</html>
