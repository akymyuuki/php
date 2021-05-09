<?php
    $n = (int)trim(fgets(STDIN));
    $arr = [];
    for($i = 0 ; $i < $n ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $arr[0][] = $input[0];
        $arr[1][] = $input[1];
    }
    array_multisort($arr[0], SORT_DESC, $arr[1], SORT_DESC);
    for($i = 0 ; $i < $n ; $i++) {
        echo $arr[0][$i]." ".$arr[1][$i]."\n";
    }
?>
