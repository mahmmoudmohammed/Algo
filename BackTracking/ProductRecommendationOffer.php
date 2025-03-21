<?php

/**
 * Problem Statement:
 * The goal is to determine the cheapest way for the customer to purchase all desired products,
 * using any combination of individual purchases and collection deals.
 */
class CollectionOptimizer {
    private array $products;
    private array $prices;
    private array $collections;
    private float $minCost;
    private int $collectionCount;

    public function __construct($products, $prices, $collections) {
        $this->products = $products;
        $this->prices = $prices;
        $this->collections = $collections;
        $this->minCost = $this->calculateMaxCost();
        $this->collectionCount = count($this->collections);
    }
    private function calculateMaxCost(): float {
        $cost = 0;
        foreach ($this->products as $product => $qty) {
            $cost += $qty * $this->prices[$product];
        }
        return $cost;
    }

    public function findMinCost(): float {
        $this->backtrack($this->products, 0, 0);
        return $this->minCost;
    }

    private function backtrack(array $remaining, int $collectionIndex, float $currentCost) {
        if (array_sum($remaining) == 0) {
            $this->minCost = min($this->minCost, $currentCost);
            return;
        }

        if ($collectionIndex >= $this->collectionCount) {
            // If no more bundles, Buy the remaining products individually
            foreach ($remaining as $product => $qty) {
                $currentCost += $qty * $this->prices[$product];
                echo 'individual product:'. $product.' => '.$qty.' => '.$this->prices[$product]."\n";
            }
            $this->minCost = min($this->minCost, $currentCost);
            return;
        }

        $collection = $this->collections[$collectionIndex];
        $newRemaining = $remaining;
        $valid = true;

        foreach ($collection['products'] as $product => $qty) {
            // product not exist or qty not enough
            if (($newRemaining[$product] ?? 0) < $qty) {
                $valid = false;
                break;
            }
            $newRemaining[$product] -= $qty;
        }

        if ($valid) {
            echo 'collection: '.$collectionIndex.' , '. $collection['price']."\n";
            $this->backtrack($newRemaining, $collectionIndex, $currentCost + $collection['price']);
        }

        $this->backtrack($remaining, $collectionIndex + 1, $currentCost);
    }
}


$customerNeeds = ['A' => 2, 'B' => 1, 'C' => 1];
$prices = ['A' => 5, 'B' => 4, 'C' => 3];

$collections = [
    ['products' => ['A' => 1, 'B' => 1], 'price' => 8],
    ['products' => ['A' => 2, 'C' => 1], 'price' => 10],
    ['products' => ['B' => 1, 'C' => 1], 'price' => 6],
];

$optimizer = new CollectionOptimizer($customerNeeds, $prices, $collections);
echo "\nMinimum cost: $" . $optimizer->findMinCost()."\n";
