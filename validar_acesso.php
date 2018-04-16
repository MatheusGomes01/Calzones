<?

	session_start();
	
	require_once('bd.calzones.php');


	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$sql = "select * from tb_users where usuario = '$usuario' and senha = '$senha'";

	$objBd = new db();
	$link = $objBd->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['usuario'])){

			$_SESSION['usuario'] = $dados_usuario['usuario'];
			$_SESSION['email'] = $dados_usuario['email'];

			header('Location: home.php');
		}else{
			header('Location: index.php?erro=1');
		}
	} else{
		echo 'Erro na execução da consulta, entrar em contato com o 959915058';
	}

	//update true/false
	//insert true/false
	//select true/resource
	//delete true/false
	//port_periodo_onlline.asp

?>