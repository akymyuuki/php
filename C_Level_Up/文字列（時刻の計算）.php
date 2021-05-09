<?php
    $n = (int)trim(fgets(STDIN));
    for($i = 0 ; $i < $n ; $i++){
        $arr = explode(' ', trim(fgets(STDIN)));
        $time = $arr[0];
        $h = $arr[1];
        $m = $arr[2];
        echo date('H:i', strtotime("$time + $h hour $m min"))."\n";        
    }
?>
