<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/starter_pack/ie10-viewport-bug-workaround.css" rel="stylesheet">
   
     <!-- Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    -->
    <link href='css/opçoes.css' rel='stylesheet'  type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Inconsolata|Lobster&display=swap" rel="stylesheet">
</head>
<body>
<?php
    session_start();
    if(isset($_POST['senha'])){
        if($_POST['senha'] == $_POST['confirm_senha']){
                include_once 'conexao.php';

                $novoNome = isset($_POST['senha']) ? $_POST['senha']: null;

                $sql= "UPDATE usuarios SET senha = :n WHERE id =". $_SESSION['id'];
                
                $query = $conn -> prepare($sql);

                $query -> bindParam(":n" , $novoNome);

                $query->execute();

                $_SESSION["msg"] ="senha atualizada com sucesso";
            }else{
                $_SESSION["msg"] = "as senhas não coincídem";
            }
        }   
    
?>
    <div class="container myContainer">
        <div class="row myRow">
            <div class="col-md-6 col-sm-12 d-flex justify-content-center myCol">
                <img src="img/Imagem1.png" class="logo">
            </div>
            <div class="col-md-6 col-sm-12">
                <?php
                if(isset($_SESSION['msg'])){
                    echo($_SESSION['msg']);
                    unset($_SESSION['msg']);
                    }
                ?>
                Attu
                <form method="post" action="">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Senha" name="senha" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Confirme a senha" name="confirm_senha" value="" />
                    </div>
                    <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btnRegister"/>  
                </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>