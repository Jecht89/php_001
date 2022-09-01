<form action="<?php $_SERVER['SCRIPT_NAME'] ?>" method='POST'>
<p>Inserire nome <input type='text' name='nome' placeholder='Nome'></p>
<input type="hidden" name="nascosto" value="PUT">
</form>

<?php

echo ($_POST['nome']);
echo "<br>";
echo ($_POST['nascosto']);
?>