<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\SimpleMath;
use Exception;

class SimpleMathTest extends TestCase
{
    /**
     * Test that the output is correct giving valid input
     *
     * @return void
     */
    public function testCorrectOuputFromValidInput()
    {
        $math_genious = new SimpleMath();

        $this->assertEquals(
            "10 + 5 = 15\n10 - 5 = 5\n10 * 5 = 50\n10 / 5 = 2",
            $math_genious->calculations(10, 5)
        );
    }

    /**
     * Test that only integeres are allowed
     *
     * @return void
     */
    public function testThatOnlyNumbersAreInput()
    {
        $math_genious = new SimpleMath();

        $this->expectException(\Exception::class);

        $math_genious->calculations("10", 5);
    }

    /**
     * Test that the numbers are positive
     *
     * @return void
     */
    public function testThatOnlyPositiveNumbersAreEntered()
    {
        $math_genious = new SimpleMath();

        $this->expectException(\Exception::class);

        $math_genious->calculations(-1, 2);
    }
}
