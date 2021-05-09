<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $sy = (int)$input[2]+1;
    $sx = (int)$input[3]+1;
    
    $moveX = [1, 1, -1, -1];
    $moveY = [-1, 1, 1, -1];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = '#';            
        }
    }
    for ($h = 1 ; $h < $H+1 ; $h++) {
        for($w = 1 ; $w < $W+1 ; $w++){
            $map[$h][$w] = '.';            
        }
    }
    
    $map[$sy][$sx] = "!";

    for($i = 0 ; $i < 4 ; $i++) {
        $map = reverse($map, $sy, $sx, $moveY, $moveX, $i);
    }
    
    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
    
    function reverse($map, $ay, $ax, $moveY, $moveX, $dir) {
        $flag = true;
        while($flag) {
            if($map[$ay][$ax] === '.'){
                $map[$ay][$ax] = "*";           
            }
            if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='#'){
                $flag = false;
            }
            $ay += $moveY[$dir];
            $ax += $moveX[$dir];
        }
        return $map;
    }
?>