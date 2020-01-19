<div class="content third" id="noticias">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		<!--	<li data-target="#carousel-example-generic" data-slide-to="3"></li>
			<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			<li data-target="#carousel-example-generic" data-slide-to="5"></li> Retirando bolinhas, deixando de acordo com a qt de noticia-->
		</ol>

	  <!-- Wrapper for slides 1269x539 -->
		<div class="carousel-inner" role="listbox">
		<?php
			$url = "noticia.php?noticia_id=";
			
			$sql = "SELECT noticias.id FROM noticias ORDER BY id desc LIMIT 1";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					for($i = 0; $i < 4; $i++){ /*Tamanho do for de acordo com a quantidade de noticia*/
						if($i == 0){
							$sql = "SELECT noticias.id, noticias.titulo, noticias.titulo_ing, noticias.descricao, noticias.descricao_ing, noticias.data_postagem, noticias.texto_id, 
							noticias.imagem_id, textos.id, imagens.id, imagens.diretorio FROM textos JOIN noticias ON textos.id = noticias.texto_id 
							JOIN imagens ON imagens.id = noticias.imagem_id WHERE noticias.id = $id";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									if($idioma == "true"){
										$titulo = $row['titulo'];
										$descricao = $row['descricao'];
									}else{
										$titulo = $row['titulo_ing'];
										$descricao = $row['descricao_ing'];
									}
									echo "<div class='item active' style='background-image: url("."fotos/img/".$row['diretorio']."); background-position: center top;'>
										<!--<a href='".$url.$id."'>									
											<div class='carousel-caption'>
												<h3>".$titulo."</h3>
												<p>".$descricao."</p>
											</div>
										</a>-->
									</div>";
								}							
							}
						}else{
							$monstro_acordou_porra = $id - $i;
							$sql = "SELECT noticias.id, noticias.titulo, noticias.titulo_ing, noticias.descricao, noticias.descricao_ing, noticias.data_postagem, noticias.texto_id, 
							noticias.imagem_id, textos.id, imagens.id, imagens.diretorio FROM textos JOIN noticias ON textos.id = noticias.texto_id 
							JOIN imagens ON imagens.id = noticias.imagem_id WHERE noticias.id = $monstro_acordou_porra ORDER BY noticias.id desc LIMIT 1";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									if($idioma == "true"){
										$titulo = $row['titulo'];
										$descricao = $row['descricao'];
									}else{
										$titulo = $row['titulo_ing'];
										$descricao = $row['descricao_ing'];
									}
									echo "<div class='item' style='background-image: url("."fotos/img/".$row['diretorio']."); background-position: center top;'>
										<!--<a href='".$url.$monstro_acordou_porra."'>											
											<div class='carousel-caption'>
												<h3>".$titulo."</h3>
												<p>".$descricao."</p>
											</div>
										</a>-->
									</div>";
								}							
							}
						}
					}
				}										
			}
		?>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>