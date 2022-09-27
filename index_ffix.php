<?php

use Equip as GlobalEquip;

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

$Personaggi =
    [
        $Gidan = new Personaggio('Gidan', 23, 21, 18, 23),
        $Daga = new Personaggio('Daga', 21, 14, 23, 17),
        $Vivi = new Personaggio('Vivi', 16, 12, 24, 19),
        $Steiner = new Personaggio('Steiner', 18, 24, 12, 21),
        $Freija = new Personaggio('Freija', 20, 20, 16, 22),
        $Quina = new Personaggio('Quina', 14, 18, 20, 11),
        $Eiko = new Personaggio('Eiko', 19, 13, 21, 18),
        $Amarant = new Personaggio('Amarant', 22, 22, 13, 15)
    ];

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

$Armi =
    [
        //--- LISTA ARMI GIDAN ---
        $Masamune = new Equip('Masamune +2 Pot.Magico','Gidan', 0, 0, 2, 0),
        $Orichalcon = new Equip('Orichalcon +1 Velocità','Gidan', 1, 0, 0, 0),
        //--- LISTA ARMI DAGA ---
        $Asta_stellare = new Equip('Asta stellare +2 Pot.Spirito','Daga',0,0,0,2),
        $Magiracchetta = new Equip('Magiracchetta +2 Pot.Magico','Daga',0,0,2,0),
        //--- LISTA ARMI VIVI ---
        //--- LISTA ARMI STEINER ---
        $Defender = new Equip('Defender +3 Pot Spirito','Steiner',0,0,0,3),
        //--- LISTA ARMI FREIJA ---
        //--- LISTA ARMI QUINA ---
        //--- LISTA ARMI EIKO ---
        $Magiracchetta = new Equip('Magiracchetta +2 Pot.Magico','Eiko',0,0,2,0),
        //--- LISTA ARMI AMARANT ---
    ];


function lista_select($lista)
{
    for ($i = 0; $i < count($lista); $i++) {
        $c1 = $lista[$i];
        $c2 = $c1->name;
        echo "<option value='$i'>";
        echo $c2;
        echo "</option>";
    }
}

function lista_group_select($lista)
{
    for($i=0; $i < count($lista); $i++)
    {
        $lis_1 = $lista[$i];
        $lis_2 = $lista[$i-1]; 
        $nome = $lis_1->name;
        $nome_gruppo_1 = $lis_1->p_name;
        $nome_gruppo_2 = $lis_2->p_name;
        if ($nome_gruppo_1 != $nome_gruppo_2)
            {
                echo "<optgroup label='$nome_gruppo_1'>";
            }
       
        echo "<option values'$i'>";
        echo $nome;
        echo "</option>";
    }
}

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <title>Calcolatore Parametri FFIX</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

    <body>
        <h1>Calcoloatore parametri Final Fantasy IX</h1>

        <form action="index.php" method="POST">

            <label for="personaggio">Personaggio:</label>
            <select name="personaggio" id="seleziona_personaggio">
                <option value="">--Seleziona Personaggio--</option>
                <?php lista_select($Personaggi) ?>
            </select>

            <p>Lista Armi</p>
            <div>
                <select name='armi' id='seleziona_armi'>
                    <option value=''>--Seleziona Arma--</option>
                    <?php lista_group_select($Armi) ?>
                </select>
            </div>

            <input type="submit" value="invio" />
        </form>
    </body>

</html>
<?php

if ($_POST) {
    // $personaggio = $Personaggi[$_POST['personaggio']];
    // $parametro = [$personaggio->vel_base, $personaggio->for_base, $personaggio->mag_base, $personaggio->spr_base];
    // $stat_base = $parametro[$_POST['parametro']];
    // echo $stat_base;
}


?>