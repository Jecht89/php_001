<form action="<?php $_SERVER['SCRIPT_NAME'] ?>" method='POST'>
	<p>Inserire nome <input type='text' name='nome' placeholder='Nome'></p>
	<input type="hidden" name="nascosto" value="PUT">
</form>

<?php

if ($_POST) {
	var_dump($_POST);
	echo "<br>";
	if ($_POST["nascosto"] && $_POST["nascosto"] === "PUT") {

		echo ("hai creato un form per aggiornare un dato esistente!");
	} else {
		echo ("stai inseredo un nuovo dato");
	}

	//echo ($_POST['nome']);
	//echo "<br>";
	//echo ($_POST['nascosto']);
}

?>