<?php
     include('conexao.php');
     $newQuery = "SELECT * FROM imagens WHERE caminho LIKE '%.jpg%' OR caminho LIKE '%.png%' OR caminho LIKE '%.gif%'";
     $sql = $mysqli->query($newQuery) or die($mysqli->error);

?><!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Arquivos Salvos</title>
     <style>
          *{
               margin: 0;
               padding: 0;
               box-sizing: border-box;
          }
          body{
               display: flex;
               width: 100%;
               height: 100%;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               background-color: rgb(40, 92, 92);
          }
          .top{
               display: flex;
               width: 100%;
               justify-content: flex-start;
               align-items: center;
               font-family: 'Trebuchet MS', sans-serif;
          }
          .top img{
               width: 100%;
               margin-left: 3.5%;
               height: 100%;
          }
          .top h1{
               text-align: center;
               margin: 2.5%;
               margin-left: 23%;
               color: #fff;
          }
          .top a{
               margin-left: 3.5%;
               width: 5%;
               height: 5%;
          }
          .fotos{
               display: grid;
               grid-template-columns: repeat(3, 1fr); /* Define 3 colunas com largura igual */
               grid-gap: 30px;
               row-gap: 30px;
               gap: 2%;
               margin-bottom: 5%;
               align-items: center;
               justify-content: center;
          }    
          .foto{
               display: flex;
               flex-direction: column;
               align-items: center;
               justify-content: center;
               padding: 2%;
               gap: 10%;
               height: 350px;
               width: 450px;
               background-color: transparent;
               color: #fff;
               font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
               font-size: 3vh;
               text-transform: capitalize;
               border: 5px black double;
               text-shadow: 0.1px 0.1px 10px white;
               border-radius: 5px;
               transition: 300ms;
          }
          .foto img:hover{
               box-shadow: -0.5px -0.9px 10px white;
          }
          .foto img{
               border: 1px solid black;
               width: 90%; 
               height: 70%;
               transition: 300ms;
               cursor: pointer;
               border-radius: 5px;
          }
          #link{
               user-select: none;
               color: #fff;
               width: 40%;
               height: 30%;
               margin: 2%;
               font-size: 2.5vh;
               border: 1px solid black;
               padding: 1%;
               text-align: center;
               border-radius: 5px;
               transition: 400ms;
               text-transform: capitalize;
               text-shadow: 0.1px 1px 10px black;
               text-decoration: none;
          }
          #link:hover{
               background-color: #000;
               text-shadow: 0.1px 0.1px 10px white;
          }
     </style>
</head>
<body>
     <div class="top">
          <a href="index.php" title="Voltar a Página Inicial" ><img src="backWard.png" alt=""></a>
          <h1>Aqui você verá os arquivos que estão salvos</h1>
     </div>
     <div class="fotos">
     <?php 
          while($linhas = $sql->fetch_assoc()){
               echo" 
               <div class='foto'>
               <h3>$linhas[nomeReal]</h3>
               <img src='$linhas[caminho]'>
               </div>
               ";
          }
     ?>
     </div>

    <a href="index.php" id="link">Clique aqui para voltar para a Pagina inicial</a>
    
</body>
</html>
