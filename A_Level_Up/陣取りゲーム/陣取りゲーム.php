<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $H = (int)$input[0];
    $W = (int)$input[1];
    
    $first = trim(fgets(STDIN));
    
    $moveX = [0, 1, 0, -1];
    $moveY = [-1, 0, 1, 0];

    $map = [];
    for ($h = 0 ; $h < $H+2 ; $h++) {
        for($w = 0 ; $w < $W+2 ; $w++){
            $map[$h][] = '#';            
        }
    }
    
    $y1 = [];
    $x1 = [];
    $n1 = [];
    $y2 = [];
    $x2 = [];
    $n2 = [];
    
    for ($h = 0 ; $h < $H ; $h++) {
        $input = trim(fgets(STDIN));
        for($w = 0 ; $w < $W ; $w++){
            $map[$h+1][$w+1] = $input[$w];
            if($input[$w] === 'A'){
                $y1[] = $h+1;
                $x1[] = $w+1;
                $n1[] = 0;
            }
            if($input[$w] === 'B'){
                $y2[] = $h+1;
                $x2[] = $w+1;
                $n2[] = 0;
            }
        }
    }
    
    $cntA = 1;
    $cntB = 1;
    $secondTurn = false;
    while (count($y1) > 0 || count($y2) > 0){
        if($first === 'A' || $secondTurn) {
            $sameTurnFlag = true;
            while ($sameTurnFlag && count($y1) > 0) {
                $sameTurnFlag = false; 
                $ay = array_shift($y1);
                $ax = array_shift($x1);
                $an = array_shift($n1);
                for ($i = 0 ; $i < 4 ; $i++) {
                    if ($map[$ay+$moveY[$i]][$ax+$moveX[$i]] === '.'){
                        $map[$ay+$moveY[$i]][$ax+$moveX[$i]] = 'A';
                        $cntA++;
                        $y1[] = $ay+$moveY[$i];
                        $x1[] = $ax+$moveX[$i];
                        $n1[] = $an+1;
                    }
                }
                if (in_array($an, $n1)){
                    $sameTurnFlag = true;
                }
            }
        } else {
            $secondTurn = true;
        }
        
        $sameTurnFlag = true;
        while ($sameTurnFlag && count($y2) > 0) {
            $sameTurnFlag = false;
            $ay = array_shift($y2);
            $ax = array_shift($x2);
            $an = array_shift($n2);
            for ($i = 0 ; $i < 4 ; $i++) {
                if ($map[$ay+$moveY[$i]][$ax+$moveX[$i]] === '.'){
                    $map[$ay+$moveY[$i]][$ax+$moveX[$i]] = 'B';
                    $cntB++;
                    $y2[] = $ay+$moveY[$i];
                    $x2[] = $ax+$moveX[$i];
                    $n2[] = $an+1;
                }
            }
            if (in_array($an, $n2)){
                $sameTurnFlag = true;
            }
        }
    }
    
    echo $cntA." ".$cntB."\n";
    if ($cntA > $cntB) {
        echo 'A'."\n";
    } else {
        echo 'B'."\n";
    }

?>
