<?php
	require_once 'php/Comentario.inc.php';
	
	$palabrasProhibidas = Comentario::getPalabrasProhibidas(); 
	
	echo json_encode($palabrasProhibidas);
	
?>
