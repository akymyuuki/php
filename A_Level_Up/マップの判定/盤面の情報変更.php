<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $N = (int)$input[2];
    $map = [];

    for($i = 0 ; $i < $H ; $i++) {
        $input = trim(fgets(STDIN));
        for($j = 0 ; $j < $W ; $j++){
            $map[$i][] = $input[$j];            
        }
    }
    for($i = 0 ; $i < $N ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $map[(int)$input[0]][(int)$input[1]] = "#";
    }
    
    for($i = 0 ; $i < $H ; $i++) {
        echo join("", $map[$i])."\n";
    }
?>