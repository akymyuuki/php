<?php
    $NM = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $A = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $N = $NM[0];
    $M = $NM[1];
    $left = 0;
    $right = 0;
    $minLen = 99999999999;
    $sumA = 0;
    
    while ($right < $N) {
        if ($sumA < $M) {
            $sumA += $A[$right];
            $right++;
        }
        if($sumA >= $M) {
            while ($sumA >= $M) {
                $sumA -= $A[$left];
                $minLen = min($minLen, $right - $left);
                $left++;
            }
        }
    }
        
    if ($minLen === 99999999999) {
        echo "-1"."\n";
    } else {
        echo $minLen."\n";
    }
?>
