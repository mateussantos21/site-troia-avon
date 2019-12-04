<?php 
	include ("header.class.php");
	$noticia_id = $_GET['noticia_id'];
	if($noticia_id == ''){
		echo "<script language= 'JavaScript'>
			location.href='index.php'
		</script>";
	}else{
		
?>
<div class="content news" id="">
	<div class="container-news">
		<div class="main">
			<?php
				$sql_noticias = "SELECT noticias.id as noticias_id, titulo, titulo_ing, data_postagem, texto_id, texto, texto_ing, imagem_id, diretorio FROM imagens JOIN noticias ON 
				imagens.id = noticias.imagem_id JOIN textos ON textos.id = noticias.texto_id WHERE noticias.id = $noticia_id;";
				$result_noticias = mysqli_query($conn, $sql_noticias);
				if (mysqli_num_rows($result_noticias) > 0) {
					while($row = mysqli_fetch_assoc($result_noticias)) {
						$titulo = $row["titulo"];
						$titulo_ing = $row["titulo_ing"];
						$data_postagem = $row ["data_postagem"];
						$texto = $row ["texto"];
						$texto_ing = $row ["texto_ing"];
						$diretorio = $row ["diretorio"];
			?>
			<div class="titulo">
				<h2>
					<?php 
						if($idioma == "true"){
							echo $titulo;
						}else{
							echo $titulo_ing;
						}
					?>
				</h2>
			</div>
			<div class="data-noticia">
				<label>Equipe TROIA | Gestão | 
					<?php 
						echo $data_postagem;
					?>
				</label>
			</div>
			<div class="imagem-noticia">
				<img src="<?php echo $diretorio;?>" width="100%" height="auto">
			</div>
			<div class="texto-noticia">
				<?php 
					if($idioma == "true"){
						echo $texto;
					}else{
						echo $texto_ing;
					}
				?>
			</div>
			<?php			
					}
				}
			?>		
		</div>
		<div class="secundario">
			<div class="cada-noticia-topo">
				<h3>
				<?php 
					if($idioma == "true"){
						echo "Veja mais notícias";
					}else{
						echo "Look more news";
					}
				?>
				</h3>
			</div>
			<?php 
				$sql_cada_noticias = "SELECT id, titulo, titulo_ing, data_postagem FROM noticias WHERE noticias.id != $noticia_id ORDER BY data_postagem desc LIMIT 5";
				$result_cada_noticias = mysqli_query($conn, $sql_cada_noticias);
				if (mysqli_num_rows($result_cada_noticias) > 0) {
					while($row = mysqli_fetch_assoc($result_cada_noticias)) {
						$id = $row["id"];
						$titulo = $row["titulo"];
						$titulo_ing= $row["titulo_ing"];
						$data_postagem= $row["data_postagem"];
			?>
				<div class="cada-noticia">
					<a href="noticia.php?noticia_id=<?php echo $id;?>">
						<h4>
							<?php 
								if($idioma == "true"){
									echo $titulo;
								}else{
									echo $titulo_ing;
								}
							?>
						</h4>
					</a>
					<label><?php echo $data_postagem;?></label>
				</div>						
			<?php			
					}										
				}
			?>
		</div>
	</div>
</div>
<?php
	}
	include("footer.class.php");
?>