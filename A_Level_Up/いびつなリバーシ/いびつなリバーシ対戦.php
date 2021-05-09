<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $N = (int)$input[2];
    $n = (int)$input[3];
    
    $moveX = [0, 1,   1, 1, 0, -1, -1, -1];
    $moveY = [-1, -1, 0, 1, 1, 1, 0,  -1];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = '#';            
        }
    }
    
    for ($h = 0 ; $h < $H ; $h++) {
        $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];
        }
    }
    
    for ($j = 0 ; $j < $n ; $j++){
        $input = explode(' ', trim(fgets(STDIN)));
        
        ($j % 2 === 0) ? $turn = 'A' : $turn = 'B'; 
        $turn = (int)$input[0];
        $y = (int)$input[1]+1;
        $x = (int)$input[2]+1;
        $map[$y][$x] = $turn; 
        for ($i = 0 ; $i < 8 ; $i++) {
            $map = reverse($map, $y, $x, $moveY, $moveX, $i, $turn);
        }
    }
    
    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
    
    function reverse($map, $ay, $ax, $moveY, $moveX, $dir, $turn) {
        $flag = true;
        if(checkStone($map, $ay, $ax, $moveY, $moveX, $dir, $turn)){
            while($flag) {
                if($map[$ay][$ax] !== '#'){
                    $map[$ay][$ax] = $turn;           
                }
                if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] ==='#'){
                    $flag = false;
                }
                if($map[$ay+$moveY[$dir]][$ax+$moveX[$dir]] === $turn){
                    $flag = false;
                }
                $ay += $moveY[$dir];
                $ax += $moveX[$dir];
            }
        }
        return $map;
    }
    
    function checkStone($map, $ay, $ax, $moveY, $moveX, $dir, $turn){
        $flag = true;
        $isThere = false;
        while($flag) {
            $ay += $moveY[$dir];
            $ax += $moveX[$dir];
            if($map[$ay][$ax] === '#'){
                $flag = false;
            }
            if($map[$ay][$ax] === $turn){
                $flag = false;
                $isThere = true;
            }
 
            if($map[$ay][$ax] === "."){
                $flag = true;
            }
        }
        return ($isThere) ? true : false;
    }
?>
