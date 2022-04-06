<?php require_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./styles/style.css">
   <title>Login</title>
</head>
<body>
   <div class="form-login">
      <?php 
         if(isset($_POST['logar'])) {
            login($connect); 
         }       
         
         if(isset($_POST['cadastrar'])) {
            cadastrar($connect);
         }
      ?>

      <div class="wrapper">
         <form method="POST" action="" class="form">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Digite seu Email" required>
            <input type="password" name="senha" placeholder="Digite sua Senha" required>
            <input type="submit" name="logar" value="Logar">
         </form>
      </div>

      <div class="wrapper">         
      <form method="POST" action="" class="form">
         <h2>Ainda não possui cadastro? Então cadastre-se!</h2>
         <input type="text" name="name" placeholder="Digite seu Nome" required>
         <input type="email" name="email" placeholder="Digite seu Email" required>         
         <input type="password" name="senha" placeholder="Digite sua Senha" required>
         <input type="submit" name="cadastrar" value="Cadastrar">
      </form>
      </div>     
   </div>
</body>
</html>