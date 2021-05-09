<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    
    $moveX = [0, 1,   1, 1, 0, -1, -1, -1];
    $moveY = [-1, -1, 0, 1, 1, 1, 0,  -1];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = '#';            
        }
    }
    
    $sy;
    $sx;
    for ($h = 0 ; $h < $H ; $h++) {
       $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];
            if($map[$h+1][$w+1] === '!'){
                $sy = $h+1;
                $sx = $w+1;
            }
        }
    }
    
    $map[$sy][$sx] = "*";

    for($i = 0 ; $i < 8 ; $i++) {
        $map = reverse($map, $sy, $sx, $moveY, $moveX, $i);
    }
    
    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
    
    function reverse($map, $ay, $ax, $moveY, $moveX, $dir) {
        $flag = true;
        if(checkStone($map, $ay, $ax, $moveY, $moveX, $dir)){
            while($flag) {
                if($map[$ay][$ax] === '.'){
                    $map[$ay][$ax] = "*";           
                }
                if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='*' ||
                    $map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='#' ){
                    $flag = false;
                }
                $ay += $moveY[$dir];
                $ax += $moveX[$dir];
            }
        }
        return $map;
    }
    
    function checkStone($map, $ay, $ax, $moveY, $moveX, $dir){
        $flag = true;
        $isThere = false;
        while($flag) {
            if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='#'){
                $flag = false;
            }
            if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='*'){
                $flag = false;
                $isThere = true;
            }
            $ay += $moveY[$dir];
            $ax += $moveX[$dir];
        }
        return ($isThere) ? true : false;
    }
?>
