<?php 
	include ("header.class.php");
?>
<div class="content fourth" id="integrantes">
	<div class="content-title">
		<h2><?php if($idioma == 'true'){echo "Integrantes";}else{echo "Members";}?></h2>
		<?php
			$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=16";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($idioma == 'true'){
						echo $row["texto"];
					}else{
						echo $row["texto_ing"];
					}
				}
			}
		?>
	</div>
	<div class="content-perfil" id="content-perfil">
		<?php
			$sql = "SELECT nome, curso, divisao, entrada, imagem_id, imagens.diretorio, facebook FROM integrantes JOIN imagens ON imagem_id = imagens.id ORDER BY nome";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
				echo "
					<a href=".$row['facebook']." target='_blank'>
						<div class='perfil-integrante'>
							<div class='perfil-dados'>
								<div class='perfil-nome'> <p> <label>".$row['nome']."</label> </p> </div>
								<div class='perfil-curso'> <p> <label>Curso:</label> ".$row['curso']." </p> </div>
								<div class='perfil-divisao'> <p> <label>Divisão:</label> ".$row['divisao']." </p> </div>
								<div class='perfil-entrada'> <p> <label>Entrada:</label> ".$row['entrada']." </p> </div>
							</div>
							<div class='perfil-foto'>
								<img src='".$row['diretorio']."' />
							</div>							
						</div>
					</a>
				";
				}
			}
		?>							
	</div>	
	<div style="margin-top: 20px; float: right; width: 100%; text-align: right;">
		<a href="index.php"><button type="button" class="btn btn-primary">
			<?php if($idioma == 'true'){echo "Voltar a página principal";}else{echo "Back to Main Page";}?> 
		</button></a>
	</div>
</div>
<?php
	include("footer.class.php");
?>