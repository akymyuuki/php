<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $x = (int)$input[0];
    $y = (int)$input[1];
    $N = $input[2];
    
    $dirX = [0, 1, 0, -1];
    $dirY = [-1, 0, 1, 0];
    $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];
    $d = ['R' => 1, 'L' => -1];
    $D = 0;
    
    for ($i = 0 ; $i < $N ; $i++){
        $rl = trim(fgets(STDIN));
        $D += $d[$rl];
        if ($D < 0) {
            $D = 3;
        }
        if ($D > 3) {
            $D = 0;
        }
        $x += $dirX[$D];
        $y += $dirY[$D];
        
        echo ($x)." ".($y)."\n";
    }
?>
