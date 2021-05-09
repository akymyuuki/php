<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    
    $moveX = [0, 1, 0, -1];
    $moveY = [-1, 0, 1, 0];

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
    
    $flag = true;
    for ($h = 1 ; $h < $H+1 ; $h++) {
        for ($w = 1 ; $w < $W+1 ; $w++) {
            if ($map[$h][$w] === '*' && $flag === true) {
                for ($i = 0 ; $i < 4 ; $i++) {
                      $map[$h+$moveY[$i]][$w+$moveX[$i]] = '*'
                }
                $flag = false;
            }
        }
    }

    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
?>
