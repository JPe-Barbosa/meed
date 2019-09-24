<html>
	<head>
		<title>exercicio</title>
	</head>
<body> 
                    <form method = "post" name="register" action = "">
                        <div class="row register-form">
                            <div class="col-md-6">
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
                                    <input type="password" class="form-control"  placeholder="Confirme a senha" name="senha" value="" />
                                </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="" />
                                </div>
                                <div class="form-group padding">
                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Telefone" name="numero" value="" />
                                </div>
                                <input type="submit" name="submit" value="cadastrar" class="btnRegister"/>                    
                            </div>
                        </div>
                    </form>
<?php 
if (isset($_POST)){

    $host = "localhost:3306";
    $db_name = "meed";
    $username = "root";
    $password = "";
	
	//
	$conn = null;
	
	//
	try{
		$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
	}catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
		die();
    }
    $sql = "SELECT * from usuarios where email like :n";    

    $query = $conn->prepare($sql);

    $query -> bindParam(':n', $_POST['nome']);
	
	//
    $query->execute();
	
	//
	$num = $query->rowCount();
	echo "teste1";
 
    if($num == 0){
        echo "teste";
        if (isset($_POST['submit'])){ //o form foi enviado
        //cadastrando o nome 
            $nomePost = isset($_POST['nome']) ? $_POST['nome']: null;
        //cadastrando a senha
            $senhaPost = isset($_POST['senha']) ? $_POST['senha']: null;
        //cadastrando o sobrenome
            $sobrenomePost = isset($_POST['sobrenome']) ? $_POST['sobrenome']: null;
        //cadastrando o email
            $emailPost = isset($_POST['email']) ? $_POST['email']: null;
        //cadastrando o telefone
            $telPost = isset($_POST['telefone']) ? $_POST['telefone']: null;

            $sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone ,senha) VALUES (:n,:s,:e,:t,:se)";
            
                $query = $conn -> prepare($sql);
                
            $query -> bindParam(":n" , $nomePost);
            $query -> bindParam(":se" , $senhaPost);
            $query -> bindParam(":s" , $sobrenomePost);
            $query -> bindParam(":e" , $emailPost);
            $query -> bindParam(":t" , $telPost);

        
        if ($query -> execute ()) {
            echo "usuario cadastrado com sussesso!";
        }else{
            echo "ocorreu algum erro";
        }
    }
    }else{
        echo "esses email já foi cadastrado";
    }


}
?>
</body>
</html>