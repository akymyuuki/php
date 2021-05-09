<?php
    $NM = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $A = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $N = $NM[0];
    $M = $NM[1];
    $left = 0;
    $right = 0;
    $maxLen = 0;
    $sumA = 0;
    
    while ($right < $N) {
        if ($sumA > $M) {
            $sumA -= $A[$left];
            $left++;
        }
        while ($sumA <= $M && $right < $N) {
            $sumA += $A[$right];
            $right++;
            if($sumA <= $M){
                $maxLen = max($maxLen, $right - $left);
            }
        }
    }
        
    echo $maxLen."\n";
?>
