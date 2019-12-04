<?php
	include ("conexao.class.php");
	$mensagem = "
	<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'>
		<tbody>
			<tr>
				<td>
					<table border='0' cellpadding='0' cellspacing='0' height='100%' width='600px' style='padding:0; background: #fff; margin: 0 auto;'>
						<tbody>
							<tr>
								<td align='center' valign='top' style='border-collapse:collapse;'>			
									<table border='0' cellpadding='0' cellspacing='0' width='600'>				
										<tbody>						
											<tr>
												<td align='center' valign='top' style='border-collapse:collapse;'>								
													<table border='0' cellpadding='0' cellspacing='0' width='600' style='background-color:#F8F8F8;'>
														<tbody>
															<tr>
																<td align='center' valign='top' style='padding-bottom:20px;border-collapse:collapse;'>
																	<table border='0' cellpadding='0' cellspacing='0' width='100%'>
																		<tbody>
																			<tr>
																				<td class='ecxheaderContent' style='border-collapse:collapse;color:#666666;font-family:Helvetica;font-size:18px;font-weight:bold;line-height:100%;padding-bottom:20px;text-align:left;vertical-align:middle;'>
																					<a href='http://noticia.equipetroia.com.br' target='_blank' style='color:#666666;font-weight:normal;text-decoration:underline;'><img src='http://noticia.equipetroia.com.br/newsletter/cabecalho.png' alt='' border='0' style='padding:0;max-width:600px;border:0;height:auto;line-height:100%;text-decoration:none;' id='ecxheaderImage ecxcampaign-icon'></a>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
												</table>							
												</td>
											</tr>";

	$sql = "SELECT noticias.id as id, titulo, descricao, imagem_id, diretorio FROM noticias JOIN imagens ON imagem_id = imagens.id ORDER BY noticias.id DESC LIMIT 6";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id[] = $row["id"];
			$titulo[] = $row["titulo"];
			$descricao[] = $row["descricao"];
			$diretorio[] = $row["diretorio"];
		}
	}
	$mensagem .= "
											<tr>
												<td align='center' valign='top' style='border-collapse:collapse;'>							
													<table width='600' border='0' cellpadding='0' cellspacing='0' style='background-color:#F8F8F8;'>
														<tr>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[0]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[0]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[0]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[0]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[1]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[1]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[1]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[1]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>							
												</td>
											</tr>
											<tr>
												<td align='center' valign='top' style='border-collapse:collapse;'>							
													<table width='600' border='0' cellpadding='0' cellspacing='0' style='background-color:#F8F8F8;'>
														<tr>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[2]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[2]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[2]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[2]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[3]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[3]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[3]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[3]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>							
												</td>
											</tr>
											<tr>
												<td align='center' valign='top' style='border-collapse:collapse;'>							
													<table width='600' border='0' cellpadding='0' cellspacing='0' style='background-color:#F8F8F8;'>
														<tr>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[4]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[4]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[4]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[4]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
															<td>														
																<table width='300' border='0' cellspacing='0' cellpadding='20'>
																	<tr>
																		<td style='padding-top: 0;'>
																			<a href='http://noticia.equipetroia.com.br/noticia.php?noticia_id=".$id[5]."' target='_blank' style='text-decoration: none; color: #181617;'>
																				<h3 style='color: #00a550; margin-top: 0; margin-bottom: 3px; text-align: center;'>".$titulo[5]."</h3>
																				<p style='text-align: justify; margin: 0;'>
																					<img style='margin-right: 0px;' src='".$diretorio[5]."' align='left' width='260px' height='160px'>
																					<font face='verdana'> &emsp;&emsp; ".$descricao[5]."</font>
																				</p>
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>							
												</td>
											</tr>";
	$mensagem .= "
											<tr>
												<td align='center' valign='top' style='border-collapse:collapse;'>								
													<table border='0' cellpadding='20' cellspacing='0' width='600' style='background-color:#F8F8F8; border-bottom:3px solid #00a550;'>
														<tbody>
															<tr>
																<td align='center' valign='top' style='padding-right:40px;padding-left:40px;border-collapse:collapse; padding-bottom: 0px;'>
																	<table border='0' cellpadding='0' cellspacing='0' width='520px'>
																		<tbody>
																			<tr>
																				<td valign='top' style='border-top:1px solid #BBBBBB;border-bottom:1px solid #BBBBBB;padding-top:20px;padding-bottom:20px;border-collapse:collapse;color:#666666;font-family:Georgia;font-size:12px;line-height:150%;text-align:center;'>
																					<table border='0' cellpadding='0' cellspacing='0' width='400px' style='margin-left: 60px;'>
																						<tbody width='400px'>
																							<tr width='400px'>																			
																								<td width='100px'><label style='font-size: 12px; padding-bottom: 9px; color: #666;'>Apoio</label></td>
																								<td width='100px'><a href='http://www.ufla.br/portal/' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/logos-parceiros/ufla.png' height='25px'></a></td>
																								<td width='100px'><a href='http://radixeng.net/' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/logos-parceiros/radix.png' height='20px'></a></td>
																								<td width='100px'><a href='http://www.tec-ci.com.br/' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/logos-parceiros/tec-ci.png' height='20px'></a></td>
																								<td width='100px'><a href='http://www.grupomaciel.com.br/site/' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/logos-parceiros/maciel.png' height='20px'></a></td>																								
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td valign='top' class='ecxfooterContent' style='padding-top:20px;border-collapse:collapse;color:#666666;font-family:Georgia;font-size:12px;line-height:150%;text-align:center;'><em>&#169; 2016 Equipe TROIA, todos os direitos reservados.</em><br>
																					 Você está recebendo nossa Newsletter porque se inscreveu em nosso site.<br>
																					<br>
																					<strong>Endereço de correspondência:</strong><br>
																					<span>Equipe TROIA</span> (35)3829-4693<br>
																					Av. Doutor Sylvio Menicucci, 1001<br> 
																					Departamento de Engenharia - DEG Bloco 1<br>
																					<span>Kennedy, Lavras</span> - <span>MG</span><br>
																					<span>37200-000</span> Brasil<br>
																				</td>
																			</tr>
																			<tr>
																				<td valign='top' style='border-top:1px solid #BBBBBB;padding-top:20px;padding-bottom:20px;border-collapse:collapse;color:#666666;font-family:Georgia;font-size:12px;line-height:150%;text-align:center;'>
																					<table border='0' cellpadding='0' cellspacing='0' width='400px' style='margin-left: 60px;'>
																						<tbody width='400px'>
																							<tr width='400px'>
																								<td width='250px'><label style='font-size: 12px; padding-bottom: 9px; color: #666;'>Você pode nos acompanhar também no: </label></td>
																								<td width='50px'><a href='https://www.facebook.com/EquipeTROIA/?fref=ts' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/facebook-icon.png' width='30px' height='30px'></a></td>
																								<td width='50px'><a href='https://www.instagram.com/troia_ufla/' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/instagram-icon.png' width='30px' height='30px'></a></td>
																								<td width='50px'><a href='https://www.youtube.com/user/EquipTROIA' target='_blank'><img src='http://noticia.equipetroia.com.br/newsletter/youtube-icon.ico' width='30px' height='30px'></a></td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>								
												</td>
											</tr>
										</tbody>
									</table>			
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
";
	echo $mensagem;

    /*date_default_timezone_set("Brazil/East");
    
    //Dados usuario
	$sql_emails = "SELECT e_mail FROM newsletter";
	$result_emails = mysqli_query($conn, $sql_emails);
	if (mysqli_num_rows($result_emails) > 0) {
		while($row = mysqli_fetch_assoc($result_emails)) {
			$email_destino[] = $row["e_mail"];
		}
	}
    $email_remetente = "troia@equipetroia.com.br";
	//$email_destino = "emanueloliveira38@yahoo.com.br";
	$array_total = count($email_destino);
	$i = 0;
	while($i < $array_total){
    //Dados remetente
		echo $email_destino[$i]."<br>";
		$assunto         = "Equipe TROIA - Notícias";
		$headers = "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=UTF-8\n";
		$headers .= "From: $email_remetente\n"; // remetente
		$headers .= "Return-Path: $email_remetente\n"; // return-path
		$headers .= "Reply-To: $email_destino[$i]\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
		$envio = mail($email_destino[$i], $assunto, $mensagem, $headers, "-f$email_destino");
		$i = $i + 1;
	}*/
?>