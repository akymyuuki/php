<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $map = [];
    for($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = "#";            
        }
    }
    for($h = 0 ; $h < $H ; $h++) {
        $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];            
        }
    }
    for($h = 1 ; $h < $H+1 ; $h++) {
        for($w = 1 ; $w < $W+1 ; $w++) {
            if($map[$h+1][$w] === "#" && $map[$h-1][$w] === "#"){
                echo ($h-1)." ".($w-1)."\n";
            }
        }
    }
?>
