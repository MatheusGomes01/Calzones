<?

	require_once('bd.calzones.php');

	$user = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$objBd = new db();
	$link = $objBd->conecta_mysql();

	$sql = " insert into tb_users(usuario, email, senha) values ('$user', '$email', '$senha')";

	//executar a query
	if(mysqli_query($link, $sql)){
		echo 'Uśuário registrado com sucesso';
	} else{
		echo 'Erro ao registrar usuário';
	}

	?>