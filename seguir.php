<?

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['seguir_id_usuario'];
	
if($id_usuario == '' || $seguir_id_usuario == ''){
	die;
}

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "insert into seguidores_calz(id_usuario, seguidor) values($id_usuario, $seguir_id_usuario)";

mysqli_query($link, $sql);

?>