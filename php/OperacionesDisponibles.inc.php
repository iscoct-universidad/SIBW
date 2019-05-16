<?php
	$anonimo = ['Acceder a lo que está público'];
	$registrado = ['Editar informacion usuario'];
	$moderador = array_merge($anonimo, ['Borrar comentarios', 'Editar comentarios', 'Todos los comentarios a todos los eventos', 'Buscar comentarios']);
	$gestor = array_merge($registrado, ['Añadir etiqueta a un evento', 'Eliminar etiqueta de un evento', 'Borrar un evento', 'Añadir un evento', 'Modificar un evento', 'Añadir fotos a un evento', 'Eliminar fotos de un evento', 'Listado todos los eventos', 'Buscar un evento']);
	$superusuario = array_merge($moderador, ['Asignar roles de moderador, gestor y superusuario', 'Eliminar rol de moderador, gestor o superusuario']);
	
	$GLOBALS['operacionesDisponibles'] = ['anonimo' => $anonimo, 'registrado' => $registrado, 'moderador' => $moderador, 'gestor' => $gestor, 'superusuario' => $superusuario];
?>
