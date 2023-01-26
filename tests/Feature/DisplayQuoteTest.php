<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\DisplayQuote;
use Exception;

class DisplayQuoteTest extends TestCase
{
    /**
     * Test that the output is correct given the input.
     *
     * @return void
     */
    public function testCreateQuote()
    {
        $quote_machine = new DisplayQuote();

        $this->assertEquals(
            "Obi-Wan Kenobi says, \"These aren't the droids you're looking for.\"",
            $quote_machine->makeQuote("These aren't the droids you're looking for.", "Obi-Wan Kenobi")
        );
    }
}
