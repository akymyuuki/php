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
    
    $y = $sy;
    $x = $sx;
    $map[$y+1][$x+1] = '*';
    $D = 0;
    $flag = true;
    
    for ($i = 0 ; $i < $n ; $i++) {
        if (!$flag) break;
        $input = explode(' ', trim(fgets(STDIN)));
        $rl = $input[0];
        $m = (int)$input[1];
        
        $D = $D + $d[$rl];
        if ($D < 0) {
            $D = 3;
        }
        if ($D > 3) {
            $D = 0;
        }
        for ($j = 0 ; $j < $m ; $j++){
            if ($map[$y + $moveY[$D] +1][$x + $moveX[$D] +1] === "#") {
                $flag = false;
                break;
            } else {
                $y += $moveY[$D];
                $x += $moveX[$D];
                $map[$y+1][$x+1] = '*';
            }
        }
    }
    
    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
?>
