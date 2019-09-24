<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registro</title>
    <link href = "css/bootstrap.min.css" rel="stylesheet">
    <link href = "css/registration.css" rel="stylesheet">
</head>
<body>
<?php 
session_start();
ob_start();
/*Esta função irá ativar o buffer de saída. 
Enquanto o buffer de saída estiver ativo, não é enviada a saída do script (outros que não sejam cabeçalhos), 
ao invés a saída é guardada em um buffer interno.*/
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
    if($btnCadUsuario){
    
    include_once 'conexao.php';
    
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$erro = false;
    
    //tira todos as tags do array ex: <h1>
    $dados_st = array_map('strip_tags', $dados_rc);
    
    //tira todos os espaços
    $dados = array_map('trim', $dados_st);
    
    //procura algum campo vazio
	if(in_array('',$dados)){
		$erro = true;
        $_SESSION['msg'] = "Necessário preencher todos os campos";
    //número minimo para senha
	}elseif((strlen($dados['senha'])) < 6){
		$erro = true;
        $_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
    //verifica se há o caractere ''
	}elseif(stristr($dados['senha'], "'")) {
		$erro = true;
        $_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
    //verifica se as senhas coincidem
    }elseif($dados['senha'] != $dados['confirm_senha']){
        $erro =true;
        $_SESSION['msg'] = "as senhas não coincidem";
    //verifica se o email já foi cadastrado
	}else{		
		$sql = "SELECT * from usuarios where email like :e";    

        $query = $conn->prepare($sql);

        $query -> bindParam(':e', $dados['email']);
	
        $query->execute();
	
	    $num = $query->rowCount();
    
    if($num != 0){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
    }
    //verifica se no telefone só há números
    /*
    if(!(stristr($dados['telefone'], "1234567890"))){
    $erro = true;
    $_SESSION['msg2'] = "so deve haver números no campo telefone";
    }
	*/
	//var_dump($dados);
	if(!$erro){
		//var_dump($dados);
        
        
        $sql = "INSERT INTO usuarios (nome, sobrenome, Email, telefone ,senha, pontos, cpf) VALUES (:n,:s,:e,:t,:se,0,:cpf)";
            
        $query = $conn -> prepare($sql);
        
        $query -> bindParam(":n" , $dados['nome']);
        $query -> bindParam(":se" , $dados['senha']);
        $query -> bindParam(":s" , $dados['sobrenome']);
        $query -> bindParam(":e" , $dados['email']);
        $query -> bindParam(":t" , $dados['telefone']);
        $query -> bindParam(":cpf", $dados['cpf']);

        
        if ($query -> execute ()) {
            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
        }
    }

}
?>
<div class=" register">
    <div class="row register">
        <div class="col-md-3 register-left">
            <img src="img/Imagem1.png">
            <h3>Seja Bem Vindo</h3>
            <a href="login.php"><button>Login</button></a><br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Criando uma Conta</h3>
                    <form method = "post" action = "">
                        <div class="register-form d-flex justify-content-center">
                            <div class="col-md-6 ">
                            <!--cadastrar todos os campos-->
                            <div class ='remendo'>
                            <?php
                            if(isset($_SESSION['msg'])){
                                echo "<font color='red'>".$_SESSION['msg'];
                                if(isset($_SESSION['msg2'])){
                                    if($_SESSION['msg'] != "Necessário preencher todos os campos"){
                                    echo " & ".$_SESSION['msg2'];
                                    unset($_SESSION['msg2']);
                                    }
                                echo "</font>";
                                }
                                unset($_SESSION['msg']);
                            }else{
                                if(isset($_SESSION['msg2'])){
                                    echo "<font color='red'>".$_SESSION['msg2']."</font>";
                                    unset($_SESSION['msg2']);
                                }
                                }
                            if(isset($_SESSION['msgcad'])){
                                echo "<font color='green'>".$_SESSION['msgcad']."</font>";
                                unset($_SESSION['msgcad']);

                            }
                            ?>
                            </div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control" placeholder="Nome" name="nome" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="senha" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control"  placeholder="Confirme a senha" name="confirm_senha" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="" />
                                </div>
                                <div class="form-group padding">
                                    <input type="text" minlength="10" maxlength="20" class="form-control" placeholder="Telefone" name="telefone" value="" />
                                </div>
                                <div class="form-group padding">
                                    <input type="text" minlength="11" maxlength="11" class="form-control" placeholder="cpf" name="cpf" value="" />
                                </div>
                                <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btnRegister"/>   
                            </div>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script src="js/bootstrap.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>
<!------ Include the above in your HEAD tag ---------->

