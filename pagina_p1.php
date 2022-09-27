<!DOCTYPE HTML>
<html>

<h1>Esercizio con metodo get</h1>
<form action="<?php $_SERVER['SCRIPT_NAME'] ?>" method='GET'>
    <p>Inserire nome <input type='text' name='nome' placeholder='Nome'></p>
    <p>Inserire cognome <input type='text' name='cognome' placeholder='Cogome'></p>
    <p>Inserire data di Nascita <input type='date' name='nascita' placeholder='dd-mm-yyyy'></p>
    <p>Inserire un numero <input type='number' name='numero_r' placeholder='Inserisci un Numero'></p>
    <input type='submit' name='submit_invia' value='Invia'>

</form>

</html>

<?php

if ($_GET){

   if($_GET['numero_r']<=3){
      echo "Il nome passato è: ". $_GET['nome'] .", ";
      echo "il cognome passato è: ". $_GET['cognome'] .", ";
      controllo_anni($_GET['nascita']);

   }else{
      for ($i = 0; $i < $_GET['numero_r']; $i++) {
         echo "Il nome passato è: ". $_GET['nome'] .", ";
         echo "il cognome passato è: ". $_GET['cognome'] .", ";
         controllo_anni($_GET['nascita']);
      }
   }   
}


function controllo_anni($data_nascita){
   // data di nascita 
   $nascita = date('d-m-Y', strtotime($data_nascita));
   $giorno_nascita = date('d', strtotime($data_nascita));
   $mese_nascita = date('m', strtotime($data_nascita));
   $anno_nascita = date('Y', strtotime($data_nascita));   
   // data corrente
   $giorno_oggi = date('d');
   $mese_oggi = date('m');
   $anno_oggi = date('Y');   
   // calcolo età
   $anni = $anno_oggi-$anno_nascita;
   // controllo anni
   if($giorno_oggi == $giorno_nascita && $mese_oggi == $mese_nascita){
      echo 'la data di nascita è: '. $nascita . " e oggi compi ". $anni ." anni. AUGIRI!<br>";
   }
   if($giorno_oggi > $giorno_nascita && $mese_oggi == $mese_nascita || $mese_oggi > $mese_nascita){
      echo "la data di nascita è: ". $nascita . " e hai ". $anni ." anni.<br>";
   }
   if($giorno_oggi < $giorno_nascita && $mese_oggi == $mese_nascita || $mese_oggi < $mese_nascita){
      echo "la data di nascita è: ". $nascita . " e hai ". ($anni-1) . " anni.<br>";
   }
}

?>
