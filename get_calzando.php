<?

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$id_usuario = $_SESSION['id_usuario'];

$objBd = new db();
$link = $objBd->conecta_mysql();

$sql = "select date_format(p.dt_Calz, '%d %b %Y %T') as dt_Calz_formatada, p.CalZaquiText,  u.usuario ";
$sql.= " from tb_calzando as p join tb_users as u on (p.id_user = u.id) ";
$sql.= " where id_user = $id_usuario or id_user in (select seguidor from seguidores_calz where id_usuario = $id_usuario) order by dt_Calz desc";

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id){
	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		echo '<a href = "#" class = "list-group-item">';
		echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small> - '.$registro['dt_Calz_formatada'].'</small></h4>';
		echo '<p class="list-group-item-text">'.$registro['CalZaquiText'].'</p>';
		echo '</a>';
	}
}else{
	echo 'Erro ao Calzar';
}

?>