<?php
function daysPastMonth($months, $years)
{
    $array = [];
    $first = getdate(mktime(0, 0, 0, $months, 1, $years));
    // retourne la date du 1er jour du months
    $ind = ($first['wday'] == 0 ? 6 : $first['wday'] - 1);
    // retourne le numéro d'ordre 1er jour du months
    $numberDay = date("t", mktime(0, 0, 0, $months, 1, $years));
    // retourne le nombre de jours du months

    // initialisation a blanc du tableau month 
    for ($i = 0; $i < 7; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $month[$i][$j] = " ";
        }
    }

    // On rempli le tableau month avec les valeurs 
    $month[0] = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
    $numweek = 1;
    for ($days = 1; $days <= $numberDay; $days++) {
        $month[$numweek][$ind] = $days;
        $ind++;
        if ($ind == 7) {
            $numweek++;
            $ind = 0;
        }
    }

    for ($week = 0; $week <= 6; $week++) {
        for ($jours = 0; $jours <= 6; $jours++) {
            $current = $month[$week][$jours];
            if (!is_string($month[$week][$jours])) {
                array_push($array, $current);
            }
        }
    }
    return $array;
}

function test()
{
    $pastMonth = intval(date("m")) - 1;
    if ($pastMonth == 0) {
        $pastMonth = 12;
        $currentYear = intval(date("Y")) - 1;
    } else {
        $currentYear = intval(date("Y"));
    }
    $daysPastMonth = daysPastMonth($pastMonth, $currentYear);
    return $daysPastMonth;
}
print_r(test());

?>