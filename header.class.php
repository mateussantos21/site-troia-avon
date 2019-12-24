<?php
	include ("conexao.class.php");
	$lang = $_POST["lang"];
	$idioma = "true";
	// if($lang == 'br'){
	// 	$idioma = 'true';
	// }else if($lang == 'eua'){
	// 	$idioma = 'false';
	// }else{
	// 	$idioma = 'true';
	// }
	$server = $_SERVER['SERVER_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	$url = "http://" . $server . $endereco;

?>
<html>
	<head>
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://noticia.equipetroia.com.br/site_teste/" />
		<meta property="og:title" content="TROIA - Equipe de Robótica" />
		<meta property="og:image" content="http://noticia.equipetroia.com.br:2082/cpsess8741795793/viewer/home%2fequip614%2fpublic_html%2fnoticia%2fsite_teste%2ffotos/logo-og.jpg" />
		<meta property="og:site_name" content="TROIA - Equipe de Robótica" />
		<title>TROIA - Equipe de Robótica</title>
		<script src="js/angular.js"></script>
		<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script>
		<script src="js/smoothscroll.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.vertical-tabs.css" />
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="shortcut icon" type="image/png" href="fotos/Troia.ico"/>
		<script type="text/javascript">
			$(function($) {
				// Quando o formulário for enviado, essa função é chamada
				$("#formulario").submit(function() {
					// Colocamos os valores de cada campo em uma váriavel para facilitar a manipulação
					var nome = $("#nome").val();
					var email = $("#email").val();
					var mensagem = $("#mensagem").val();
					// Fazemos a requisão ajax com o arquivo envia.php e enviamos os valores de cada campo através do método POST
					$.post('template_mail.php', {nome: nome, email: email, mensagem: mensagem }, function(resposta) {
						if (resposta != false) {
							alert(resposta);
							$("#nome").val("");
							$("#email").val("");
							$("#mensagem").val("");
						}else{
							alert(resposta);
							$("#nome").val("");
							$("#email").val("");
							$("#mensagem").val("");
						}
					});
				});
			});
			$(function(){
				$('#myTabs a').click(function (e) {
					e.preventDefault()
					$(this).tab('show')
				})
			});
			$(function(){
				$('#myModal').on('shown.bs.modal', function () {
					$('#myInput').focus()
				})
			});
			$(function(){
				$('.carousel').carousel({
				  interval: 2000
				})
			});			
		</script>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="idioma">
					<!--<form method="POST" action="<?php echo $url;?>">
						<input type="hidden" name="lang" value="eua"/>
						<button type="submit">
							<img src="fotos/ing.gif" width="40px" height="24px">
						</button>
					</form>
					<form method="POST" action="<?php echo $url;?>">
						<input type="hidden" name="lang" value="br"/>
						<button type="submit">
							<img src="fotos/port.gif" width="40px" height="24px" style="margin-top: 5px;">
						</button>
					</form>-->
				</div>
				<nav class="navbar navbar-default navbar-fixed-top menu">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#noticias';
											}else{
												echo 'index.php#noticias';
											}
										?>" class="smoothScroll">
										<?php if($idioma == 'true'){echo "Home";}else{echo "Home";}?>
									</a>
								</li>
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#historia';
											}else{
												echo 'index.php#historia';
											}
										?>" class="smoothScroll">
									<?php if($idioma == 'true'){echo "História";}else{echo "Story";}?>
									</a>
								</li>
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#robos';
											}else{
												echo 'index.php#robos';
											}
										?>" class="smoothScroll">
									<?php if($idioma == 'true'){echo "Robôs";}else{echo "Robots";}?>
									</a>
								</li>
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#projetos';
											}else{
												echo 'index.php#projetos';
											}
										?>" class="smoothScroll">
									<?php if($idioma == 'true'){echo "Projetos Eletrônicos";}else{echo "Eletronic Projetcs";}?>
									</a>
								</li>
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#parceiros';
											}else{
												echo 'index.php#parceiros';
											}
										?>" class="smoothScroll">
									<?php if($idioma == 'true'){echo "Patrocinadores";}else{echo "Sponsors";}?>
									</a>
								</li>
								<li>
									<a href="
										<?php $endereco = $_SERVER ['REQUEST_URI'];
											if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#projetos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
												echo '#contato';
											}else{
												echo 'index.php#contato';
											}
										?>" class="smoothScroll">
									<?php if($idioma == 'true'){echo "Contato";}else{echo "Contact";}?>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>