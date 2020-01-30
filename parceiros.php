<div class="content seventh" id="parceiros">
	<div class="content-title">
		<h2><?php if($idioma == 'true'){echo "Nossos Patrocinadores";}else{echo "Our Sponsors";}?></h2>
		<?php
			$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=17";
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
	<div class="content-parceiro">
		<?php
			$sql = "SELECT parceiros.nome, parceiros.imagem_id, parceiros.url, imagens.id, imagens.diretorio FROM parceiros JOIN imagens ON imagem_id = imagens.id ORDER BY nome";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo "
					<div class='imagem-parceiro'>
						<div class='imagem-foto'>
							<a href='".$row['url']."' target='_blank'><img src='"."fotos/img/". $row['diretorio']."' width='210' /></a>
						</div>							
					</div>
					";
				}
			}
		?>							
	</div>
</div>