<div class="content fifth" id="modalidades">
	<div class="content-title">
		<h2><?php if($idioma == 'true'){echo "Modalidades";}else{echo "Modalities";}?></h2>
		<?php
			$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=3";
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
	<div class="tabs-sideways">
		<div class="tabs-ul">
			<ul class="nav nav-tabs tabs-left" role="tablist">
				<?php
					for($i = 1; $i <= 5; $i++){
						if($i == 1){
							$sql = "SELECT competicoes.id as id, competicoes.nome as nome, competicoes.texto_id, competicoes.imagem_id, competicoes.link,
							textos.id, textos.texto, imagens.id, imagens.diretorio 
							FROM textos JOIN competicoes ON competicoes.texto_id = textos.id JOIN imagens ON competicoes.imagem_id = imagens.id WHERE competicoes.id = $i";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$nome = $row["nome"];
									$link = $row["link"];
									echo "<li role='presentation' class='active'><a href='#".$link."' aria-controls='".$link."' role='tab' data-toggle='tab'>".$nome."</a></li>";
								}
							}
						}else{
							$sql = "SELECT competicoes.id as id, competicoes.nome as nome, competicoes.texto_id, competicoes.imagem_id, competicoes.link,
							textos.id, textos.texto, imagens.id, imagens.diretorio 
							FROM textos JOIN competicoes ON competicoes.texto_id = textos.id JOIN imagens ON competicoes.imagem_id = imagens.id WHERE competicoes.id = $i";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$nome = $row["nome"];
									$link = $row["link"];
									echo "<li role='presentation'><a href='#".$link."' aria-controls='".$link."' role='tab' data-toggle='tab'>".$nome."</a></li>";
								}
							}
						}
					}
				?>
			</ul>
		</div>
		<div class="tabs-tab-content">
			<div class="tab-content">
				<?php
					$sql_competicoes = "SELECT competicoes.id as comp_id, competicoes.nome as nome, competicoes.texto_id, competicoes.imagem_id, competicoes.link,
					textos.id, textos.texto, textos.texto_ing, imagens.id, imagens.diretorio 
					FROM textos JOIN competicoes ON competicoes.texto_id = textos.id JOIN imagens ON competicoes.imagem_id = imagens.id";
					$result_competicoes = mysqli_query($conn, $sql_competicoes);
					if (mysqli_num_rows($result_competicoes) > 0) {
						while($row = mysqli_fetch_assoc($result_competicoes)) {
							$nome = $row["nome"];
							$link = $row["link"];							
							if($idioma == 'true'){
								$texto = $row["texto"];
							}else{
								$texto = $row["texto_ing"];
							}							
							$diretorio = $row["diretorio"];
							$id = $row["comp_id"];
							if($id == 1){
								$active = 'active';
							}else{
								$active = '';
							}
							echo "
							<div role='tabpanel' class='tab-pane fade in ".$active."' id='".$link."'>
								<h3>".$nome."</h3>
								<div style='display: inline-block;'>
									<p>
										<img src='".$diretorio."' width='350px' height='auto' style='margin: 0 20px 10px 0;' align='left'>
										".$texto."
								</div>
							</div>
							";
						}
					}
				?>
			</div>
		</div>
	</div>
</div>