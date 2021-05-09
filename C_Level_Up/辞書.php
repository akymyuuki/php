<?php
    $n = explode(' ', trim(fgets(STDIN)));
    $arrA = [];
    for($i = 0 ; $i < (int)$n[0] ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $arrA[0][] = $input[0];
        $arrA[1][] = $input[1];
    }
    $arrB = [];
    for ($i = 0 ; $i < $n[1] ; $i++) {
        $input = explode(' ', trim(fgets(STDIN)));
        $arrB[0][] = $input[0];
        $arrB[1][] = $input[1];
    }
    $arrC = [];
    for ($i = 0 ; $i < $n[0] ; $i++) {
        $arrC[0][] = $arrA[0][$i];
        $index = array_search($arrA[1][$i], $arrB[0]);
        $arrC[1][] = $arrB[1][$index];
    }
    array_multisort($arrC[0], $arrC[1]);
    
    for ($i = 0 ; $i < count($arrC[0]) ; $i++) {
        echo $arrC[0][$i]." ".$arrC[1][$i]."\n";
    }
?>
