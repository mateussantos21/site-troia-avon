<div class="content sixth" id="robos">
	<div class="content-title">
		<h2><?php if($idioma == 'true'){echo "Robôs";}else{echo "Robots";}?></h2>
		<?php
			$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=8";
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
		<div class="tabs-tab-content">
			<div class="tab-content">
				<?php
					$sql_robos = "SELECT robos.id as id, robos.link, robos.nome as nome, texto_id, textos.id, textos.texto, textos.texto_ing, imagem_id, imagens.id, imagens.diretorio 
					FROM imagens JOIN robos ON imagem_id = imagens.id JOIN textos ON texto_id = textos.id;";
					$result_robos = mysqli_query($conn, $sql_robos);
					if (mysqli_num_rows($result_robos) > 0) {
						while($row = mysqli_fetch_assoc($result_robos)) {
							$robo = $row["nome"];
							$link = $row["link"];
							if($idioma == 'true'){
								$texto = $row["texto"];
							}else{
								$texto = $row["texto_ing"];
							}		
							$diretorio = $row["diretorio"];
							$id = $row["id"];
							if($id == 1){
								$active = 'active';
							}else{
								$active = '';
							}
							echo "
							<div role='tabpanel' class='tab-pane fade in $active' id='".$link."'>
								<h3>".$robo."</h3>
								<div style='display: inline-block;'>
									<p>
										<img src='".$diretorio."' width='350px' height='auto' style='margin: 0 20px 10px 0;' align='left'>
										".$texto."
									</p>
							</div>
							<div style='display: inline-block;'>
								<h4>Competições</h4>
								
									<ul>
							";
							$sql_premios = "SELECT robos.id, evento.id, evento.data_inicial, evento.nome as evento, evento.local as local, premios.id, premios.descricao, 
							premios.robo_id, premios.evento_id FROM evento JOIN premios ON evento_id = evento.id JOIN robos ON robos.id = robo_id 
							WHERE robos.id = $id ORDER BY data_inicial";
							$result_premios = mysqli_query($conn, $sql_premios);
							if (mysqli_num_rows($result_premios) > 0) {
								while($row = mysqli_fetch_assoc($result_premios)) {
									$descricao = $row["descricao"];
									$evento = $row["evento"];
									$local = $row["local"];
									echo "<li>".$descricao." - ".$evento." - ".$local."</li>";
								}
							echo"		</ul>
								</div>
							</div>";
							}
						}
					}
				?>
			</div>
		</div>
		<!--<div class="tabs-ul">-->
			<ul class="nav nav-tabs tabs-right" role="tablist">
				<?php
					for($i = 1; $i <= 11; $i++){
						if($i == 1){
							$sql = "SELECT robos.id, robos.nome, robos.link FROM robos WHERE id = $i ORDER BY id";
							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$nome = $row["nome"];
									$link = $row["link"];
									echo "<li role='presentation' class='active'><a href='#".$link."' aria-controls='".$link."' role='tab' data-toggle='tab'>".$nome."</a></li>";
								}
							}
						}else{
							$sql = "SELECT robos.id, robos.nome, robos.link FROM robos WHERE id = $i ORDER BY id";
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
		<!--</div>-->
	</div>	
</div>