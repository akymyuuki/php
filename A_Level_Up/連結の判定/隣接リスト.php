<?php
    list($N, $M) = array_map('intval', explode(' ', trim(fgets(STDIN))));
    
    $map = [];
    for ($i = 0 ; $i < $N ; $i++) {
        for ($j = 0 ; $j < $N ; $j++) {
            $map[$i][] = 0;            
        }
    }
    for ($i = 0 ; $i < $M ; $i++) {
        list($a, $b) = explode(' ', trim(fgets(STDIN)));
        $map[$a-1][$b-1] = 1;
        $map[$b-1][$a-1] = 1;
    }
    for ($i = 0 ; $i < $N ; $i++) {
        echo join('', $map[$i]), "\n";
    }
?>
