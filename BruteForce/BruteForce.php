<?php
$stack = [1, 2, 11, 22, 56, 65, 66, 69, 72, 77, 79, 88, 89, 90, 95, 100];
$target = 56;

function bruteForce(int $target, array $stack): int
{
    foreach ($stack as $item) {
        if ($item === $target) {
            return true;
        }
    }
    return false;
}

/**
 * uses:
 *  1. Small Input
 * 2.  speed matter than efficient
 */
echo bruteForce($target, $stack) . "\n";



















