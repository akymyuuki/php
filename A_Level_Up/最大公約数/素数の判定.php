<?php
    $NM = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $N = $NM[0];
    
    $a = floor(sqrt($N))+1;
    $factor = 0;
    for ($i = 2 ; $i < $a ; $i++) {
        if ($N % $i === 0) {
            $factor++;
        }
    }
    
    if ($factor === 0 && $N > 1) {
        echo "YES"."\n";
    } else {
        echo "NO"."\n";
    }
?>
