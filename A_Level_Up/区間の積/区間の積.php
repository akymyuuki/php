<?php
    $NM = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $N = $NM[0];
    $M = $NM[1];
    $A = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $minN = 999999999999;
    
    $mul = 1;
    $index = 0;
    for ($i = 0 ; $i < $N ; $i++) {
        $mul = $mul * $A[$i];
        if ($mul === 0) {
            $mul = 1;
            $index = $i + 1;
        }
        while ($M <= $mul && $index <= $i) {
            $mul = $mul / $A[$index];
            $minN = min($minN, ($i+1 - $index));
            $index++;
        }
    }
    echo $minN."\n";
?>
