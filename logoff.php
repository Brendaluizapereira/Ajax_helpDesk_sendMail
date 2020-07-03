<?php

	session_start();

	//remover indices do array de sessão
	//unset() serve para remover indices de qualquer array
	/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

	unset($_SESSION['x']); // removeria apenas o indice x de session, caso existisse, entre outros

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>'; */
	// devolveria o Session sem o indice removido

	//destruir toda a variavel de sessão
	//session_destroy()

	session_destroy(); // sessão será destruída, mas só após a próxima atualização isso passaria a ser enxergável. por isso, teria que forçar a seguir um redirecionamento para poder enxergar isso

	header('Location: index.php');


?>