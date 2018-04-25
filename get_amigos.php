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

$sql = "select a.*, b.* from tb_users as a
left join seguidores_calz as b
on (b.id_usuario = $id_usuario and a.id = b.seguidor)
where a.usuario like '%$nome_amigo%' and a.id <> $id_usuario";

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id){
	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		echo '<a href = "#" class = "list-group-item">';
		echo '<storng>'.$registro['usuario'].
		'</strong> <small>'.$registro['email'].'</small>';
		echo '<p class="list-group-item-text pull-right">';

		$esta_seguindo_sn = isset($registro['seguidor']) && !empty($registro['seguidor']) ? 'S' : 'N';

		$btn_seguir_display = 'block';
		$btn_deixar_seguir_display = 'block';

		if($esta_seguindo_sn == 'N' ){
			$btn_deixar_seguir_display = 'none';
		} else {
			$btn_seguir_display = 'none';
		}

		echo '<button type="button"id="btn_seguir_'.$registro['id'].'" class="btn btn-info btn_seguir" style="display: '.$btn_seguir_display.'" data-id_usuario="'.$registro['id'].'">Calzar</button>';


		echo '<button type="button" id="btn_deixar_seguir_'.$registro['id'].'" style="display: '.$btn_deixar_seguir_display.'" class="btn btn-danger btn_deixar_seguir" data-id_usuario="'.$registro['id'].'">Deixar em paz</button>';


		echo '</p>';
		echo '<div class="clearfix"></div>';
		echo '</a>';
	}
}else{
	echo 'Amigo inexistente ou erro ao procurar';
}

?>