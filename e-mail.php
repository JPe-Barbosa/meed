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
    if(isset($_POST['e-mail'])){
        include_once 'conexao.php';

        $sql = "SELECT * from usuarios where email like :e";    

        $query = $conn->prepare($sql);

        $query -> bindParam(':e', $dados['e-mail']);
	
        $query->execute();
	
	    $num = $query->rowCount();
    
        if($num != 0){
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}else{
            $novoNome = isset($_POST['e-mail']) ? $_POST['e-mail']: null;

            $sql= "UPDATE usuarios SET email = :n WHERE id =". $_SESSION['id'];
            
            $query = $conn -> prepare($sql);

            $query -> bindParam(":n" , $novoNome);

            $query->execute();

            $_SESSION["msg"] ="e-mail atualizado com sucesso";
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
                <form method="post" action="">
                    <div class="form-label-group">
                        <label for="novo_e-mail">Novo e-mail:</label>
                        <input type="email" class="form-control" placeholder="Email" name="e-mail" value="" />         
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