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

<?php  
   session_start();
   if(isset($_SESSION['ativa'])) {
      if(isset($_POST['enviar'])) {
         upload($connect);
      }
      if(isset($_POST['enviar'])) {
         upload($connect);
      }   
?>


<body>   
   <div class="container">
      <nav>
         <div class="links">
            <ul>
               <li><a href="index.php">Painel</a></li>
               <li><a href="usuarios.php">Usuários</a></li>
               <li><a href="sair.php">Sair</a></li>
            </ul>
         </div>           
      </nav>
      <div class="user">
         <h1>Painel Administrativo</h1>
         <p>Bem-Vindo(a), <?php echo $_SESSION['nome'];?>.</p>
         <div class="user-img">
            <img src="./anexos/<?php echo $_SESSION['nome'];?>-img.png" alt="">
         </div>
      </div>
      <div class="upload">
         <h2>Faça upload de sua imagem de perfil:</h2>
         <form method="post" enctype="multipart/form-data">
            <div>
               <input type="file" name="arquivo">
            </div>
            <div>
               <input type="submit" name="enviar">
            </div>
         </form>
      </div>
   </div>
<?php } else{
   echo 'Você não tem permissão!';
}   
?>
</body>
</html>