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

//---------- CONNESSIONE DB ----------
$host = "localhost";
$user = "root";
$password = "";
$database = "db_calc_ffix";

$connessione = new mysqli($host, $user, $password, $database);

if ($connessione === false)
{
    die ("errore connessione database ". $connessione->error);
}else{
    echo "connessione effettuata <br>";}


//---------- AREA TEST ----------


//---------- FUNZIONI ----------
function memoria_selezione($table_name,$column_name,$id_name,$name_select)
{
    if (!$_GET[$name_select]=="")
    {
        GLOBAL $connessione;
        $sql = "SELECT *
                FROM $table_name
                WHERE $id_name = $_GET[$name_select]";
        $result = $connessione->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
       
        echo "<option value='$_GET[$name_select]' selected>";
        echo "Selezionato: " . $row[$column_name];
        echo "</option>";         
    }
}

function lista_select($table_name,$column_name,$id_name,$name_select)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name";
    $result = $connessione->query($sql);
    memoria_selezione($table_name,$column_name,$id_name,$name_select);

    for($i=1; $i < $row = $result->fetch_array(MYSQLI_ASSOC); $i++)
    {
        echo "<option value='$row[$id_name]'>";
        echo "$row[$column_name]<br>";
        echo "</option>";
    }

}

function lista_select_equip($table_name,$column_name,$id_name,$name_select)
{
    GLOBAL $connessione;
    if($_GET['invio_equip']||$_GET['invio_livello'])
    {
        memoria_selezione($table_name,$column_name,$id_name,$name_select);   
    }
 
    if(isset($_GET['personaggio']))
    {

        $personaggi = ["","Gidan","Daga","Vivi","Steiner","Freija","Quina","Eiko","Amarant"];
        $nome_personaggio = $personaggi [$_GET['personaggio']];
        $sql = "SELECT * FROM equipaggiamenti
                WHERE equipaggiamenti.indossabile_da LIKE '%$nome_personaggio%'
                AND equipaggiamenti.tipo LIKE '%$name_select%'
                OR equipaggiamenti.tipo LIKE '%Tutti%';";
        $result = $connessione->query($sql);

        

        for($i=1; $i < $row = $result->fetch_array(MYSQLI_ASSOC); $i++)
        {
            echo "<option value='$row[id_equip]'>";
            echo "$row[nome_equip] ";
            //---------- STAMPA BONUS ----------
            stampa_bonus($row);
            
        }
        echo "<br>";
        echo "</option>";
        
    }else{
        echo "<option value=''>";
        echo "---Seleziona Personaggio---";
        echo "</option>";
    }
}

function stampa_bonus($row)
{
    if($row['vel_equip']>0)
    {
        echo "+" . $row['vel_equip'] . " Velocità ";
    }

    if($row['for_equip']>0)
    {
        echo "+" . $row['for_equip'] . " Forza ";
    }
    
    if($row['mag_equip']>0)
    {
        echo "+" . $row['mag_equip'] . " POT. Magico ";
    }

    if($row['spr_equip']>0)
    {
        echo "+" . $row['spr_equip'] . " POT. Spirito ";
    }
}

function stampa_bonus2($name_select)
{
    GLOBAL $connessione;
    /*---------- PRIMA VERSIONE ----------
    $sql = "SELECT * FROM equipaggiamenti";
    
    for($i=0; $i <= $_GET[$name_select]-1; $i++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $row['nome_equip'];            
    }
    ---------------------------------------*/
    
    $row = parametri($name_select);
    if(!$_GET[$name_select]=="")
    {
        if($row['vel_equip']>0)
        {
            echo "+" . $row['vel_equip'] . " Velocità ";
        }

        if($row['for_equip']>0)
        {
            echo "+" . $row['for_equip'] . " Forza ";
        }
        
        if($row['mag_equip']>0)
        {
            echo "+" . $row['mag_equip'] . " POT. Magico ";
        }

        if($row['spr_equip']>0)
        {
            echo "+" . $row['spr_equip'] . " POT. Spirito ";
        }
    }
}

function parametri($name_select)
{
    GLOBAL $connessione;
    if(!$_GET[$name_select]=="")
    {
        $sql= "SELECT vel_equip, for_equip, mag_equip, spr_equip
        FROM equipaggiamenti
        WHERE id_equip = $_GET[$name_select]";
        $result = $connessione->query($sql);
        return $row = $result->fetch_array(MYSQLI_ASSOC);
    }
}

