
<?php

session_start();
if (! isset($_SESSION['usuario'])){
    echo "<script>window.location='../login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>controlador</title>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/starter_pack/ie10-viewport-bug-workaround.css" rel="stylesheet">
   
     <!-- Bootstrap -->
     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    -->
        <link href="../css/login.css" rel="stylesheet">
        <link href="../css/controlador.css" rel="stylesheet">
</head>
<body>

<?php

  
    ob_start();

        if(isset($_POST["btnCadUsuario"])){
        include '../conexao.php';

        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        $erro = false;
        //tira todos as tags do array ex: <h1>
        $dados_st = array_map('strip_tags', $dados_rc);
    
        //tira todos os espaços
        $dados = array_map('trim', $dados_st);
        
        if(in_array('',$dados)){
            $erro = true;
            $_SESSION['msg'] = "Necessário preencher todos os campos";
        }

        
        
        if($erro == false){
            $KG = intval($dados['kg']);
            switch($dados['material']){
                case "papelão":
                $valor = 145; 
                break;
                case "Plastico filme":
                $valor = 150;
                break;
                case "Plastico rígido":
                $valor = 462;
                break;
                case "Pet":
                $valor = 675;
                break;
                case "Aluminio":
                $valor = 1000;
                break;
            }
        
            $pontos = $KG * $valor;
            $sql = "SELECT pontos FROM usuarios WHERE ID = :ID";
            $query = $conn -> prepare($sql);

            $query -> bindParam(":ID" , $dados['ID']);

            if($query -> execute ()){
                $vlr_atual = $query->fetch();

                $pontos = $pontos + $vlr_atual['pontos'];

                $sql = "UPDATE usuarios SET pontos =".$pontos." WHERE id = :ID";

                $query = $conn -> prepare($sql);
            
                $query -> bindParam(":ID" , $dados['ID']);

                
                if($query -> execute ()){
                    $_SESSION['msg'] = "pontos atualizado com sucesso";
                }else{
                    $_SESSION['msg'] = "ocorreu algum erro4";
                }
            }else{
                $_SESSION['msg'] = "ocorreu algum erro";
            }
        }
    }
?>
    
<div class="container myContainer-">
        <div class="row myRow">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto myCol">
                <h3 class="text">Inserir Pontos</h3>
                <form method = "post" class="form-signin" action="" name="insert">
                <div class="form-label-group">
                <input name="ID" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">ID</label>
              </div>

                    <div class="form-label-group space">
                        <input name="kg" type="number" id="kg" class="form-control" placeholder="kg" required autofocus>
                        <label for="kg">KG</label>            
                    </div>
                   
                    <div class="space">
                        <select name="material" class="form-control" >
                            <option value="papelão">papelão</option>
                            <option value="Plastico filme">Plastico filme</option>
                            <option value="Plastico rígido">Plastico rígido</option>
                            <option value="Pet">Pet</option>
                            <option value="Aluminio">Aluminio</option>
                        </select>
                    </div>
                    <input type="submit" name="btnCadUsuario" value="inserir" class="btn  text-uppercase"/> 
                    <?php
                        if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        }
                    ?>
                </form>
            </div>
        </div>
</div class="container myContainer-Tabela">
    <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 mx-auto myCol-Tabela">
        <div
            class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div>
            
            </div>

            <b class="white-text mx-3">TABELA DE USUARIOS</b>
            <div class="row">
                <div class="col">
                    <form method ="post" name="busca">
                
                        filtrar por:
                </div>
                <div class="col">
                    <select name="material" class="form-control" type="submit" onchange="this.form.submit()">
                        <option></option>
                        <option value="ID">ID</option>
                        <option value="nome">nome</option>
                        <option value="sobrenome">sobrenome</option>
                        <option value="email">email</option>
                        <option value="telefone">telefone</option>
                    </select>
                    </form>
                </div>
                    <!--da o tipo do form-->
                
                    <?php
                    if(isset($_POST["material"])){
                    if($_POST["material"] == "telefone"){
                        $tipo = "number";
                    }else{
                        $tipo ="text";
                    }
                    $_SESSION['material'] = $_POST["material"];
                    echo "
                        <div class= 'col'>
                        <form method ='post'>
                            <input name='busca' type='".$tipo."'  class='form-control' placeholder='valor'>
                        </div>
                        <div class='col'>
                                <input type='submit'>
                            </div> 
                        </form>      
                    ";
                    }
                    ?>
                
            </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

            <div class="">
                <!--Table-->
                <table class="table table-hover mb-0">

                <!--Table head-->
                <thead>
                    <tr>
                    
                    <th class="th-lg">
                        ID
                    </th>
                    <th class="th-lg">
                        Nome
                    </th>
                    <th class="th-lg">
                        Sobrenome
                    </th>
                    <th class="th-lg">
                        Email
                    </th>
                    <th class="th-lg">
                        telefone
                    </th>
                    <th class="th-lg">
                        pontos
                    </th>
                </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    <?php
                    include '../conexao.php';
                    if(isset($_POST['busca'])){          
                        switch($_SESSION['material']){
                            case "ID":
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios WHERE ID = :I";
                            $dados = "ID";
                            break;
                            case "nome":
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios WHERE nome = :I";
                            $dados = "nome";
                            break;
                            case "sobrenome":
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios WHERE sobrenome = :I";
                            $dados = "sobrenome";
                            break;
                            case "email":
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios WHERE email = :I";
                            $dados = "email";
                            break;
                            case "telefone":
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios WHERE telefone = :I";
                            $dados = "telefone";
                            break;
                        }
                        $query = $conn -> prepare($sql);

                        $query -> bindParam(":I" , $_POST['busca']);
                        }else{
                            $sql = "SELECT ID, nome, sobrenome, email, telefone, pontos FROM usuarios";
                            $query = $conn -> prepare($sql);
                        }

                        $query -> execute ();

                        while ( $linha = $query->fetch()){
                        echo"
                            <tr>
                            <td>".$linha['ID']."</td>
                            <td>".$linha['nome']."</td>
                            <td>".$linha['sobrenome']."</td>
                            <td>".$linha['email']."</td>
                            <td>".$linha['telefone']."</td>
                            <td>".$linha['pontos']."</td>
                            </tr>
                        ";
                        }
                    ?>
                
                    
                </tbody>
                <!--Table body-->
                </table>
                <!--Table-->
            </div>

            </div>

            </div>
        </div>
    </div>
<div>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <!-- maps credential-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCol7eT80HdXb4iQHsNVxW-ZkyUqQLwTJM&callback=initMap"
    type="text/javascript"></script>
    
</body>
</html>