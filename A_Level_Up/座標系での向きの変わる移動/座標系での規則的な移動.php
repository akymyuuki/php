<?php
    $input = explode(' ', trim(fgets(STDIN)));
    $x = (int)$input[0];
    $y = (int)$input[1];
    $N = $input[2];
    
    $dirX = [0, 1, 0, -1];
    $dirY = [-1, 0, 1, 0];
    // $dir = ['N' => 0, 'E' => 1, 'S' => 2, 'W' => 3];
    // $d = ['R' => 1, 'L' => -1];
    $D = 1;
    $visited = [];
    $visited[] = ($x." ".$y);
    
    for ($i = 0 ; $i < $N ; $i++){
        $x += $dirX[$D];
        $y += $dirY[$D];
        $visited[] = ($x." ".$y);
    
        $a = ($D < 3) ? 1 : -3;
        $next = (($x+$dirX[$D+$a])." ".($y+$dirY[$D+$a]));
        
        if( !in_array($next, $visited) ) 
        {
            $D++;
        }
        if ($D < 0) {
            $D = 3;
        }
        if ($D > 3) {
            $D = 0;
        }
    }

    echo ($x)." ".($y)."\n";
?>
