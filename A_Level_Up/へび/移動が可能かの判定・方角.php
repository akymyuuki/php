<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $sy = (int)$input[2];
    $sx = (int)$input[3];
    $m = $input[4];
    
    $moveX = [0, 1, 0, -1];
    $moveY = [-1, 0, 1, 0];
    $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];
    $D = $dir[$m];
    
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
    
    if ($map[$sy+$moveY[$D]+1][$sx+$moveX[$D]+1] === "#") {
        echo "No"."\n";
    } else {
        echo "Yes"."\n";
    }
?>
