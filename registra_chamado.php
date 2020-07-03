
<?php
	session_start();
	//trabalhando na montagem do texto

	//programar a substituição do # por -
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']); 
	$descricao = str_replace('#', '-', $_POST['descricao']);

	//implode('#', $_POST);

	$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL; //php eol - quebra de linha

	//abrindo o arquivo
	$arquivo = fopen('../../app_help_desk/arquivo.txt', 'a'); //primeiro parametro: nome do arquivo e extensão. se não existir, será criado. segundo: parametro a ser escolhido através da documentação.

	//recebe e escreve uma variavel (por isso criamos a var $arquivo para receber o texto de fopen)
	//escrevendo o texto. fwrite espera 2 parametros: referencia do arquivo que abrimos e o texto a ser escrito dentro desse arquivo.
	fwrite($arquivo, $texto);

	/*echo '<script type="text/javascript">
                        window.alert("Chamado gravado com sucesso!");
                        window.location.href="home.php";
                      </script>';*/

	//fechando o arquivo
	fclose($arquivo);

	//após submissão do formulário, um arquivo txt apareceu na pasta.

	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='home.php';
    </script>");

	//retorna para Home
	header('Location: home.php');
?>