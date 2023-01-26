<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TipCalculator;
use Exception;
use TypeError;

class TipCalculatorTest extends TestCase
{
    /**
     * Testing that the calculator calculates correctly
     *
     * @return void
     */
    public function testCalculateTip()
    {
        $tip_calculator = new TipCalculator();

        $this->assertEquals([
            'success' => true,
            "tip" => 15,
            "total" => 115
        ], $tip_calculator->calculateTip(100, 15));
    }

    /**
     * Testing that the calculator calculates decimals correctly
     *
     * @return void
     */
    public function testCalculateTipDecimals()
    {
        $tip_calculator = new TipCalculator();

        $this->assertEquals([
            'success' => true,
            "tip" => 1.69,
            "total" => 12.94
        ], $tip_calculator->calculateTip(11.25, 15));
    }

    /**
     * Testing
     */
    public function testValidFloats()
    {
        $tip_calculator = new TipCalculator();

        $this->expectException(Exception::class);

        $tip_calculator->calculateTip(100, -2);
    }

    public function testValidInputTypes()
    {
        $tip_calculator = new TipCalculator();

        $this->expectException(TypeError::class);

        $tip_calculator->calculateTip('asd', 15);
    }
}
