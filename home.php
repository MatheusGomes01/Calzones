<?
session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
}

require_once('bd.calzones.php');

$objBd = new db();
$link = $objBd->conecta_mysql();


$id_usuario = $_SESSION['id_usuario'];

// recupera quaantidade de twwets
$sql = "select COUNT(*) as qtde_calzs from tb_calzando where id_user = $id_usuario";

$resultado_id = mysqli_query($link, $sql);
$qtde_calzs = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	$qtde_calzs = $registro['qtde_calzs'];
}else{
	echo 'erro';
}
// recupera a quantidade de seguidores

$sql = "select COUNT(*) as qtde_seguidores from seguidores_calz where seguidor = $id_usuario";

$resultado_id = mysqli_query($link, $sql);
$qtde_calzones = 0;

if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	$qtde_calzones = $registro['qtde_seguidores'];
}else{
	echo 'erro';
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>Calzones</title>
	
	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script type="text/javascript">
		$(document).ready( function(){


			//evento de click
			$('#calz_btn').click( function(){

				if($('#calz_text').val().length > 0){
					
					$.ajax({
						url: 'incluiCalzAqui.php',
						method: 'post',
						data: $('#form_calz').serialize(),
						success: function(data){
							$('#calz_text').val('');
							atualizaCalz();
						}
					});
				}
			});

			function atualizaCalz(){
				//carrega o Calzaqui

				$.ajax({
					url: 'get_calzando.php',
					success: function(data){
						$('#calzando').html(data);
					}
				});
			}

			atualizaCalz();

		});
	</script>
	
</head>

<body>

	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="imagens/calzlogo.jpg" width="400" height="100" />
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="sair.php">Sair<span class="glyphicon glyphicon-log-out"></span></a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container">
		<div class="col-md-3">
			<div class="panel panel-default navbar-left">
				<div class="panel-body">
					<h4><?= $_SESSION['usuario']?></h4>

					<hr />
					<div class="col-md-6 navbar-left">
						CALZPOSTS <br /> <?= $qtde_calzs?>
					</div>
					<div class="col-md-6 navbar-left">
						Seguidores <br /> <?= $qtde_calzones ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 navbar-right">
			<div class="panel panel panel-default">
				<div class="panel-body">
					<a href="procurar_amigos.php">Procurar Amigos | &nbsp;<span class="glyphicon glyphicon-search"></span></a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default navbar-right">
				<div class="panel-body">
					<form id="form_calz" class="input-group">
						<input type="text" id="calz_text" name="calz_text" class="form-control" placeholder="CalzAqui" maxlength="8000" />
						<span class="input-group-btn">
							<button class="btn btn-primary" id="calz_btn" type="button">Calz</button>
						</span>
					</form>
				</div>
			</div>				
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="calzando" class="list-group">
				</div>
			</div>
		</div>
	</div>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>