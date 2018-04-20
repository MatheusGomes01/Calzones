<?

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$id_usuario = $_SESSION['id_usuario'];

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "select * from tb_users";

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id){
	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		echo '<a href = "#" class = "list-group-item">';
		echo '<storng>Nome</strong> <small> - email </small>'
		echo '</a>';
	}
}else{
	echo 'Amigo inexiste ou erro ao procurar';
}

?>