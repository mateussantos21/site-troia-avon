<div class="content second" id="historia">
	<div class="content-title">
		<h2><?php if($idioma == 'true'){echo "História";}else{echo "Story";}?></h2>
	</div>
	<div class="">
		<div class="col-md-6">
			<?php
				$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=1";
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
		<div class="col-md-6">
			<?php
				$sql = "SELECT id, texto, texto_ing FROM textos WHERE textos.id=2";
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
			<div style="margin-top: 20px; float: right;">
				<a href="integrantes.php"><button type="button" class="btn btn-primary">
					<?php if($idioma == 'true'){echo "Conheça nossos integrantes";}else{echo "Meet our members";}?> 
				</button></a>
			</div>
		</div>
	</div>
</div>