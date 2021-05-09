<?php
    $NM = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $N = $NM[0];
    $MOD = 1000003;
    $pow = 2;
    $ans = 1;
    
    while ($N > 0) {
        if ($N&1){
            $ans = ($ans * $pow) % $MOD;
        }
        $pow = ($pow * $pow) % $MOD;
        $N >>= 1;
    }
    echo $ans."\n";
?>
