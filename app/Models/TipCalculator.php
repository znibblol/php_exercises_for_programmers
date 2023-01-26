<?php

namespace App\Models;

class TipCalculator
{
    /**
     * @param int $bill_amount
     * @param int @tip_percentage
     *
     * @return Array
    */
    public function calculateTip($bill_amount, $tip_percentage)
    {
        if ($tip_percentage < 0 || $bill_amount < 0) {
            throw new \Exception('Only positive numbers are allowed.');
            return [
                'success' => false,
                'message' => 'Only posotive numbers are allowed.'
            ];
        }

        return [
            'success' => true,
            'tip' => $this->calculateTipAmount($bill_amount, $tip_percentage),
            'total' => $this->calculateTotal($bill_amount, $tip_percentage)
        ];
    }

    /**
     * Calculate the amount of tips based on the bill amount
     * @param int $bill_amount
     * @param int $tip_percentage
     *
     * @return int
     */
    private function calculateTipAmount($bill_amount, $tip_percentage)
    {
        return round($bill_amount * ($tip_percentage / 100), 2);
    }

    /**
     * Calcuate the total including tips
     * @param int $bill_amount
     * @param int $tip_percentage
     *
     * @return int
     */
    private function calculateTotal($bill_amount, $tip_percentage)
    {
        return round($bill_amount + $this->calculateTipAmount($bill_amount, $tip_percentage), 2);
    }
}
