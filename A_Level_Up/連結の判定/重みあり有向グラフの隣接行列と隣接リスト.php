<?php
    list($N, $M) = array_map('intval', explode(' ', trim(fgets(STDIN))));
    
    $graph = [];
    for ($i = 0 ; $i < $N ; $i++) {
        for ($j = 0 ; $j < $N ; $j++) {
            $graph[$i][] = 0;
        }
    }
    for ($i = 0 ; $i < $M ; $i++) {
        list($a, $b, $c) = explode(' ', trim(fgets(STDIN)));
        $graph[$a-1][$b-1] = $c;
    }
    
    for ($i = 0 ; $i < $N ; $i++) {
        echo join('', $graph[$i]), "\n";
    }
    
    for ($i = 0 ; $i < $N ; $i++) {
        $ans = [];
        $al = [];
        $bl = [];
        for ($j = 0 ; $j < $N ; $j++) {
            if ($graph[$i][$j] > 0){
                array_push($al, $j);
                array_push($bl, "(".$graph[$i][$j].")");
            }
        }
        if (count($al) > 0) {
            array_multisort($al, $bl);
            $ansList = [];
            for ($k = 0 ; $k < count($al) ; $k++){
                $ansList[] = $al[$k].$bl[$k];
            }
            echo join('', $ansList), "\n";    
        } else {
            echo "\n";
        }
    }
?>
