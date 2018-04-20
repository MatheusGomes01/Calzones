<?

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$calz_text = $_POST['calz_text'];
$id_usuario = $_SESSION['id_usuario'];
	
if($calz_text == '' || $id_usuario == ''){
	die;
}

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "insert into tb_calzando(id_user, CalZaquiText) values($id_usuario, '$calz_text')";
mysqli_query($link, $sql);

?>