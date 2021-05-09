<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    $N = (int)$input[2];
    
    
    $moveX = [0, 1, 0, -1];
    $moveY = [-1, 0, 1, 0];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = '#';            
        }
    }
    
    $y = [];
    $x = [];
    $n = [];
    
    for ($h = 0 ; $h < $H ; $h++) {
        $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];
            if($input[$w] === '*'){
                $y[] = $h+1;
                $x[] = $w+1;
                $n[] = 0;
            }
        }
    }
    
    $distances = [];
    for ($i = 0 ; $i < $N ; $i++) {
        $distances[] = (int)trim(fgets(STDIN));
    }
    
    while (count($y) > 0){
        $ay = array_shift($y);
        $ax = array_shift($x);
        $an = array_shift($n);
        if (checkDistance($an, $distances)) {
            $map[$ay][$ax] = '?';
        } else {
            $map[$ay][$ax] = '*';
        }
        for ($i = 0 ; $i < 4 ; $i++) {
            if ($map[$ay+$moveY[$i]][$ax+$moveX[$i]] === '.'){
                $y[] = $ay+$moveY[$i];
                $x[] = $ax+$moveX[$i];
                $n[] = $an+1;
            }
        }
    }

    for ($i = 0 ; $i < $H ; $i++) {
        $map[$i+1][0] = '';
        $map[$i+1][count($map[0]) - 1] = '';
        echo join('', $map[$i+1])."\n";
    }
    
    function checkDistance($an, $distances) {
        if(in_array($an, $distances)){
            return true;
        } else {
            return false;
        }
    }
?>
