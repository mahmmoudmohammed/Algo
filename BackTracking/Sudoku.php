<?php

/**
 * uses:
 *  1. When your solution can be incrementally , one at a time.
 *  2. Each choice affect subsequent choices (step-by-step)
 *  3. Solve puzzles.
 *  4. Allocating resource
 *  5. BDF,DFS
 *  6. recommendations
 *
 * Algorithm consume Time Complexity:
 * O() on best scenario
 *
 * O() in the worst case
 *
 */

/**
 * Problem Statement:
 * There are an incomplete 9x9 table of numbers which must be filled according to following rules:
 * - Within any of the 9 individual 3x3 boxes, each of the numbers must be once occurrence in box.
 * - Within any column or row of the 9x9 grid, each of the numbers must be once occurrence.
 * -
 */


class SudokuSolver
{
    private array $board = [];
    private int $size = 9;
    private int $boxSize = 3;

    public function __construct(array $board = [])
    {
        $this->setBoard($board);
    }

    public function solve(): bool
    {
        return $this->backtrack(0, 0);
    }

    private function backtrack(int $row, int $col): bool
    {
        if ($row == $this->size) {
            return true;
        }

        if ($col == $this->size) {
            return $this->backtrack($row + 1, 0);
        }

        if ($this->board[$row][$col] != 0) {
            return $this->backtrack($row, $col + 1);
        }

        for ($num = 1; $num <= 9; $num++) {
            if ($this->isValid($row, $col, $num)) {
                $this->board[$row][$col] = $num;

                if ($this->backtrack($row, $col + 1)) {
                    return true;
                }

                $this->board[$row][$col] = 0;
            }
        }

        return false;
    }

    private function isValid(int $row, int $col, int $num): bool
    {
        // Check once occurrence in row and column
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->board[$row][$i] == $num || $this->board[$i][$col] == $num) {
                return false;
            }
        }

        // check once occurrence in box
        $startRow = intdiv($row, $this->boxSize) * $this->boxSize;
        $startCol = intdiv($col, $this->boxSize) * $this->boxSize;
        for ($i = 0; $i < $this->boxSize; $i++) {
            for ($j = 0; $j < $this->boxSize; $j++) {
                if ($this->board[$startRow + $i][$startCol + $j] == $num) {
                    return false;
                }
            }
        }

        return true;
    }

    public function getBoard(): void
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($i % $this->boxSize == 0 and $i !== 0) {
                echo "________________________\n";
            }
            for ($j = 0; $j < $this->size; $j++) {
                if ($j % $this->boxSize == 0 and $j !== 0) {
                    echo "| ";
                }
                echo $this->board[$i][$j] != 0 ? $this->board[$i][$j] . " " : "= ";
            }
            echo "\n";
        }
    }

    public function setBoxSize(int $boxSize): static
    {
        $this->boxSize = $boxSize;
        return $this;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function setBoard(array $board): static
    {
        $this->board = $board;

        return $this;
    }
}

$board = [
    [5, 3, 0, 0, 7, 0, 0, 0, 0],
    [6, 0, 0, 1, 9, 5, 0, 0, 0],
    [0, 9, 8, 0, 0, 0, 0, 6, 0],
    [8, 0, 0, 0, 6, 0, 0, 0, 3],
    [4, 0, 0, 8, 0, 3, 0, 0, 1],
    [7, 0, 0, 0, 2, 0, 0, 0, 6],
    [0, 6, 0, 0, 0, 0, 2, 8, 0],
    [0, 0, 0, 4, 1, 9, 0, 0, 5],
    [0, 0, 0, 0, 8, 0, 0, 7, 9]
];
$board2 = [
    [0, 0, 0, 0, 1, 0, 0, 0, 6],
    [5, 9, 7, 0, 0, 0, 0, 0, 0],
    [2, 0, 0, 5, 8, 0, 0, 0, 0],
    [0, 8, 0, 0, 0, 0, 9, 0, 0],
    [4, 0, 0, 7, 0, 3, 0, 0, 1],
    [0, 0, 2, 0, 0, 0, 0, 7, 0],
    [0, 0, 0, 0, 4, 9, 0, 0, 2],
    [0, 0, 0, 0, 0, 0, 3, 1, 5],
    [1, 0, 0, 0, 2, 0, 0, 0, 0]
];

echo "\nBefore:\n";
 new SudokuSolver($board2)->getBoard();

echo "\nafter:\n";
$solver = new SudokuSolver();
$solver
    ->setSize(9)
    ->setBoxSize(3)
    ->setBoard($board2)
    ->solve();
$solver->getBoard();


















