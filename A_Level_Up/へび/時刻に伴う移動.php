<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $sy = (int)$input[2];
    $sx = (int)$input[3];
    $n = (int)$input[4];
    
    $moveX = [0, 1, 0, -1];
    $moveY = [-1, 0, 1, 0];
    $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];
    $d = ['R' => 1, 'L' => -1];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = "#";            
        }
    }
    
    for ($h = 0 ; $h < $H ; $h++) {
        $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];            
        }
    }
    
    $move = [];
    for ($i = 0 ; $i < $n ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $move[0][] = (int)$input[0];
        $move[1][] = $input[1];
    }
    
    $y = $sy;
    $x = $sx;
    $D = 0;
    $flag = true;
    
    for ($i = 0 ; $i < 100 ; $i++) {
        if (!$flag) break;
     
        if(in_array($i, $move[0])){
            $rl = $move[1][array_search($i, $move[0])];
    
            $D = $D + $d[$rl];
            if ($D < 0) {
                $D = 3;
            }
            if ($D > 3) {
                $D = 0;
            }
        }
        if ($map[$y + $moveY[$D] +1][$x + $moveX[$D] +1] === "#") {
            $flag = false;           
            echo "Stop";
            return;
        } else {
            $y += $moveY[$D];
            $x += $moveX[$D];
        }
        echo $y." ".$x."\n";
    }
?>
