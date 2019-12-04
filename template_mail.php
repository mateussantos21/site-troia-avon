<?php
	$email_remetente = $_REQUEST['email'];
	$nome = $_REQUEST['nome'];
	$mensagem = $_REQUEST['mensagem'];
	
	if (empty($nome)) {
		echo "Escreva seu nome";
	}
	// Verifica se o email é válido
	/*else if (!eregi("^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$", $email_remetente)) {
		echo "Digite um email valido";
	} */
	// Verifica se a mensagem foi digitada
	else if (empty($mensagem)) {
		echo "Escreva uma mensagem";
	} 
	else{
    
    date_default_timezone_set("Brazil/East");
    
    //Dados usuario
    $email_destino   = "troia@equipetroia.com.br"; 
    
    //Controle de envio
    $data    = date('d/m/Y');
    $horario = date('H:i:s');  
    
    //Dados remetente
    $assunto         = "Fale Conosco - [SITE]";
    $mensagem       = '<div>
							'.$mensagem.'<br><br><br>
							Mensagem enviada as '.$horario.' do dia '.$data.'.                        
						</div>';
    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=UTF-8\n";
    $headers .= "From: $email_remetente\n"; // remetente
    $headers .= "Return-Path: $email_remetente\n"; // return-path
    $headers .= "Reply-To: $email_destino\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
    $envio = mail($email_destino, $assunto, $mensagem, $headers, "-f$email_destino");

 if($envio){
	echo "Sua mensagem foi enviada com sucesso!";
	echo false;
 }
 else{
  echo 	"Sua mensagem não pode ser enviada. Tente novamente mais tarde.";
 }
 }
?>