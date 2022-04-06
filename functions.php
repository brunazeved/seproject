<?php 
   $servername = "localhost";
   $username = "root";
   $senha = ""; 
   $dbname = "sistemalogin";
   
   $connect = mysqli_connect($servername, $username, $senha, $dbname);
   
   //verifica erro ao conectar com o banco
   if(mysqli_connect_error()) {
      echo 'Falha na conexão: '.mysqli_connect_error();
   }; 


   function login($connect) {
      $email = $_POST["email"];
      $senha = ($_POST["senha"]);
      if (!empty($email) and !empty($senha)) {
         $query = "SELECT * FROM usuarios WHERE email = '" .$email."' AND senha = '".$senha."' ";
         $execute = mysqli_query($connect, $query);
         $results = mysqli_fetch_assoc($execute);

            if(!empty($results)) {
               session_start();
               $_SESSION['nome'] = $results['nome'];
               $_SESSION['ativa'] = TRUE;
               header("location: index.php");
            }else{
               echo "Email ou senha não encontrados!";
            }
      }else{
         echo "Preencha Email e Senha!";
      }
   }
   
   function logout() {
      session_start();
      session_unset();
      session_destroy();
      header("location: login.php");
   }

   function cadastrar($connect){
      $nome = $_POST['name'];
      $email = $_POST["email"];
      $senha = ($_POST["senha"]);
      if (!empty($email) and !empty($senha)) {
         $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
         $execute = mysqli_query($connect, $query);
         // $results = mysqli_fetch_assoc($execute);
         if($execute){
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');window.location.
            href='login.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário');window.location
            .href='login.php'</script>";
          }
        }
   }

   function upload($connect) {
         $nomeArquivo = $_FILES['arquivo']['name'];
         $tipoArquivo = $_FILES['arquivo']['type'];
         $tamanho = $_FILES['arquivo']['size'];
         $nomeTemporario = $_FILES['arquivo']['tmp_name'];
   
         $arquivosPermitidos = ["png", "jpg", "pdf", "jpeg"];
   
         $verificarExtesao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
   
         $erros = array();
   
         if(!in_array($verificarExtesao, $arquivosPermitidos )) {
            $erros[] = "Tipo de arquivo não permitido";
         }
   
         $maximo = 1024 * 1024 * 1;
   
         if($tamanho > $maximo) {
            $erros[] = "Tamanho de arquivo não permitido";
         }
   
         if(!empty($erros)) {
            forEach($erros as $erro) {
               echo $erro . "<br>";
            }
         } else {
            $pasta = "./anexos/";
            $id = $_SESSION['nome'].'-';
            $novoNome = $id.'img'.'.png';
            move_uploaded_file($nomeTemporario, $pasta.$novoNome);
         }
   }
    
?>