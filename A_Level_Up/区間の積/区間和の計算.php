<?php
    $N = (int)trim(fgets(STDIN));
    $n = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
    $M = (int)trim(fgets(STDIN));
    
    $cnt = 0;
    $nums[] = 0;
    for ($i = 0 ; $i < $N ; $i++) {
        $cnt += $n[$i];
        $nums[$i+1] = $cnt;
    }
    for ($i = 0 ; $i < $M ; $i++) {
        $A = array_map('intval', (explode(' ', trim(fgets(STDIN)))));
        $ans = $nums[$A[1]+1] - $nums[$A[0]];
        echo $ans."\n";
    }
?>
