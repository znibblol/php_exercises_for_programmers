<?php

namespace App\Models;

class SimpleMath
{
    /**
     * Calculate sim, difference, product and quotient and generate output.
     *
     * Constraints:
     * Inputs will be strings, convert to integer before calculations
     *
     * Keep inputs and outputs separate from convertions and other processing
     *
     * Generate single output statement with line breaks
     *
     * @param string $i1
     * @param string $i2
     *
     * @return string
     */
    public function calculations($i1, $i2)
    {
        if (gettype($i1) !== 'integer' || gettype($i2) !== 'integer') {
            throw new \Exception('You must enter valid numbers.');
        }

        if ($i1 <= -1 || $i2 <= -1) {
            throw new \Exception('You cannot enter negative numbers.');
        }

        $sum = $this->addition($i1, $i2);
        $difference = $this->subtraction($i1, $i2);
        $factor = $this->multiply($i1, $i2);
        $quotient = $this->division($i1, $i2);

        return "{$i1} + {$i2} = {$sum}\n{$i1} - {$i2} = {$difference}\n{$i1} * {$i2} = {$factor}\n{$i1} / {$i2} = {$quotient}";
    }

    /**
     * Sum of two numbers
     *
     * @param int $i1
     * @param int $i2
     *
     * @return int
     */
    private function addition($i1, $i2)
    {
        return round($i1 + $i2, 2);
    }
    /**
     * Difference of two numbers
     *
     * @param int $i1
     * @param int $i2
     *
     * @return int
     */
    private function subtraction($i1, $i2)
    {
        return round($i1 - $i2, 2);
    }
    /**
     * Factor of two numbers
     *
     * @param int $i1
     * @param int $i2
     *
     * @return int
     */
    private function multiply($i1, $i2)
    {
        return round($i1 * $i2, 2);
    }
    /**
     * Quotient of two numbers
     *
     * @param int $i1
     * @param int $i2
     *
     * @return int
     */
    private function division($i1, $i2)
    {
        return round($i1 / $i2, 2);
    }
}
