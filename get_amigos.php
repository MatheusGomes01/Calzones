<?

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$nome_amigo = $_POST['nome_amigo'];
$id_usuario = $_SESSION['id_usuario'];

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "select * from tb_users where usuario like '%$nome_amigo%' and id <> $id_usuario";

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id){
	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		echo '<a href = "#" class = "list-group-item">';
		echo '<storng>'.$registro['usuario'].
		'</strong> <small>'.$registro['email'].'</small>';
		echo '<p class="list-group-item-text pull-right">';
		echo '<button type="button" class="btn btn-info">Seguir</button>';
		echo '</p>';
		echo '<div class="clearfix"></div>';
		echo '</a>';
	}
}else{
	echo 'Amigo inexistente ou erro ao procurar';
}

?>