function somma_bonus()
{
    if(isset($_GET['personaggio']))
    {
    
        if(isset($_GET['Arma'])&&!$_GET['Arma']==""
        &&isset($_GET['Testa'])&&!$_GET['Testa']==""
        &&isset($_GET['Braccia'])&&!$_GET['Braccia']==""
        &&isset($_GET['Busto'])&&!$_GET['Busto']==""
        &&isset($_GET['Accessorio'])&&!$_GET['Accessorio']=="")
        {            
            $row_arma = parametri("Arma");
            $row_testa = parametri("Testa");
            $row_braccia = parametri("Braccia");
            $row_busto = parametri("Busto");
            $row_accessorio = parametri("Accessorio"); 
            echo "<b>Velocità:</b> ";
            $vel_somma = $row_arma['vel_equip']+$row_testa['vel_equip']+$row_braccia['vel_equip']+
                         $row_busto['vel_equip']+$row_accessorio['vel_equip'];
            echo $vel_somma;
            echo " <b>Forza:</b> ";
            $for_somma = $row_arma['for_equip']+$row_testa['for_equip']+$row_braccia['for_equip']+
                         $row_busto['for_equip']+$row_accessorio['for_equip'];
            echo $for_somma;
            echo " <b>Pot. Magico:</b> ";
            $mag_somma = $row_arma['mag_equip']+$row_testa['mag_equip']+$row_braccia['mag_equip']+
                         $row_busto['mag_equip']+$row_accessorio['mag_equip'];
            echo $mag_somma;
            echo " <b>Pot. Spirito:</b> ";
            $spr_somma = $row_arma['spr_equip']+$row_testa['spr_equip']+$row_braccia['spr_equip']+
                         $row_busto['spr_equip']+$row_accessorio['spr_equip'];
            echo $spr_somma;   
            
        }else{
            echo "Seleziona Equipaggiamento";
        }  
    }else{
        echo "Seleziona Personaggio";
    }
}

?>
<!---------- HTML ---------->
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calcolratore ffix database</title>
</head>
    <body>
        <h1>Calcolatore parametri Final Fantasy IX (database)</h1>
        
        <form action="index_ffix_db.php" method="GET">
            <h3>Lista Personaggi</h3>
            <select name="personaggio" id="personaggio">
                    <?php lista_select("personaggi","nome_personaggio","id_personaggio","personaggio")?>            
            </select>
            <input type="submit" name= "invio_personaggio"/>

            <h3>Lista Equipaggiamenti</h3>
            <section>
                <!---------- ARMA ---------->
                <div>
                    <select name="Arma" id="Arma">
                        <option value=''>--Seleziona Arma--</option>
                        <?php lista_select_equip("equipaggiamenti","nome_equip","id_equip","Arma"); 
                        GLOBAL $prova; echo "$prova";?>
                    </select>
                    <?php
                        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
                        {
                            stampa_bonus2("Arma");
                        }
                    ?>
                </div>
                <br>
                <!---------- TESTA ---------->
                <div>
                    <select name="Testa" id="Testa">
                        <option value=''>--Seleziona Cappello/Elmo--</option>
                        <?php lista_select_equip("equipaggiamenti","nome_equip","id_equip","Testa"); ?>
                    </select>
                    <?php
                        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
                        {
                            stampa_bonus2("Testa");
                        }
                    ?>
                </div>
                <br>
                <!---------- BRACCIA ---------->
                <div>
                    <select name="Braccia" id="Braccia">
                        <option value=''>--Seleziona Bracciali/Guanti--</option>
                        <?php lista_select_equip("equipaggiamenti","nome_equip","id_equip","Braccia"); ?>
                    </select>
                    <?php 
                        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
                        {
                            stampa_bonus2("Braccia");
                        }
                    ?>
                </div>
                <br>
                <!---------- BUSTO ---------->
                <div>
                    <select name="Busto" id="Busto">
                        <option value=''>--Seleziona Vestito/Armatura--</option>
                        <?php lista_select_equip("equipaggiamenti","nome_equip","id_equip","Busto"); ?>
                    </select>
                    <?php
                        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello'])) 
                        {
                            stampa_bonus2("Busto");
                        }
                    ?>
                </div>
                <br>
                <!---------- ACCESSORIO ---------->
                <div>
                    <select name="Accessorio" id="Accessorio">
                        <option value=''>--Seleziona Accessorio--</option>
                        <?php lista_select_equip("equipaggiamenti","nome_equip","id_equip","Accessorio"); ?>
                    </select>
                    <?php 
                        if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
                        {
                            stampa_bonus2("Accessorio");
                        }
                    ?>
                </div>
                <br>
                <?php
                    echo "<b>Somma bonus equipaggiamenti</b>";
                    echo "<br>";

                    if(isset($_GET['invio_equip'])||isset($_GET['invio_livello']))
                    {
                        somma_bonus();
                    }
                ?>
                <br>
                <input type="submit" name="invio_equip"/>
            </section>

            <h2>Calcolo Bonus</h2>
            <label>Inserisci il livello attuale del personaggio (min. 1 max. 99):</label>
            <br>
            <?php
                if(!isset($_GET["invio_livello"])||$_GET["Livello"]=="")
                {
                    echo "<input type='number' id='Livello' name='Livello' min='1' max='99' placeholder='0' />";
                }else{
                    $valore= $_GET["Livello"];
                    echo "<input type='number' id='Livello' name='Livello' min='1' max='99' value='$valore' />";
                }
               ?>
            <br>
            </label>Inserisci i LV-UP fatti con questi equip del personaggio (min 1 - max 98):</label>
            <br>
            <?php
                if(!isset($_GET['invio_livello'])||$_GET["Lv_up"]=='')
                {
                    echo "<input type='number' id='Lv_up' name='Lv_up' min='1' max='98' placeholder='0' />";
                }else{
                    $valore= $_GET['Lv_up'];
                    echo "<input type='number' id='Lv_up' name='Lv_up' min='1' max='98' value='$valore' />";
                }
            ?>
            <br>
            <input type="submit" name="invio_livello" />
        </form>
    </body>
</html>


<?php 

$connessione->close();

?>