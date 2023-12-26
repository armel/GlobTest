<?php


function foo($intervals) {
    if (empty($intervals)) {
        return [];
    }

    usort($intervals, function ($a, $b) {
        return $a[0] - $b[0];
    });

    $merged = [];

    foreach ($intervals as $interval) {
        if (empty($merged) || $interval[0] > $merged[count($merged) - 1][1]) {
            $merged[] = $interval;
        } else {
            $merged[count($merged) - 1][1] = max($merged[count($merged) - 1][1], $interval[1]);
        }
    }

    $result = array_map(function ($interval) {
        return '[' . implode(', ', $interval) . ']';
    }, $merged);

    return $result;
}


$test1 = foo([[0, 3], [6, 10]]);
$test2 = foo([[0, 5], [3, 10]]);
$test3 = foo([[0, 5], [2, 4]]);
$test4 = foo([[7, 8], [3, 6], [2, 4]]);
$test5 = foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]);

print_r($test1);
print_r($test2);
print_r($test3);
print_r($test4);
print_r($test5);


/* 

L'affichage de résultat : 

Array
(
    [0] => [0, 3]
    [1] => [6, 10]
)
Array
(
    [0] => [0, 10]
)
Array
(
    [0] => [0, 5]
)
Array
(
    [0] => [2, 6]
    [1] => [7, 8]
)
Array
(
    [0] => [1, 10]
    [1] => [15, 20]
)


*/
?>
