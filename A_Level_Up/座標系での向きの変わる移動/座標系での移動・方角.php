<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $y = (int)$input[0];
    $x = (int)$input[1];
    $N = (int)$input[2];
    
    $dirX = [0, 1, 0, -1];
    $dirY = [-1, 0, 1, 0];
    $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];

    for ($i = 0 ; $i < $N ; $i++) {
        $input = trim(fgets(STDIN));
        $x += $dirX[$dir[$input]];
        $y += $dirY[$dir[$input]];
        echo $y." ".$x."\n";
    }
?>
