<?

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$id_usuario = $_SESSION['id_usuario'];
$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];
	
if($id_usuario == '' || $deixar_seguir_id_usuario == ''){
	die;
}

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "delete from seguidores_calz where id_usuario = $id_usuario and seguidor = $deixar_seguir_id_usuario";

mysqli_query($link, $sql);

?>