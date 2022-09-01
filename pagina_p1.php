

<!DOCTYPE HTML>
<html>
    
    <h1>Esercizio con metodo get</h1>
    <form action="<?php $_SERVER['SCRIPT_NAME'] ?>" method='get'>
    <p>Inserire nome <input type='text' name='nome' placeholder='Nome'></p>
    <p>Inserire cognome <input type='text' name='cognome' placeholder='Cogome'></p>
    <p>Inserire data di Nascita <input type='date' name='nascita' placeholder='dd-mm-yyyy'></p>  
    <p>Inserire un numero <input type='number' name='numero_r' placeholder='Inserisci un Numero'></p>
    <input type='submit' name='submit_invia' value='Invia'>

    </form>
</html>

<?php

if (isset($_GET['submit_invia'])) {
    $data_nascita = date('Y', strtotime($_GET['nascita']));
    $data_oggi = date('Y'); // current date-time
    $anni = ($data_oggi-$data_nascita);
    if ($_GET['numero_r'] <= 3){        
        echo "Il nome passato è: {$_GET['nome']}, ";
        echo "il cognome passato è: {$_GET['cognome']}, ";
        echo "La data di nascita è: {$_GET['nascita']} e hai: $anni Anni.<br>";
        }

    if ($_GET['numero_r'] > 3){
        for ($i=0; $i < $_GET['numero_r'] ; $i++) { 
            echo "Il nome passato è: {$_GET['nome']}, ";
            echo "il cognome passato è: {$_GET['cognome']}, ";
            echo "La data di nascita è: {$_GET['nascita']} e hai: $anni anni.<br>";
        }

    }
}

?>
