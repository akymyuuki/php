<?php
    $n = (int)trim(fgets(STDIN));
    $arr = [];
    for($i = 0 ; $i < $n ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $arr[0][] = $input[0];
        $arr[1][] = 0;
    }
    $m = (int)trim(fgets(STDIN));
    for ($i = 0 ; $i < $m ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $arr[1][array_search($input[0], $arr[0])] += (int)$input[1];
    }
    array_multisort($arr[0], $arr[1]);
    
    for($i = 0 ; $i < count($arr[1]) ; $i++) {
        echo $arr[1][$i]."\n";
    }
?>
