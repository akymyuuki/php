<?php
    list($N) = array_map('intval', explode(' ', trim(fgets(STDIN))));
    
    $graph = [];
    for ($i = 0 ; $i < $N ; $i++) {
        for ($j = 0 ; $j < $N ; $j++) {
            $graph[$i][] = 0;
        }
    }
    for ($i = 0 ; $i < $N-1 ; $i++) {
        list($a, $b) = explode(' ', trim(fgets(STDIN)));
        $graph[$a-1][$b-1] = 1;
        $graph[$b-1][$a-1] = 1;
    }
    
    $flag = true;
    echo "1", "\n";
    $i = 0;
    while ($flag) {
        $flag = false;
        for ($j = 0 ; $j < $N ; $j++) {
            if ($graph[$j][$i] === 1) {
                $graph[$j][$i] = 0;
                $graph[$i][$j] = 0;
                echo $j+1, "\n";
                $i = $j;
                $flag = true;
            }
        }
    }
?>
