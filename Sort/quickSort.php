<?php
$stack = [65, 66, 79, 88, 89, 69, 72, 77, 1, 2, 11, 22, 56, 90, 95, 100];
function quickSort(array $stack): array
{
    $length = count($stack);
    if ($length < 2) {
        return $stack;
    }
    $pivot = floor($length / 2);
    $less = [];
    $greater = [];
    foreach ($stack as $item) {
        if ($item < $stack[$pivot]) {
            $less[] = $item;
        }
        if ($item > $stack[$pivot]) {
            $greater [] = $item;
        }
    }
    return [...quickSort($less), $stack[$pivot], ...quickSort($greater)];
}

print_r(quickSort($stack));















