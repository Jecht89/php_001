<?php
// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }
    // $errstr may need to be escaped:
    $errstr = htmlspecialchars($errstr);

    switch ($errno) {
    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr --Linea: $errline --<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr <br />\n";
        echo " --Nella Linea: $errline <br>--";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

$old_error_handler = set_error_handler("myErrorHandler");

//---------OGGETTI-------------------
class Personaggio
{
    public $name;
    public $vel_base;
    public $for_base;
    public $mag_base;
    public $spr_base;

    function __construct($name, $vel_base, $for_base, $mag_base, $spr_base)
    {
        $this->name = $name;
        $this->vel_base = $vel_base;
        $this->for_base = $for_base;
        $this->mag_base = $mag_base;
        $this->spr_base = $spr_base;
    }
}

class Equip
{
    public $name;
    public $p_name;
    public $vel;
    public $for;
    public $mag;
    public $spr;
    function __construct($name,$p_name, $vel, $for, $mag, $spr)
    {
        $this->name = $name;
        $this->p_name = $p_name;
        $this->vel = $vel;
        $this->for = $for;
        $this->mag = $mag;
        $this->spr = $spr;
    }
}
//--------DEFINIZIONE OGGETTI---------
$Personaggi =
    [
        $Vuoto = "",
        $Gidan = new Personaggio('Gidan', 23, 21, 18, 23),
        $Daga = new Personaggio('Daga', 21, 14, 23, 17),
        $Vivi = new Personaggio('Vivi', 16, 12, 24, 19),
        $Steiner = new Personaggio('Steiner', 18, 24, 12, 21),
        $Freija = new Personaggio('Freija', 20, 20, 16, 22),
        $Quina = new Personaggio('Quina', 14, 18, 20, 11),
        $Eiko = new Personaggio('Eiko', 19, 13, 21, 18),
        $Amarant = new Personaggio('Amarant', 22, 22, 13, 15)
    ];

$Armi =
    [
        $No_Bonus = new Equip('No Bonus','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,0),
        //--- LISTA ARMI GIDAN ---
        $Masamune = new Equip('Masamune','Gidan', 0, 0, 2, 0),
        $Orichalcon = new Equip('Orichalcon','Gidan', 1, 0, 0, 0),
        //--- LISTA ARMI DAGA ---
        $Asta_stellare = new Equip('Asta stellare','Daga',0,0,0,2),
        $Magiracchetta = new Equip('Magiracchetta','Daga',0,0,2,0),
        //--- LISTA ARMI STEINER ---
        $Defender = new Equip('Defender','Steiner',0,0,0,3),
        //--- LISTA ARMI EIKO ---
        $Magiracchetta = new Equip('Magiracchetta','Eiko',0,0,2,0),

    ];

$Testa =
[
    $No_Bonus = new Equip('No Bonus','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,0),
    //---CAPPELLI---
    $Colbacco = new Equip('Colbacco','Gidan-Vivi-Daga-Quina-Eiko',0,0,0,1),
    $Cappello_Merlino = new Equip('Cappello Merlino','Gidan-Vivi-Daga-Quina-Eiko',0,1,0,0),
    $Bandana = new Equip('Bandana','Gidan-Vivi-Daga-Quina-Eiko-Amarant',1,0,0,1),
    $Cappello_Magico = new Equip('Cappello Magico','Vivi-Daga-Quina-Eiko',0,0,1,0),
    $Tiara_di_Lamia = new Equip('Tiara di Lamia','Freija-Daga-Quina-Eiko',0,0,1,1),
    $Cappello_Mikoshi = new Equip('Cappello Mikoshi','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,1,0,0),
    $Hachimaki = new Equip('Hachimaki','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,1,0,0),
    $Tiara_Chakra = new Equip('Tiara Chakra','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,1,1),
    $Basco_Verde = new Equip('Basco Verde','Gidan-Vivi-Daga-Quina-Eiko-Amarant',1,1,0,0),
    $Forcina_Dorata = new Equip('Forcina Dorata','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,1,0),
    $Astrocappello = new Equip('Astrocappello','Gidan-Vivi-Daga-Eiko-Amarant',1,0,0,0),
    $Passamontagna = new Equip('Passamontagna','Gidan',2,0,0,0),
    $Papalina = new Equip('Papalina','Vivi-Daga-Quina-Eiko',0,0,1,2),
    //---ELMI---
    $Elmo_Ayan = new Equip('Elmo Ayan','Steiner-Freija',0,0,0,1),
    $Barbuta = new Equip('Barbuta','Steiner-Freija',0,0,0,2),
    $Elmo_Mithril = new Equip('Elmo Mithril','Steiner-Freija',0,0,0,1),
    $Elmo_Dorato = new Equip('Elmo Dorato','Steiner-Freija',0,0,1,0),
    $Elmo_di_Stoffa = new Equip('Elmo di Stoffa','Steiner-Freija',0,1,0,0),
    $Diamantelmo = new Equip('Diamantelmo','Steiner-Freija',0,0,0,1),
    $Elmo_Kaiser = new Equip('Elmo Kaiser','Steiner-Freija',0,1,1,0),
    $Elmo_Genji = new Equip('Elmo Genji','Steiner-Freija',0,0,2,0),
    $Grandelmo = new Equip('Grand\'elmo','Steiner-Freija',1,0,0,0)
];

$Braccia =
[
    $No_Bonus = new Equip('No Bonus','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,0),
    //---BRACCIALI---
    $Fascia_di_Pelle = new Equip('Fascia di pelle','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,1),
    $Fasciadosso = new Equip('Fascia d\'osso','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,1,0,0),
    $Fascia_Mithril = new Equip('Fascia di Mithril','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,1),
    $Magibracciale = new Equip('Magibracciale','Vivi-Daga-Quina-Eiko',0,0,2,0),
    $Fascia_Sokai = new Equip('Fascia di Sokai','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,2),
    $Manette = new Equip('Manette','Gidan-Amarant',1,0,0,0),
    $Dragon_Wrist = new Equip('Dragon Wrist','Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant',0,0,0,1),
    $Power_Wrist = new Equip('Power Wrist','Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant',0,2,0,0),
    $Fascia_di_Eolo = new Equip('Fascia di Eolo','Gidan-Vivi-Daga-Freija-Quina-Eiko-Amarant',0,1,0,0),
    //---GUANTI---
    $Guanti_Bronzei = new Equip('Guanti Bronzei','Steiner-Freija',0,0,0,1),
    $Guanti_Mithril = new Equip('Guanti di Mithril','Steiner-Freija',0,0,0,1),
    $Fondina_Veneta = new Equip('Fondina Veneta','Steiner-Freija',0,1,1,0),
    $Guanti_Genji = new Equip('Guanti Genji','Steiner-Freija',0,0,2,0),
    $Guntlet = new Equip('Guntlet','Steiner-Freija',1,0,0,0)
];

$Busto =
[
    $No_Bonus = new Equip('No Bonus','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,0),
    //---VESTITI---
    $Busto_Bronzeo = new Equip('Busto Bronzeo','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,1),
    $Scamiciata = new Equip('Scamiciata','Gidan-Amarant',0,1,0,0),
    $Vestito_Magico = new Equip('Vestito Magico','Vivi-Daga-Quina-Eiko',0,0,1,0),
    $Salvagente = new Equip('Salvagente','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,2),
    $Giubbotto = new Equip('Giubbotto','Gidan-Amarant',0,1,0,0),
    $Dogi_di_Jujitsu = new Equip('Dogi di Jujitsu','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,1,0,1),
    $Bomber = new Equip('Bomber','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,2,0,0),
    $Magigilet = new Equip('Magigilet','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,1,0),
    $Body = new Equip('Body','Daga-Eiko-Freija',0,1,2,0),
    $Ninjafuku = new Equip('Ninjafuku','Gidan-Amarant',1,0,0,0),
    $Mantello_Nero = new Equip('Mantello Nero','Gidan-Vivi-Daga-Quina-Eiko-Amarant',0,0,0,3),
    $T_shirt = new Equip('T-shirt','Vivi-Daga-Quina-Eiko',0,1,1,0),
    $Spolverino = new Equip('Spolverino','Vivi-Daga-Quina-Eiko',0,1,1,0),
    $Giacca_Fatata = new Equip('Giacca Fatata','Vivi-Daga-Quina-Eiko',0,0,2,0),
    $Zinale = new Equip('Zinale','Quina',0,1,1,0),
    $Giacca_Bianca = new Equip('Giacca Bianca','Daga-Eiko',0,0,2,0),
    $Giacca_Nera = new Equip('Giacca Nera','Vivi-Quina',0,0,2,0),
    $Giacca_Pikapika = new Equip('Giacca Pikapika','Vivi-Daga-Eiko-Quina',0,1,1,1),
    $Eolojacket = new Equip('Eolojacket','Vivi-Daga-Eiko-Quina',1,1,1,1),
    //---ARMATURE---
    $Barda_Magica = new Equip('Barda Magica','Steiner-Freija',0,0,1,0),
    $Corsaletto = new Equip('Corsaletto','Steiner-Freija',0,0,0,1),
    $Barda_Dorata = new Equip('Barda dorata','Steiner-Freija',0,0,1,0),
    $Diarmatura = new Equip('Diarmatura','Steiner-Freija',0,1,1,0),
    $Carabiniere = new Equip('Carabiniere','Steiner-Freija',1,0,0,1),
    $Dragon_Armour = new Equip('Dragon Armour','Steiner-Freija',0,1,1,0),
    $Armatura_Genji = new Equip('Armatura Genji','Steiner-Freija',0,0,2,0),
    $Maximilian = new Equip('Maximilian','Steiner',0,0,0,3),
    $Gran_Corazza = new Equip('Gran Corazza','Steiner-Freija',0,1,0,0)
];

$Accessori = 
[

    $No_Bonus = new Equip('No Bonus','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,0),
    $Galosce = new Equip('Galosce','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,1,1),
    $Scarpe_Rosse = new Equip('Scarpe Rosse','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,2,0),
    $Moon_Boot = new Equip('Moon Boot','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,1,0,0),
    $Stivali = new Equip('Stivali','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,2,0,0),
    $Pantofole = new Equip('Pantofole','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',2,0,0,0),
    $Cavigliera = new Equip('Cavigliera','Daga-Freija-Eiko-Amarant',0,0,1,3),
    $Cinturone = new Equip('Cinturone','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,3,0,0),
    $Cintura_Nera= new Equip('Cintura Nera','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,2,0,2),
    $Marsupio = new Equip('Marsupio','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,1,1,2),
    $Anello_Madain = new Equip('Anello Madain','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,2),
    $Anello_Rosetta = new Equip('Anello Rosetta','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,1,0),
    $Anello_Reflex = new Equip('Anello Reflex','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,1,0,1),
    $Anello_Coral = new Equip('Anello Coral','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,2),
    $Anello_di_nozze = new Equip('Anello di nozze','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,2,0,0),
    $Transmigranello = new Equip('Transmigranello','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,4),
    $Anello_Protex = new Equip('Anello Protex','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,1),
    $Side_reo = new Equip('Side/reo','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,2,2,0),
    $Sidereo = new Equip('Sidereo','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',1,0,1,0),
    $Sciarpa_gialla = new Equip('Sciarpa gialla','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,2,0,0),
    $Foulard = new Equip('Foulard','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,2,0),
    $Spilla_di_gnomo = new Equip('Spilla di gnomo','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,0,0,2),
    $Spilla_dangelo = new Equip('Spilla d\'angelo','Daga-Freija-Eiko',0,2,0,0),
    $Perle_rosse= new Equip('Perle rosse','Daga-Freija-Eiko',0,0,2,4),
    $Cerchietto= new Equip('Cerchietto','Daga-Freija-Eiko',1,0,2,1),
    $Pettinino= new Equip('Pettinino','Daga-Freija-Eiko',0,3,1,1),
    $Fermaglio= new Equip('Fermaglio','Daga-Freija-Eiko',0,1,2,1),
    $Fiocco= new Equip('Fiocco','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,1,3,1),
    $Incenso= new Equip('Incenso','Daga-Freija-Eiko',0,0,1,0),
    $Profumo= new Equip('Profumo','Daga-Freija-Eiko',0,2,0,0),
    $Materioscura = new Equip('Materioscura','Gidan-Vivi-Steiner-Daga-Freija-Quina-Eiko-Amarant',0,3,2,0)
];
//------------------FUNZIONI----------------------------------------

//------------SELEZIONE PERSONAGGI----------------
function lista_select($lista)
{
    if($_GET['personaggio'])    
    {
        $selezione = $_GET['personaggio'];
        if (isset($_GET['personaggio']))
        {
            echo "<option value='$selezione' selected>";  
            echo "Selezionato: " . $lista[$selezione]->name;               
            echo "</option>";            
        }

    }else{
        echo "<option value=''>";
        echo "--Seleziona Personaggio--";               
        echo "</option>";
    }

    for ($i=1; $i < count($lista); $i++)
    {
        $nome = $lista[$i]->name;
        echo "<option value='$i'>";
        echo $nome;                
        echo "</option>";
    }
}

//---------SELEZIONE EQUIPAGGIAMENTO-------------
function lista_group_select($lista,$nome_select,$Personaggi)
{
    if (isset($Personaggi[$_GET['personaggio']]))
    {  
        if (isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
        {
            if($_GET['personaggio'])    
            {
                $selezione = $_GET[$nome_select];
                echo "<option value='$selezione' selected>";
                if(isset($lista[$selezione]->name))
                {       
                    echo "Selezionato: " . $lista[$selezione]->name;
                
                }else{
                    echo "Seleziona Equipaggiamento";
                }               
                echo "</option>";   
            }
        }
        
        for($i=0; $i < count($lista); $i++)
        {
            $personaggio = $Personaggi[$_GET['personaggio']]->name;
            $nome = $lista[$i]->name;
            $nome_gruppo = $lista[$i]->p_name;
            $pattern = "/$personaggio/";
            $controllo = preg_match($pattern, $nome_gruppo);
            $vel = " +". $lista[$i]->vel . " Velocità";
            $for = " +". $lista[$i]->for . " Forza";
            $mag = " +". $lista[$i]->mag . " Pot.Magico";
            $spr = " +". $lista[$i]->spr . " Pot.Spirito";
            if($controllo == 1)
            {       
                echo "<option value='$i'>";
                echo $nome;
                if($vel > 0){
                    echo $vel;    
                }
                if($for > 0){
                    echo $for;    
                }
                if($mag > 0){
                    echo $mag;    
                }
                if($spr > 0){
                    echo $spr;    
                }
                echo "</option>";
            }
        }
    }else{
        echo "<option value=''>";
        echo "Seleziona Personaggio";    
        echo "</option>";
    }
}
//-----------VISUALIZZA BONUS-------------------
function visualizza_bonus($equip,$opzione)
{
    if(isset($_GET['personaggio']))
    {
        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
        {
            if(isset($equip[$_GET["$opzione"]]))
            {
                $bonus = $equip[$_GET["$opzione"]];
                if ($bonus->vel>0)
                {
                    echo " Velocità: +" . $bonus->vel;
                }
                if ($bonus->for>0)
                {
                    echo " Forza: +" . $bonus->for;
                }
                if ($bonus->mag>0)
                {
                    echo " Pot. Magico: +" . $bonus->mag;
                }
                if ($bonus->spr>0)
                {
                    echo " Pot. Spirito: +" . $bonus->spr;
                }
            }
        }
    }  
}
//-------------SOMMA BONUS----------------------
function somma_bonus($parametro,$Armi,$Testa,$Braccia,$Busto,$Accessori)
{
    $somma = $Armi[$_GET['Armi']]->$parametro +
             $Testa[$_GET['Testa']]->$parametro +
             $Braccia[$_GET['Braccia']]->$parametro +
             $Busto[$_GET['Busto']]->$parametro +
             $Accessori[$_GET['Accessori']]->$parametro;
    return $somma;
}
?>

<!-- ----------------------HTML--------------------------- -->
<!DOCTYPE html>
<html lang="it">

<head>
    <title>Calcolatore Parametri FFIX</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
</head>

    <body>
        <h1>Calcoloatore parametri Final Fantasy IX</h1>

        <form action="index_ffix.php" method="GET">
            <h3>Lista Personaggi</h3>
            <select name="personaggio" id="personaggio">
                <?php lista_select($Personaggi) ?>
            </select>

            <input type="submit" name= "invio_personaggio" value="invio"/>
            
            <?php
            echo "<br><b>Statistiche Base Personaggio</b><br>";
             if (isset($_GET['personaggio']))
             {
                if (isset($Personaggi[$_GET['personaggio']]))
                {
                    $personaggio = $Personaggi[$_GET['personaggio']];
                    echo "<b>Velocità:</b> " . $personaggio->vel_base . " - ";
                    echo "<b>Forza:</b> " . $personaggio->for_base . " - ";
                    echo "<b>Pot. Magico:</b> " . $personaggio->mag_base . " - ";
                    echo "<b>Pot. Spirito:</b> " . $personaggio->spr_base;                
                }else{echo "Seleziona Personaggio";}
             }else{echo "Seleziona Personaggio";}           
            ?>
            <h3>Lista Equipaggiamenti</h3>

            <section>
                <!-- ---SELEZIONE ARMA--- -->
                <div>
                    <select name='Armi' id='Armi'>
                        <option value=''>--Seleziona Arma--</option>
                        <?php lista_group_select($Armi,'Armi',$Personaggi);?>
                    </select>
                    <?php visualizza_bonus($Armi,'Armi');?>
                </div>
                <br>

                <!-- ---SELEZIONE TESTA--- -->
                <div>
                    <select name = 'Testa' id = 'Testa'>
                        <option value = ''>--Seleziona Cappello/Elmo--</option>
                        <?php lista_group_select($Testa,'Testa',$Personaggi);?>        
                    </select>
                    <?php visualizza_bonus($Testa,'Testa');?>
                </div>
                <br>

                <!-- ---SELEZIONA BRACCIA--- -->
                <div>
                    <select name = 'Braccia' id = 'Braccia'>
                        <option value = ''>--Seleziona Bracciali/Guanti--</option>
                        <?php lista_group_select($Braccia,'Braccia',$Personaggi);?>        
                    </select>
                    <?php visualizza_bonus($Braccia,'Braccia');?>
                </div>   
                <br>

                <!-- ---SELEZIONE BUSTO--- -->
                <div>                
                    <select name = 'Busto' id = 'Busto'>
                        <option value = ''>--Seleziona Vestito/Armatura--</option>
                        <?php lista_group_select($Busto,'Busto',$Personaggi);?>        
                    </select>
                    <?php visualizza_bonus($Busto,'Busto');?>
                </div>  
                <br>
                    
                <!-- ---SELEZIONA ACCESSORIO--- -->
                <div>                
                    <select name = 'Accessori' id = 'Accessori'>
                        <option value = ''>--Seleziona Accessorio--</option>
                        <?php lista_group_select($Accessori,'Accessori',$Personaggi);?>        
                    </select>
                    <?php visualizza_bonus($Accessori,'Accessori'); ?>
                </div>
                <br>
            </section>
            <!-- ----SOMMA DEI BONUS---- -->
            <?php
            echo "<b>Somma bonus equipaggiamento</b>";
            echo "<br>";
            if(isset($_GET['personaggio']))
            {
                if(isset($Armi[$_GET['Armi']])
                   &&isset($Testa[$_GET['Testa']])
                   &&isset($Braccia[$_GET['Braccia']])
                   &&isset($Busto[$_GET['Busto']])
                   &&isset($Accessori[$_GET['Accessori']]))
                {
                    echo "<b>Velocità:</b> ";
                    $vel_somma = somma_bonus('vel',$Armi,$Testa,$Braccia,$Busto,$Accessori);
                    echo $vel_somma;
                    echo " <b>Forza:</b> ";
                    $for_somma = somma_bonus('for',$Armi,$Testa,$Braccia,$Busto,$Accessori);
                    echo $for_somma;
                    echo " <b>Pot. Magico:</b> ";
                    $mag_somma = somma_bonus('mag',$Armi,$Testa,$Braccia,$Busto,$Accessori);
                    echo $mag_somma;
                    echo " <b>Pot. Spirito:</b> ";
                    $spr_somma = somma_bonus('spr',$Armi,$Testa,$Braccia,$Busto,$Accessori);
                    echo $spr_somma;
                }else{echo "Seleziona Equipaggiamento";}
            }else{echo "Seleziona Personaggio";}
            ?>
            <br>
            <input type='submit' name="invio_equip" value='invio'/>
            <h2>Calcolo Bonus</h2>
                <label for="Livello">Inserisci livello attuale del personaggio (min 1 - max 99):</label><br>
                <?php
                    if(!isset($_GET['invio_livello'])||$_GET['Livello']=='')
                    {
                        echo "<input type='number' id='Livello' name='Livello' min='1' max='99' placeholder='0'/>";
                    }else
                        {
                            $valore = $_GET['Livello'];
                            echo "<input type='number' id='Livello' name='Livello' min='1' max='99' value='$valore'/>";
                        }
                ?>
                <br>
                <label for="Lv_up">Inserisci i LV-UP fatti con questi equip del personaggio (min 1 - max 98):</label><br>
                <?php 
                    if(!isset($_GET['invio_livello'])||$_GET['Lv_up']=='')
                    {
                        
                        echo "<input type='number' id='Lv_up' name='Lv_up' min='1' max='99' placeholder='0'/>";
                    }else
                        {
                            $valore = $_GET['Lv_up'];
                            echo "<input type='number' id='Lv_up' name='Lv_up' min='1' max='99' value='$valore'/>";
                        }
                ?>
                <!-- ESPRESSIONI PER CALCOLO BONUS -->
                <?php
                if(isset($_GET['personaggio']))
                {
                    if(isset($Armi[$_GET['Armi']])
                    &&isset($Testa[$_GET['Testa']])
                    &&isset($Braccia[$_GET['Braccia']])
                    &&isset($Busto[$_GET['Busto']])
                    &&isset($Accessori[$_GET['Accessori']])
                    &&$_GET['Livello']!=""
                    &&$_GET['Lv_up']!="")
                    {
                        if($_GET['Livello']>$_GET['Lv_up'])
                        {
                            $vel_base = $Personaggi[$_GET['personaggio']]->vel_base;
                            $for_base = $Personaggi[$_GET['personaggio']]->for_base;
                            $mag_base = $Personaggi[$_GET['personaggio']]->mag_base;
                            $spr_base = $Personaggi[$_GET['personaggio']]->spr_base;
                            $livello = $_GET['Livello'];
                            $lv_up = $_GET['Lv_up'];

                            $bonus_vel = $lv_up * $vel_somma;
                            $bonus_for = $lv_up * $for_somma;
                            $bonus_mag = $lv_up * $mag_somma;
                            $bonus_spr = $lv_up * $spr_somma;
                            echo "<br>";
                            
                            $velocita = $vel_base + floor(($livello * 1 / 10)) + floor((($lv_up * 0 + $bonus_vel)/32)) + $vel_somma;
                            $forza = $for_base + floor(($livello * 3 / 10)) + floor((($lv_up * 3 + $bonus_for)/32)) + $for_somma;
                            $magia = $mag_base + floor(($livello * 3 / 10)) + floor((($lv_up * 3 + $bonus_mag)/32)) + $mag_somma;
                            $spirito = $spr_base + floor(($livello * 3 / 20)) + floor((($lv_up * 1 + $bonus_spr)/32)) + $spr_somma;

                            echo "<b>Velocità:</b> ";
                            echo floor($velocita);          
                            echo " <b>Forza:</b> ";
                            echo floor($forza);          
                            echo " <b>Pot. Magico:</b> ";
                            echo floor($magia);          
                            echo " <b>Pot. Spirito:</b> ";
                            echo floor($spirito);
                            echo "<br>";
                            echo "<b>Limite massimo Velocità e Pot. Spirito = 50, Forza e Pot. Magico = 99</b>";
                        }else{echo "<br><b>ATTENZIONE! il Livello deve essere superiore al Lv-UP.</b>";}
                    }         
                }
                ?>
                <br>
                <input type="submit" name="invio_livello" value="invio"/>
                
        </form>
    </body>
</html>


<?php
// Vel = VelBase + [Lv * 1 / 10] + [(LvlUps * 0 + VelEqBonus) / 32] + VelEqCurr
// Frz = FrzBase + [Lv * 3 / 10] + [(LvlUps * 3 + FrzEqBonus) / 32] + FrzEqCurr
// Mag = MagBase + [Lv * 3 / 10] + [(LvlUps * 3 + MagEqBonus) / 32] + MagEqCurr
// Spr = SprBase + [Lv * 3 / 20] + [(LvlUps * 1 + SprEqBonus) / 32] + SprEqCurr

/*
Per esempio, assumiamo che Amarant si sia unito alla squadra al livello 10.
L'avete allenato fino al livello 19 (9 Level ups) indossando solo una Bandana (punti bonus: Spr +1).
In seguito l'avete allenato fino al livello 33 (14 level ups) indossando solo un Marsupio (punti bonus: Spr +2).
Infine avete cambiato il suo equip con un Mantello nero (punti bonus: Spr +3).
A questo punto, il suo POT spirito che leggete nella schermata Status o Equip sarà:
*/
// SprBase = 15 ()
// Lv = 33
// LvlUps = 9 + 14 = 23
// SprEqBonus = (9 * 1) + (14 * 2) = 37
// SprEqCurr = 3
// Spr = 15 + [33 * 3 / 20] + [(23 * 1 + 37) / 32] + 3
// = 15 + 4 + 1 + 3
// = 23
/*
Il valore massimo deciso per Velocità e POT spirito è 50,
se nella formula risulta un valore più alto, viene automaticamente troncato al limite fissato.
Per i parametri Forza e POT magico, il limite fissato è 99.
Anche in questo caso, se la formula restituisce un valore superiore, viene troncato.
*/
?>