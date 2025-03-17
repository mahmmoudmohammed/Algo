<?php
$stack = [1, 2, 11, 22, 56, 65, 66, 69, 72, 77, 79, 88, 89, 90, 95, 100];
$target = 56;
function divideAndConquer(int $target, array $stack): int
{
    $length = count($stack);
    $left = 0;
    $right = $length - 1;

    while ($left <= $right) {
        $pivot = $left + floor(($right - $left) / 2);
        if ($stack[$pivot] === $target) {
            return $pivot;
        }
        if ($stack[$pivot] > $target) {
            $right = $pivot - 1;
        } else {
            $left = $pivot + 1;
        }
    }
    return -1;
}


function divideAndConquerRecursively(int $target, array $stack, int $right, int $left = 0): int
{
    if ($left > $right) {
        return -1;
    }
    $pivot = $left + ceil(($right - $left) / 2);
    if ($stack[$pivot] === $target) {
        return $pivot;
    }
    if ($stack[$pivot] > $target) {
        return divideAndConquerRecursively($target, $stack, $pivot - 1, $left);
    } else {
        return divideAndConquerRecursively($target, $stack, $right, $pivot + 1);
    }
}

/**
 * Both Technique consume Time Complexity: O(log n)
 **/

/**
 * Main Criteria:
 * Algorithm assume that the input array $stack is sorted.
 */
echo bruteForce($target, $stack) . "\n";

echo divideAndConquerRecursively($target, $stack, count($stack)) . "\n";



















