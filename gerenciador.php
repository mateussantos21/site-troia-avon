<?php
    include ("header.class.php");
	$tabela = $_GET['tabela'];
	$id = $_GET['id'];
	$campo = $_GET['campo'];
?>
<!--	<div id="login" class="login" style="padding: 100px; height: -webkit-fill-available;">
			<form method="POST"  align="center">
				<label>Login:</label><input type="text" name="login" id="login"><br>
				<label>Senha:</label><input type="password" name="senha" id="senha"><br>
				<input type="submit" value="Entrar" id="entrar" name="entrar"><br>
    		</form>
	</div>
	<?php 
		/*$login = $_POST['login'];
		$entrar = $_POST['entrar'];
		$senha = sha1($_POST['senha']);

		if (isset($entrar)) {
    	$verifica = mysqli_query($conn, "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
        if (mysqli_num_rows($verifica)<=0){
          echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='gerenciador.php';</script>";
          die();
        }else{
			echo "<script> document.getElementById('login').style.display = 'none'; </script>"*/
	?>-->
		<div class="content fifth gerenciador">
			<div class="tabs-sideways">
				<div class="tabs-tab-content">
					<div class="tab-content">
						<div class="tab-pane active" id="alterar">
							<?php 
								if($tabela != "" && $id != "" && $campo != ""){
									$sql_alterar = "SELECT ".$campo." FROM ".$tabela." WHERE ".$tabela.".id = ".$id."";
									$result_alterar = mysqli_query($conn, $sql_alterar);
									if (mysqli_num_rows($result_alterar) > 0) {
										while($row = mysqli_fetch_assoc($result_alterar)) {
											$value = $row["$campo"];
							?>			
									<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" >
										<table>
											<tr style="border: 10px solid transparent;" >
												<td>
													<label><?php echo ucfirst($campo).":";?></label>
												</td>
												<td>
													<textarea required="required" name="campo_alterar" id="campo_alterar" rows="5" cols="60" maxlength="5000" class="input-sm form-control"><?php echo $value;?></textarea>
												</td>
											</tr>
											<input type="hidden" name="tabela" value="<?php echo $tabela;?>">
											<input type="hidden" name="campo" value="<?php echo $campo;?>">
											<input type="hidden" name="id" value="<?php echo $id;?>">
											<tr style="border: 10px solid transparent;" >
												<td colspan="2" class="colcenter">
													<input class="btn btn-primary input-md" type="submit" value="Atualizar" name="alterar">
												</td>
											</tr>
										</table>
									</form>
									
							<?php
										}
									}
									echo "<a href='gerenciador.php'><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-circle-arrow-left' aria-hidden='true'></span> Voltar à página principal</button></a>";
								}else{
							?>							
									<div class="margin-table">
										<table class="border-table">
											<tr class="border-table negrito-table">
												<td class="border-table width-table-td cor-table-tr-title">ALTERAR NOTÍCIAS</td>
												<td class="border-table width-table-td cor-table-tr">Título</td>
												<td class="border-table width-table-td cor-table-tr">Título Ing</td>
												<td class="border-table width-table-td cor-table-tr">Descrição</td>
												<td class="border-table width-table-td cor-table-tr">Descrição Ing</td>
												<td class="border-table width-table-td cor-table-tr">Texto</td>
												<td class="border-table width-table-td cor-table-tr">Texto Ing</td>
											</tr>
											<?php
												$sql_noticias = "SELECT noticias.id as noticias_id, titulo, titulo_ing, descricao, descricao_ing, texto_id, texto, texto_ing FROM noticias JOIN textos ON textos.id = noticias.texto_id";
												$result_noticias = mysqli_query($conn, $sql_noticias);
												if (mysqli_num_rows($result_noticias) > 0) {
													while($row = mysqli_fetch_assoc($result_noticias)) {
														$id = $row["noticias_id"];
														$titulo = $row["titulo"];
														$titulo_ing = $row["titulo_ing"];
														$descricao = $row["descricao"];
														$descricao_ing = $row["descricao_ing"];
														$texto_id = $row["texto_id"];
														$texto = $row ["texto"];
														$texto_ing = $row ["texto_ing"];
											?>
											<tr class="border-table tr-odd-even">
												<td class="border-table padding-table cor-table-tr">
													<?php echo $titulo;?>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=noticias&id=<?php echo $id;?>&campo=titulo">													
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=noticias&id=<?php echo $id;?>&campo=titulo_ing">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>	
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=noticias&id=<?php echo $id;?>&campo=descricao">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>	
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=noticias&id=<?php echo $id;?>&campo=descricao_ing">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>	
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=textos&id=<?php echo $texto_id;?>&campo=texto">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>	
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=textos&id=<?php echo $texto_id;?>&campo=texto_ing">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>	
												</td>
											</tr>
											<?php
													}
												}
											?>
										</table>
									</div>
									<div class="margin-table">
										<table class="border-table" >
											<tr class="border-table negrito-table">
												<td class="border-table width-table-td cor-table-tr-title">ALTERAR ROBÔS</td>
												<td class="border-table width-table-td cor-table-tr" style="color: #fff; background: #00a550;" >Nome</td>
												<td class="border-table width-table-td cor-table-tr" style="color: #fff; background: #00a550;" >Link</td>
												<td class="border-table width-table-td cor-table-tr" style="color: #fff; background: #00a550;" >Texto</td>
												<td class="border-table width-table-td cor-table-tr" style="color: #fff; background: #00a550;" >Texto Ing</td>
											</tr>
											<?php
												$sql_robos = "SELECT robos.id as id, robos.link, robos.nome as nome, texto_id, textos.texto, textos.texto_ing FROM robos JOIN textos ON texto_id = textos.id;";
												$result_robos = mysqli_query($conn, $sql_robos);
												if (mysqli_num_rows($result_robos) > 0) {
													while($row = mysqli_fetch_assoc($result_robos)) {
														$id = $row["id"];
														$link = $row["link"];
														$nome = $row["nome"];											
														$texto_id = $row["texto_id"];
														$texto = $row ["texto"];
														$texto_ing = $row ["texto_ing"];
											?>
											<tr class="border-table tr-odd-even">
												<td class="border-table width-table-td cor-table-tr" >
													<?php echo $nome;?>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=robos&id=<?php echo $id;?>&campo=nome">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=robos&id=<?php echo $id;?>&campo=link">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=textos&id=<?php echo $texto_id;?>&campo=texto">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>
												</td>
												<td class="border-table width-table-td">
													<a href="gerenciador.php?tabela=textos&id=<?php echo $texto_id;?>&campo=texto_ing">
														<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
													</a>
												</td>
											</tr>
											<?php
													}
												}
											?>
										</table>
									</div>
							<?php
								}
							?>
						</div>
						<div class="tab-pane" id="news">
							<div class="col-md-12">
								<div style="padding: 30px;">
									<h3>Adicionar uma nova Notícia</h3>
									<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" enctype="multipart/form-data" >
										<table style="border: 10px solid transparent;" >
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Título:</label>
												</td>
												<td><input required="required" type="text" name="titulo_noticia" id="titulo_noticia" class="input-sm form-control"/></td>
											</tr>											
											<tr>
												<td>
													<label>Título em Inglês:</label>
												</td>
												<td><input required="required" type="text" name="titulo_ing_noticia" id="titulo_ing_noticia" class="input-sm form-control"/></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Descrição:</label>
												</td>
												<td><textarea required="required" name="descricao_noticia" id="descricao_noticia" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Descrição em Inglês:</label>
												</td>
												<td><textarea required="required" name="descricao_ing_noticia" id="descricao_ing_noticia" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Texto:</label>
												</td>
												<td><textarea required="required" name="texto_noticia" id="texto_noticia" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Texto em Inglês:</label>
												</td>
												<td><textarea required="required" name="texto_ing_noticia" id="texto_ing_noticia" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Imagem da notícia:</label>
												</td>
												<td><input required="required" type="file" name="imagem_noticia" id="imagem_noticia" class="input-sm form-control"/></td>
											</tr>												
											<tr style="border: 10px solid transparent;" >
												<td colspan="2" class="colcenter">
													<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-noticia">
												</td>
											</tr>
										</table>
									</form>
								</div>
								<h3>Remover Notícia</h3>
								<div class="margin-table">
									<table class="border-table">
										<tr class="border-table negrito-table">
											<td class="border-table width-table-td cor-table-tr-title">Título</td>
											<td class="border-table width-table-td cor-table-tr">Deletar</td>
										</tr>
										<?php
											$sql_noticias = "SELECT id, titulo FROM noticias";
											$result_noticias = mysqli_query($conn, $sql_noticias);
											if (mysqli_num_rows($result_noticias) > 0) {
												while($row = mysqli_fetch_assoc($result_noticias)) {
													$nome = $row["titulo"];
													$id = $row["id"];
										?>
										<tr class="border-table tr-odd-even">
											<td class="border-table padding-table cor-table-tr">
												<?php echo $nome;?>
											</td>
											<td class="border-table width-table-td">
												<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" style="margin-bottom: 0px;">
													<input type="hidden" name="id_noticia" value="<?php echo $id;?>">
													<button type="submit" class="btn btn-danger btn-lg" aria-label="Left Align" name="deletar-noticia" value="Deletar">
														<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
													</button>													
												</form>
											</td>										
										</tr>
										<?php
												}
											}
										?>
									</table>
								</div>	
							</div>
						</div>
						<div class="tab-pane" id="robos">
							<div class="col-md-12">
								<div style="padding: 30px;">
									<h3>Adicionar um novo Robô</h3>
									<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" enctype="multipart/form-data" >
										<table style="border: 10px solid transparent;" >
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Nome:</label>
												</td>
												<td><input required="required" type="text" name="nome_robo" id="nome_robo" class="input-sm form-control"/></td>
											</tr>											
											<tr>
												<td>
													<label>Link:</label>
												</td>
												<td><input required="required" type="text" name="link_robo" id="link_robo" placeholder="Ex.: Pé de Pano = pedepano" class="input-sm form-control"/></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Categoria:</label>
												</td>
												<td>
													<?php 
														$sql = "SELECT id, nome FROM categorias;";
														$result = mysqli_query($conn, $sql);
														if (mysqli_num_rows($result) > 0) {
															echo "<select class='form-control' required='required' name='categoria_id_robo' id='categoria_id_robo' >";
																echo "<option value=''>--Categoria--";
																echo "</option>";
																while($row = mysqli_fetch_assoc($result)) {
																	$id = $row["id"];
																	$nome = $row["nome"];
																	echo "<option value='$id'>$nome";
																	echo "</option>";
																}
															echo "</select>";
														}
													?>
												</td>
											</tr>																					
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Texto:</label>
												</td>
												<td><textarea required="required" name="texto_robo" id="texto_robo" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>											
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Texto em Inglês:</label>
												</td>
												<td><textarea required="required" name="texto_ing_robo" id="texto_ing_robo" rows="5" cols="60" maxlength="5000" class="input-sm form-control"></textarea></td>
											</tr>
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Imagem do Robô:</label>
												</td>
												<td><input required="required" type="file" name="imagem_robo" id="imagem_robo" class="input-sm form-control"/></td>
											</tr>												
											<tr style="border: 10px solid transparent;" >
												<td colspan="2" class="colcenter">
													<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-robo">
												</td>
											</tr>
										</table>
									</form>
									<h3>Adicionar uma nova Categoria</h3>
									<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" >
										<table style="border: 10px solid transparent;" >
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Nome:</label>
												</td>
												<td><input required="required" type="text" name="nome_categoria" id="nome_categoria" class="input-sm form-control"/></td>
											</tr>																																
											<tr style="border: 10px solid transparent;" >
												<td>
													<label>Descrição:</label>
												</td>
												<td><input required="required" type="text" name="descricao_categoria" id="descricao_categoria" class="input-sm form-control"/></td>
											</tr>																			
											<tr style="border: 10px solid transparent;" >
												<td colspan="2" class="colcenter">
													<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-categoria">
												</td>
											</tr>
										</table>
									</form>
									<h3>Remover robo</h3>
									<div class="margin-table">
										<table class="border-table">
											<tr class="border-table negrito-table">
												<td class="border-table width-table-td cor-table-tr-title">Nome</td>
												<td class="border-table width-table-td cor-table-tr">Deletar</td>
											</tr>
											<?php
												$sql_robos = "SELECT id, nome FROM robos";
												$result_robos = mysqli_query($conn, $sql_robos);
												if (mysqli_num_rows($result_robos) > 0) {
													while($row = mysqli_fetch_assoc($result_robos)) {
														$nome = $row["nome"];
														$id = $row["id"];
											?>
											<tr class="border-table tr-odd-even">
												<td class="border-table padding-table cor-table-tr">
													<?php echo $nome;?>
												</td>
												<td class="border-table width-table-td">
													<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" style="margin-bottom: 0px;">
														<input type="hidden" name="id_robo" value="<?php echo $id;?>">
														<button type="submit" class="btn btn-danger btn-lg" aria-label="Left Align" name="deletar-robo" value="Deletar">
															<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
														</button>													
													</form>
												</td>										
											</tr>
											<?php
													}
												}
											?>
										</table>
									</div>	
								</div>
							</div>
						</div>
						<div class="tab-pane" id="eventos_premios">
							<h3>Adicionar um novo Evento</h3>
							<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" >
								<table style="border: 10px solid transparent;" >
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Nome:</label>
										</td>
										<td><input required="required" type="text" name="nome_evento" id="nome_evento" class="input-sm form-control"/></td>
									</tr>																																
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Local:</label>
										</td>
										<td><input required="required" type="text" name="local_evento" id="local_evento" class="input-sm form-control"/></td>
									</tr>
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Data Inicial:</label>
										</td>
										<td><input required="required" type="date" name="data_inicial_evento" id="data_inicial_evento" class="input-sm form-control"/></td>
									</tr>
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Data Final:</label>
										</td>
										<td><input required="required" type="date" name="data_final_evento" id="data_final_evento" class="input-sm form-control"/></td>
									</tr>	
									<tr style="border: 10px solid transparent;" >
										<td colspan="2" class="colcenter">
											<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-evento">
										</td>
									</tr>
								</table>
							</form>
							<h3>Adicionar um novo Prêmio</h3>
							<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" >
								<table style="border: 10px solid transparent;" >
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Descrição:</label>
										</td>
										<td><input required="required" type="text" name="descricao_premio" id="descricao_premio" class="input-sm form-control"/></td>
									</tr>																																
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Robô:</label>
										</td>
										<td>
											<?php 
												$sql = "SELECT id, nome FROM robos;";
												$result = mysqli_query($conn, $sql);
												if (mysqli_num_rows($result) > 0) {
													echo "<select class='form-control' required='required' name='robo_id_premio' id='robo_id_premio'>";
														echo "<option value =''>--Robô--";
														echo "</option>";
														while($row = mysqli_fetch_assoc($result)) {
															$id = $row["id"];
															$nome = $row["nome"];
															echo "<option value ='$id'>$nome";
															echo "</option>";
														}
													echo "</select>";
												}
											?>
										</td>
									</tr>
									<tr style="border: 10px solid transparent;" >
										<td>
											<label>Evento:</label>
										</td>
										<td>
											<?php 
												$sql = "SELECT id, nome FROM evento;";
												$result = mysqli_query($conn, $sql);
												if (mysqli_num_rows($result) > 0) {
													echo "<select class='form-control' required='required' name='evento_id_premio' id='evento_id_premio'>";
														echo "<option value =''>--Evento--";
														echo "</option>";
														while($row = mysqli_fetch_assoc($result)) {
															$id = $row["id"];
															$nome = $row["nome"];
															echo "<option value ='$id'>$nome";
															echo "</option>";
														}
													echo "</select>";
												}
											?>
										</td>
									</tr>
									<tr style="border: 10px solid transparent;" >
										<td colspan="2" class="colcenter">
											<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-premio">
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div class="tab-pane" id="parceiros" style="text-align: center;">
							<h3>Adicionar um novo patrocinador</h3>
								<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" enctype="multipart/form-data" >
									<table style="border: 10px solid transparent;" >
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Nome:</label>
											</td>
											<td><input required="required" type="text" name="nome_parceiros" id="nome_parceiros" class="input-sm form-control"/></td>
										</tr>																																
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Url:</label>
											</td>
											<td><input type="text" name="url_parceiros" id="url_parceiros" class="input-sm form-control"/></td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Logo:</label>
											</td>
											<td><input required="required" type="file" name="logo_parceiros" id="logo_parceiros" class="input-sm form-control"/></td>											
										</tr>
										<tr>
											<td colspan="2" class="colcenter">
												<p class="bg-danger">As imagens de patrocinadores devem estar na proporção 100x300, 150x450...</p>
											</td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td colspan="2" class="colcenter">
												<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-parceiros">
											</td>
										</tr>
									</table>
								</form>
							<div class="margin-table">
								<table class="border-table">
									<tr class="border-table negrito-table">
										<td class="border-table width-table-td cor-table-tr-title">PARCEIROS</td>
										<td class="border-table width-table-td cor-table-tr">Nome</td>
										<td class="border-table width-table-td cor-table-tr">Link</td>
										<td class="border-table width-table-td cor-table-tr">Deletar</td>
									</tr>
									<?php
										$sql_noticias = "SELECT id, nome, url FROM parceiros";
										$result_noticias = mysqli_query($conn, $sql_noticias);
										if (mysqli_num_rows($result_noticias) > 0) {
											while($row = mysqli_fetch_assoc($result_noticias)) {
												$id = $row["id"];
												$nome = $row["nome"];
												$url = $row["url"];
									?>
									<tr class="border-table tr-odd-even">
										<td class="border-table padding-table cor-table-tr">
											<?php echo $nome;?>
										</td>
										<td class="border-table width-table-td">
											<a href="gerenciador.php?tabela=parceiros&id=<?php echo $id;?>&campo=nome">													
												<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
											</a>
										</td>
										<td class="border-table width-table-td">
											<a href="gerenciador.php?tabela=parceiros&id=<?php echo $id;?>&campo=url">
												<input class="btn btn-primary input-md" type="submit" name="" value="Alterar">
											</a>	
										</td>
										<td class="border-table width-table-td">
											<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" style="margin-bottom: 0px;">
												<input type="hidden" name="parceiros_id" value="<?php echo $id;?>">
												<button type="submit" class="btn btn-danger btn-lg" aria-label="Left Align" name="Deletar" value="Deletar">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>													
											</form>
										</td>										
									</tr>
									<?php
											}
										}
									?>
								</table>
							</div>							
						</div>
						<div class="tab-pane" id="integrantes" style="text-align: center;">
							<h3>Adicionar um novo integrante</h3>
								<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" enctype="multipart/form-data" >
									<table style="border: 10px solid transparent;" >
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Nome:</label>
											</td>
											<td><input required="required" type="text" name="nome_integrantes" id="nome_integrantes" class="input-sm form-control"/></td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Curso:</label>
											</td>
											<td><input required="required" type="text" name="curso_integrantes" id="curso_integrantes" class="input-sm form-control"/></td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Entrada:</label>
											</td>
											<td><input required="required" type="number" name="entrada_integrantes" id="entrada_integrantes" class="input-sm form-control"/></td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Divisão:</label>
											</td>
											<td>
												<select class="form-control" required="required" name="divisao_integrantes" id="divisao_integrantes">
													<option value="">-- Divisão --</option>
													<option value="Mecânica">Mecânica</option>
													<option value="Eletrônica">Eletrônica</option>
													<option value="Gestão">Gestão</option>
												</select>
											</td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Facebook:</label>
											</td>
											<td><input type="text" name="facebook" id="facebook" class="input-sm form-control"/></td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td>
												<label>Foto:</label>
											</td>
											<td><input required="required" type="file" name="foto_integrantes" id="foto_integrantes" class="input-sm form-control"/></td>											
										</tr>
										<tr>
											<td colspan="2" class="colcenter">
												<p class="bg-danger">As fotos de integrantes devem estar na proporção 500x500, 700x700...</p>
											</td>
										</tr>
										<tr style="border: 10px solid transparent;" >
											<td colspan="2" class="colcenter">
												<input class="btn btn-primary input-md" type="submit" value="Cadastrar" name="cadastrar-integrantes">
											</td>
										</tr>
									</table>
								</form>
							<h3>Remover integrante</h3>
								<div class="margin-table">
									<table class="border-table">
										<tr class="border-table negrito-table">
											<td class="border-table width-table-td cor-table-tr-title">Nome</td>
											<td class="border-table width-table-td cor-table-tr">Deletar</td>
										</tr>
										<?php
											$sql_noticias = "SELECT id, nome FROM integrantes";
											$result_noticias = mysqli_query($conn, $sql_noticias);
											if (mysqli_num_rows($result_noticias) > 0) {
												while($row = mysqli_fetch_assoc($result_noticias)) {
													$nome = $row["nome"];
													$id = $row["id"];
										?>
										<tr class="border-table tr-odd-even">
											<td class="border-table padding-table cor-table-tr">
												<?php echo $nome;?>
											</td>
											<td class="border-table width-table-td">
												<form  action="<?php echo "$_SERVER[PHP_SELF]";?>" method="POST" style="margin-bottom: 0px;">
													<input type="hidden" name="id_integrantes" value="<?php echo $id;?>">
													<button type="submit" class="btn btn-danger btn-lg" aria-label="Left Align" name="deletar-integrante" value="Deletar">
														<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
													</button>													
												</form>
											</td>										
										</tr>
										<?php
												}
											}
										?>
									</table>
								</div>	
						</div>
						<div class="tab-pane" id="newsletter" style="text-align: center;">
							<table style="border: 10px solid transparent;" >																		
								<tr style="border: 10px solid transparent;" >
									<td colspan="2" class="colcenter">
										<a href="enviar_newsletter.php">													
											<input class="btn btn-primary input-md" type="submit" name="" value="Enviar Newsletter">
										</a>
									</td>
								</tr>
							</table>
							<iframe width='700px' height='1800px' frameborder='0' src='http://noticia.equipetroia.com.br/template_newsletter.php'></iframe>							
						</div>
					</div>
				</div>
				<div class="tabs-ul">
					<ul class="nav nav-tabs tabs-right" role="tablist">
						<li class="active"><a href="#alterar" data-toggle="tab">Alterar Dados</a></li>
						<li><a href="#news" data-toggle="tab">Add/Remover Notícia</a></li>
						<li><a href="#robos" data-toggle="tab">Add/Remover Robô</a></li>
						<li><a href="#eventos_premios" data-toggle="tab">Add Evento e seus Prêmios</a></li>
						<li><a href="#parceiros" data-toggle="tab">Add/Remover Parceiros</a></li>
						<li><a href="#integrantes" data-toggle="tab">Add/Remover Integrantes</a></li>
						<li><a href="#newsletter" data-toggle="tab">Newsletter</a></li>
					</ul>
				</div>
			</div>	
		</div>
		<?php
			$titulo_noticia = $_POST['titulo_noticia'];
			$titulo_ing_noticia = $_POST['titulo_ing_noticia'];
			$descricao_noticia = $_POST['descricao_noticia'];
			$descricao_ing_noticia = $_POST['descricao_ing_noticia'];
			$texto_noticia = $_POST['texto_noticia'];
			$texto_ing_noticia = $_POST['texto_ing_noticia'];
			$data_postagem = date('d/m/Y');
			$imagem_noticia = $_POST['imagem_noticia'];
			$id_noticia = $_POST['id_noticia'];

			$nome_robo = $_POST['nome_robo'];
			$link_robo = $_POST['link_robo'];
			$categoria_id_robo = $_POST['categoria_id_robo'];
			$texto_robo = $_POST['texto_robo'];
			$texto_ing_robo = $_POST['texto_ing_robo'];
			$imagem_robo = $_POST['imagem_robo'];
			$id_robo = $_POST['id_robo'];

			$nome_categoria = $_POST['nome_categoria'];
			$descricao_categoria = $_POST['descricao_categoria'];

			$nome_evento = $_POST['nome_evento'];
			$local_evento = $_POST['local_evento'];
			$data_inicial_evento = $_POST['data_inicial_evento'];
			$data_final_evento = $_POST['data_final_evento'];

			$descricao_premio = $_POST['descricao_premio'];
			$robo_id_premio = $_POST['robo_id_premio'];
			$evento_id_premio = $_POST['evento_id_premio'];
			
			$campo_alterar = $_POST['campo_alterar'];
			$tabela = $_POST['tabela'];
			$campo = $_POST['campo'];
			$id = $_POST['id'];
			
			$nome_parceiros = $_POST['nome_parceiros'];
			$url_parceiros = $_POST['url_parceiros'];
			$logo_parceiros = $_POST['logo_parceiros'];
			$parceiros_id = $_POST['parceiros_id'];
			
			$nome_integrantes = $_POST['nome_integrantes'];
			$curso_integrantes = $_POST['curso_integrantes'];
			$divisao_integrantes = $_POST['divisao_integrantes'];
			$entrada_integrantes = $_POST['entrada_integrantes'];
			$facebook = $_POST['facebook'];
			$foto_integrantes = $_POST['foto_integrantes'];
			$id_integrantes = $_POST['id_integrantes'];

			/*********************************************************************/	
			if($_POST['cadastrar-noticia']=='Cadastrar'){
				$sql_maior_id_texto = "SELECT max(id) as id FROM textos";
				$result_maior_id_texto = mysqli_query($conn, $sql_maior_id_texto);
				if (mysqli_num_rows($result_maior_id_texto) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_texto)) {
						$maior_id_texto = $row["id"];
						$maior_id_texto = intval($maior_id_texto);
						$maior_id_texto = $maior_id_texto + 1;											
					}
				}
				$sql_maior_id_imagem = "SELECT max(id) as id FROM imagens";
				$result_maior_id_imagem = mysqli_query($conn, $sql_maior_id_imagem);
				if (mysqli_num_rows($result_maior_id_imagem) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_imagem)) {
						$maior_id_imagem = $row["id"];
						$maior_id_imagem = intval($maior_id_imagem);
						$maior_id_imagem = $maior_id_imagem + 1;											
					}
				}
				
				$destino = 'noticias-fotos/' . $_FILES['imagem_noticia']['name']; 
				$arquivo_tmp = $_FILES['imagem_noticia']['tmp_name'];
				$nome_arquivo = $_FILES['imagem_noticia']['name'];		 
				move_uploaded_file( $arquivo_tmp, $destino  );
				if ( isset( $_FILES[ 'imagem_noticia' ][ 'name' ] ) && $_FILES[ 'imagem_noticia' ][ 'error' ] == 0 ) {				 
					$arquivo_tmp = $_FILES[ 'imagem_noticia' ][ 'tmp_name' ];
					$nome = $_FILES[ 'imagem_noticia' ][ 'name' ];				 
					$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );				 
					$extensao = strtolower ( $extensao );					
				}
				
				$sql_insert_texto = "INSERT INTO textos(id,texto, texto_ing) VALUES('$maior_id_texto','$texto_noticia', '$texto_ing_noticia')";
				$result_insert_texto = mysqli_query($conn, $sql_insert_texto);
				$sql_insert_imagem = "INSERT INTO imagens(id,diretorio) VALUES('$maior_id_imagem','http://noticia.equipetroia.com.br/noticias-fotos/".$nome_arquivo."')";
				$result_insert_imagem = mysqli_query($conn, $sql_insert_imagem);
				$sql_insert_noticia = "INSERT INTO noticias(titulo, titulo_ing, descricao, data_postagem, texto_id, imagem_id, descricao_ing)
						VALUES('$titulo_noticia', '$titulo_ing_noticia', '$descricao_noticia', '$data_postagem', $maior_id_texto, $maior_id_imagem, '$descricao_ing_noticia')";
				$result_insert_noticia = mysqli_query($conn, $sql_insert_noticia);
			/*********************************************************************/	
			}
			else if ($_POST['deletar-noticia']=='Deletar') {
				$sql_delete = "DELETE imagens, noticias, textos FROM imagens JOIN noticias JOIN textos WHERE
				 imagens.id = noticias.imagem_id AND textos.id = noticias.texto_id AND noticias.id = ".$id_noticia." ";
				$result_delete = mysqli_query($conn, $sql_delete);
			}
			else if($_POST['cadastrar-robo']=='Cadastrar'){
				
				$sql_maior_id_texto = "SELECT max(id) as id FROM textos";
				$result_maior_id_texto = mysqli_query($conn, $sql_maior_id_texto);
				if (mysqli_num_rows($result_maior_id_texto) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_texto)) {
						$maior_id_texto = $row["id"];
						$maior_id_texto = intval($maior_id_texto);
						$maior_id_texto = $maior_id_texto + 1;											
					}
				}
				$sql_maior_id_imagem = "SELECT max(id) as id FROM imagens";
				$result_maior_id_imagem = mysqli_query($conn, $sql_maior_id_imagem);
				if (mysqli_num_rows($result_maior_id_imagem) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_imagem)) {
						$maior_id_imagem = $row["id"];
						$maior_id_imagem = intval($maior_id_imagem);
						$maior_id_imagem = $maior_id_imagem + 1;											
					}
				}
				
				$destino = 'robos-fotos/' . $_FILES['imagem_robo']['name']; 
				$arquivo_tmp = $_FILES['imagem_robo']['tmp_name'];
				$nome_arquivo = $_FILES['imagem_robo']['name'];
				move_uploaded_file( $arquivo_tmp, $destino  );
				if ( isset( $_FILES[ 'imagem_robo' ][ 'name' ] ) && $_FILES[ 'imagem_robo' ][ 'error' ] == 0 ) {				 
					$arquivo_tmp = $_FILES[ 'imagem_robo' ][ 'tmp_name' ];
					$nome = $_FILES[ 'imagem_robo' ][ 'name' ];				 
					$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );				 
					$extensao = strtolower ( $extensao );					
				}
				
				$sql_insert_texto = "INSERT INTO textos(id, texto, texto_ing) VALUES('$maior_id_texto','$texto_robo', '$texto_ing_robo')";
				$result_insert_texto = mysqli_query($conn, $sql_insert_texto);
				$sql_insert_imagem = "INSERT INTO imagens(id,diretorio) VALUES('$maior_id_imagem','http://noticia.equipetroia.com.br/robos-fotos/".$nome_arquivo."')";
				$result_insert_imagem = mysqli_query($conn, $sql_insert_imagem);
				$sql_insert_robo = "INSERT INTO robos(nome, link, categoria_id, texto_id, imagem_id)
						VALUES('$nome_robo', '$link_robo', $categoria_id_robo, $maior_id_texto, $maior_id_imagem)";
				$result_insert_robo = mysqli_query($conn, $sql_insert_robo);
			/*********************************************************************/		
			}
			else if ($_POST['deletar-robo']=='Deletar') {
				//$sql_delete = "DELETE FROM robos WHERE id = ".$id_robo." ";
				$sql_delete = "DELETE imagens, robos, textos FROM imagens JOIN robos JOIN textos WHERE
				 imagens.id = robos.imagem_id and textos.id = robos.texto_id AND robos.id = ".$id_robo." ";
				$result_delete = mysqli_query($conn, $sql_delete);
			}
			else if($_POST['cadastrar-categoria']=='Cadastrar'){
				$sql_insert_categoria = "INSERT INTO categorias(nome, descricao) VALUES('$nome_categoria', '$descricao_categoria')";
				$result_insert_categoria = mysqli_query($conn, $sql_insert_categoria);				
			/*********************************************************************/		
			}
			else if($_POST['cadastrar-evento']=='Cadastrar'){
				$sql_insert_evento = "INSERT INTO evento(nome, local, data_inicial, data_final) 
										VALUES('$nome_evento', '$local_evento', '$data_inicial_evento', '$data_final_evento')";
				$result_insert_evento = mysqli_query($conn, $sql_insert_evento);		
			/*********************************************************************/	
			}
			else if($_POST['cadastrar-premio']=='Cadastrar'){
				$sql_insert_premio = "INSERT INTO premios(descricao, robo_id, evento_id) 
											VALUES('$descricao_premio', $robo_id_premio, $evento_id_premio)";
				$result_insert_premio = mysqli_query($conn, $sql_insert_premio);				
			}
			else if($_POST['alterar']=='Atualizar'){
				$sql_update = "UPDATE ".$tabela." SET ".$campo." = '".$campo_alterar."' WHERE id = ".$id." ";
				$result_update = mysqli_query($conn, $sql_update);
			}
			else if($_POST['cadastrar-parceiros']=='Cadastrar'){
				$sql_maior_id_imagem = "SELECT max(id) as id FROM imagens";
				$result_maior_id_imagem = mysqli_query($conn, $sql_maior_id_imagem);
				if (mysqli_num_rows($result_maior_id_imagem) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_imagem)) {
						$maior_id_imagem = $row["id"];
						$maior_id_imagem = intval($maior_id_imagem);
						$maior_id_imagem = $maior_id_imagem + 1;											
					}
				}
				
				$destino = 'patrocinadores/' . $_FILES['logo_parceiros']['name'];
				$arquivo_tmp = $_FILES['logo_parceiros']['tmp_name'];
				$nome_arquivo= $_FILES['logo_parceiros']['name'];		 
				move_uploaded_file( $arquivo_tmp, $destino  );
				if ( isset( $_FILES[ 'logo_parceiros' ][ 'name' ] ) && $_FILES['logo_parceiros']['error'] == 0 ) {				 
					$arquivo_tmp = $_FILES[ 'logo_parceiros' ][ 'tmp_name' ];
					$nome = $_FILES[ 'logo_parceiros' ][ 'name' ];				 
					$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );				 
					$extensao = strtolower ( $extensao );					
				}
				
				$sql_insert_imagem = "INSERT INTO imagens(id,diretorio) VALUES('$maior_id_imagem','http://noticia.equipetroia.com.br/patrocinadores/".$nome_arquivo."')";
				$result_insert_imagem = mysqli_query($conn, $sql_insert_imagem);
				$sql_insert_parceiros = "INSERT INTO parceiros(nome, imagem_id, url)
						VALUES('$nome_parceiros', $maior_id_imagem, '$url_parceiros')";
				$result_insert_parceiros = mysqli_query($conn, $sql_insert_parceiros);
			}
			else if($_POST['Deletar']=='Deletar'){
				//$sql_delete = "DELETE FROM parceiros WHERE id = ".$parceiros_id." ";
				$sql_delete = "DELETE imagens, parceiros FROM imagens JOIN parceiros WHERE imagens.id = parceiros.imagem_id AND parceiros.id = ".$parceiros_id." ";
				$result_delete = mysqli_query($conn, $sql_delete);
			}
			else if($_POST['cadastrar-integrantes']=='Cadastrar'){
				$sql_maior_id_imagem = "SELECT max(id) as id FROM imagens";
				$result_maior_id_imagem = mysqli_query($conn, $sql_maior_id_imagem);
				if (mysqli_num_rows($result_maior_id_imagem) > 0) {
					while($row = mysqli_fetch_assoc($result_maior_id_imagem)) {
						$maior_id_imagem = $row["id"];
						$maior_id_imagem = intval($maior_id_imagem);
						$maior_id_imagem = $maior_id_imagem + 1;											
					}
				}
				
				$destino = 'integrantes/' . $_FILES['foto_integrantes']['name']; 
				$arquivo_tmp = $_FILES['foto_integrantes']['tmp_name'];		
				$nome_arquivo= $_FILES['foto_integrantes']['name'];		 
				move_uploaded_file( $arquivo_tmp, $destino  );
				if ( isset( $_FILES[ 'foto_integrantes' ][ 'name' ] ) && $_FILES[ 'foto_integrantes' ][ 'error' ] == 0 ) {				 
					$arquivo_tmp = $_FILES[ 'foto_integrantes' ][ 'tmp_name' ];
					$nome = $_FILES[ 'foto_integrantes' ][ 'name' ];				 
					$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );				 
					$extensao = strtolower ( $extensao );					
				}
				
				$sql_insert_imagem = "INSERT INTO imagens(id,diretorio) VALUES('$maior_id_imagem','http://noticia.equipetroia.com.br/integrantes/".$nome_arquivo."')";
				$result_insert_imagem = mysqli_query($conn, $sql_insert_imagem);
				$sql_insert_integrantes = "INSERT INTO integrantes(nome, curso, divisao, entrada, imagem_id, facebook)
						VALUES('$nome_integrantes', '$curso_integrantes', '$divisao_integrantes', '$entrada_integrantes', $maior_id_imagem, '$facebook')";
				$result_insert_integrantes = mysqli_query($conn, $sql_insert_integrantes);
			}
			else if ($_POST['deletar-integrante']=='Deletar') {
				//$sql_delete = "DELETE FROM integrantes WHERE id = ".$id_integrantes." ";
				$sql_delete = "DELETE imagens, integrantes FROM imagens JOIN integrantes WHERE imagens.id = integrantes.imagem_id AND integrantes.id = ".$id_integrantes." ";
				$result_delete = mysqli_query($conn, $sql_delete);
			}
			
		?>
<!--		<?php
		  /*     	}
    		}*/
		?>-->
	</body>
</html>