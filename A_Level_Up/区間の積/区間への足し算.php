<?php
    $NM = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $N = $NM[0];
    $M = $NM[1];
    $A = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $add = [];
    for ($i = 0 ; $i < $N+1 ; $i++) {
        $add[] = 0;
    }
    
    for ($i = 0 ; $i < $M ; $i++) {
        $n = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
        $l = $n[0];
        $r = $n[1];
        $a = $n[2];
        $add[$l-1] += $a;
        $add[$r] -= $a;
    }
    
    for ($i = 0 ; $i < $N ; $i++) {
        echo $A[$i] + $add[$i], "\n";
        $add[$i+1] += $add[$i];
    }
?>
