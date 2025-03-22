<?php
$stack = [1, 2, 11, 22, 56, 65, 66, 69, 72, 77, 79, 88, 89, 90, 95, 100];
$target = 56;

function slidingWindow(array $stack, int $winSize): int
{
    $winSum = 0;
    for ($i = 0; $i < $winSize; $i++) {
        $winSum += $stack[$i];
    }
    $maxSum = $winSum;
    $count = count($stack);
    for ($j = $winSize; $j <$count ; $j++) {
        $winSum += $stack[$j] - $stack[$j - $winSize];
        $maxSum = max($maxSum, $winSum);
    }
    return $maxSum;
}

/**
 * uses:
 *  1. Sub-arrays with Product Less than K
 *  2. Longest Substring with K Distinct Characters
 *
 * Algorithm consume Time Complexity:
 * O(n) in the worst case:
 */

echo slidingWindow($stack, 3) . "\n";



















