<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $y = (int)$input[0];
    $x = (int)$input[1];
    $D = $input[2];
    
    $dirX = [0, 1, 0, -1];
    $dirY = [-1, 0, 1, 0];
    $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];
    $d = ['R' => 1, 'L' => -1];
    $D = $dir[$D];
    $rl = trim(fgets(STDIN));
    $D = $D + $d[$rl];
    if ($D < 0) {
        $D = 3;
    }
    if ($D > 3) {
        $D = 0;
    }
    echo ($y+$dirY[$D])." ".($x+$dirX[$D])."\n";
?>
