<?php
    $arr = explode(' ', trim(fgets(STDIN)));
    $n = $arr[0];
    $m = $arr[1];
    $k = $arr[2];
    for($i = 0 ; $i < $n ; $i++){
        $arrA = explode(' ', trim(fgets(STDIN)));
        $cnt = 0;
        for($j = 0 ; $j < $m ; $j++){
            if ($arrA[$j] === $k) {
                $cnt++;
            }
        }
        echo $cnt."\n";
    }
?>
