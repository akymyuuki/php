<?php
    $NM = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $N = $NM[0];
    $M = $NM[1];

    $arr = [1, 0, -1, 1, 0 , -1];
    $a = (int)($NM[0] % 3 + 2);
    $b = (int)($NM[1] % 3 + 2);
    $cnt = 0;
    for ($i = $a ; $i < $b+1 ; $i++) {
        $cnt = $arr[$i];
    }
    echo $cnt."\n";
?>
