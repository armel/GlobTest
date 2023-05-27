<?php 
function foo($intervals) {
    
    usort($intervals, function($a, $b) {return $a[0] - $b[0]; });

    $result = [];
    $actual = null;

    foreach ($intervals as $interval) {
        if ($actuel === null || $interval[0] > $actual[1]) {
            // Ajoute le dernier intervalle fusionné
            if ($actual !== null) {
                $merged[] = $actual;
            }
            $actual = $interval;
        } elseif ($interval[1] > $actual[1]) {
            $actual[1] = $interval[1];
        }
    }

   
    if ($actual !== null) {
        $merged[] = $actual;
    }

    return $merged;
}

