<?php
$conn = mysqli_connect("localhost", "equip614_db", "cavaco2015", "equip614_troia_db");
if (!$conn->set_charset("utf8")) {
   die("Não foi possível formatar para UTF-8.\n");
}
if(!$conn) {
	die("Erro na conexão MySQL.\n" . mysqli_connect_error());
}
?>