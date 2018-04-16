<?

require_once('bd.calzones.php');

$user = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$objBd = new db();
$link = $objBd->conecta_mysql();

$usuario_existe = false;
$email_existe = false;

	//verifica se usuario ja existe
$sql = "select * from tb_users where usuario = '$user'";
if($resultado_id = mysqli_query($link, $sql)){

	$dados_usuario = mysqli_fetch_array($resultado_id);
	if(isset($dados_usuario['usuario'])){
		$usuario_existe = true;
	}

}else{
	echo 'Erro ao tentar localizar';
}

	//verifica se o e-mail ja existe

$sql = "select * from tb_users where email = '$email'";
if($resultado_id = mysqli_query($link, $sql)){

	$dados_usuario = mysqli_fetch_array($resultado_id);
	if(isset($dados_usuario['email'])){
		$email_existe = true;
	}

}else{
	echo 'Erro ao tentar localizar';
}

if($usuario_existe || $email_existe){


	$retorno_get = '';

	if($usuario_existe){
		$retorno_get.= "erro_usuario=1&";
	}

	if($email_existe){
		$retorno_get.= "erro_email=1&";
	}

	
	header('Location: inscrevase.php?'.$retorno_get);
}

die();

$sql = " insert into tb_users(usuario, email, senha) values ('$user', '$email', '$senha')";

	//executar a query
if(mysqli_query($link, $sql)){
	echo 'Uśuário registrado com sucesso';
}else{
	echo 'Erro ao registrar usuário';
}

?>