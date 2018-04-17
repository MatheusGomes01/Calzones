<?
session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?error=1');
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
						success: function(data){
							alert(data);
						}
					});
				}
			});

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
				<img src="imagens/icone_twitter.png" />
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="sair.php">Sair</a></li>
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
						CALZPOSTS <br /> 1
					</div>
					<div class="col-md-6 navbar-left">
						Seguidores <br /> 1
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 navbar-right">
			<div class="panel panel panel-default">
				<div class="panel-body">
					<a href="#">Procurar Amigos | &nbsp;<span class="glyphicon glyphicon-search"></span></a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default navbar-right">
				<div class="panel-body">
					<div class="input-group">
						<input type="text" id="calz_text" class="form-control" placeholder="CalzAqui" maxlength="8000" />
						<span class="input-group-btn">
							<button class="btn btn-primary" id="calz_btn" type="button">Calz</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>