<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <link href = "css/bootstrap.min.css" rel="stylesheet">
    <link href = "css/login.css" rel="stylesheet">
</head>

<body>
<?php
session_start();
if (isset($_POST['senha']) && isset($_POST['senha'])){
  
  include_once 'conexao.php';
  $senhaPost = isset($_POST['senha']) ? $_POST['senha']: null;
  $emailPost = isset($_POST['email']) ? $_POST['email']: null;

  $erro = false;

  $sql = "SELECT email from usuarios where email like :e";
      
    $query = $conn->prepare($sql);

    $query -> bindParam(':e', $_POST['email']);
    
    $query->execute();
    
    $num = $query->rowCount();

    $sql2 = "SELECT usuario from moders where usuario like :e";

    $query2 = $conn->prepare($sql2);

    $query2 -> bindParam(':e', $_POST['email']);

    $query2->execute();

    $num2 = $query2->rowCount();
  // se ele encontrar um email
 
  if(($num > 0) || ($num2 > 0)){
    //usuario encontrado: procurar a senha
    $sql = "SELECT email, nome, sobrenome, telefone, pontos, id  from usuarios where email like :e and senha like :s";    

    $query = $conn->prepare($sql);

    $query -> bindParam(':e', $_POST['email']);
    $query -> bindParam(':s', $_POST['senha']);

    $query->execute();
  
    $num = $query->rowCount();
    if ($num > 0){
      //usuario e senha ok
      // gravar valores na sessao
      $linha = $query->fetch();
      $_SESSION['email'] = $linha['email'];
      $_SESSION['nome'] = $linha['nome'];
      $_SESSION['sobrenome'] = $linha['sobrenome'];
      $_SESSION['telefone'] = $linha['telefone'];
      $_SESSION['pontos'] = $linha['pontos'];
      $_SESSION['id'] = $linha['id'];

      echo "<script>window.location='index.php'</script>";
      //header('Location: index.php');
    }
    
      $sql = "SELECT usuario ,id  from moders where usuario like :e and senha like :s";    

      $query = $conn->prepare($sql);
  
      $query -> bindParam(':e', $_POST['email']);
      $query -> bindParam(':s', $_POST['senha']);
  
      $query->execute();
    
      $num = $query->rowCount();
      if ($num > 0){
        //usuario e senha ok
        // gravar valores na sessao
        
        $linha = $query->fetch();
        
        $_SESSION['usuario'] = $linha['usuario'];
        $_SESSION['id'] = $linha['id'];
        
        echo "<script>window.location='moder/controlador.php'</script>";
        //header('Location: index.php'); 
    }
    $_SESSION["msg"] ="os campos não coincidem";
    }else{
      // EMAIL não encontrado
      $_SESSION["msg"] ="Email inexistente";
    }
  
}

?>
  
  <div class="container">

    <div class="row">
    
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
   
        <div class="card card-signin my-5">
        <img src="img/Imagem1.png" class="rounded mx-auto d-block logo">
          <div class="card-body">
          <div class="card-title text-center">
          
            <h5 >Sign In</h5>
          </div>
            <form class="form-signin" method="post">
            <?php
            echo"<div class ='erro'>";
              if(isset($_SESSION['msg'])){
              echo($_SESSION['msg']);
              unset($_SESSION['msg']);
              }
            echo"</div>";
            ?>
              <div class="form-label-group">
                <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>


              <div class="form-label-group">
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label myclass" for="customCheck1">lembrar senha</label>
                <a href="cad2.0.php" >registrar</a>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">          
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="js/bootstrap.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>