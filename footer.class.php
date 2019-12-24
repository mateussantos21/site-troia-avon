			<?php 
				$endereco = $_SERVER ['REQUEST_URI'];
				if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
					echo "<a href='https://docs.google.com/forms/d/e/1FAIpQLSfxHObHxGw8c_VYjPNJ8e1t0s8-03yGYSN9qnhPjwm9Q8vEVQ/viewform'><div class='ps'></div></a>";
				}
				//if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
					//echo "<a href='processo-seletivo.php'><div class='ps'></div></a>";
				//}
				//if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
					//echo "<a href='processo-seletivo-gestao.php'><div class='ps_gestao'></div></a>";
				//}
				if($endereco == '/' or $endereco == '/index.php' or $endereco == '/index.php#noticias' or $endereco == '/index.php#historia' or $endereco == '/index.php#robos' or $endereco == '/index.php#parceiros' or $endereco == '/index.php#contato'){
					echo "<a href=''><div class='gestor'></div></a>";
				}
				
			?>			
			<!-- Modal -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>						
					</div>
				</div>
			</div>
			<div class="content footer" id="contato">
				<div class="content-title">
					<h2><?php if($idioma == 'true'){echo "Contato";}else{echo "Contact";}?></h2>
				</div>
				<div class="col-md-12" style="margin-bottom: 20px;">
					<div class="col-md-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6254.730956765736!2d-44.980725237640996!3d-21.22846669707285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xec418e234ccb83af!2sUniversidade+Federal+de+Lavras!5e0!3m2!1spt-BR!2sbr!4v1466465843049" width="80%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>				
					</div>
					<div class="col-md-6">
						<form onsubmit="return false;" method="POST" id="formulario">
							<table>
								<tr></tr>
								<tr>
									<td>
										<label><?php if($idioma == 'true'){echo "Nome";}else{echo "Name";}?>:</label>
									</td>
									<td><input type="text" name="nome" id="nome" class="input-sm form-control"/></td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td>
										<label>E-mail:</label>
									</td>
									<td><input type="text" name="email" id="email" class="input-sm form-control"/></td></tr>
								<tr></tr>
								<tr>
									<td>
										<label><?php if($idioma == 'true'){echo "Mensagem";}else{echo "Message";}?>:</label>
									</td>
									<td><textarea name="mensagem" rows="5" cols="60" maxlength="140" id="mensagem" class="input-sm form-control"></textarea></td></tr>
								<tr></tr>	
								<tr><td colspan="2" class="colcenter">
									<input class="btn btn-primary input-sm" type="submit" value="<?php if($idioma == 'true'){echo "Enviar";}else{echo "Send";}?>">
								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="col-md-12 col-md-offset-4">
					<div class="social">
						<div class="col-md-4">
							<div class="facebook">
								<a href="https://www.facebook.com/EquipeTROIA/?fref=ts" target="_blank">
									<img src="fotos/gear.png" width="60px" height="60px" />
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="instagram">
								<a href="https://www.instagram.com/troia_ufla/" target="_blank">
									<img src="fotos/gear.png" width="60px" height="60px" />
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="youtube">
								<a href="https://www.youtube.com/user/EquipTROIA" target="_blank">
									<img src="fotos/gear.png" width="60px" height="60px" />
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="footer2">
					<div class="content2">
						<label>© 2019 Copyright Equipe TROIA. Todos os direitos reservados.</label>
						<label>Av. Doutor Sylvio Menicucci, n° 1001, Departamento de Engenharia - DEG Bloco 1, Kennedy, Lavras - MG, CEP 37200-000. Telefone: (35)3829-4693</label>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>