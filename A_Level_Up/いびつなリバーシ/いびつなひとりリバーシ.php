<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $N = (int)$input[2];
    
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
        }
    }
    
    for ($j = 0 ; $j < $N ; $j++){
        $input = explode(' ', trim(fgets(STDIN)));
        $y = (int)$input[0]+1;
        $x = (int)$input[1]+1;
        for ($i = 0 ; $i < 8 ; $i++) {
            $map[$y][$x] = "*"; 
            $map = reverse($map, $y, $x, $moveY, $moveX, $i);
        }
        
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
