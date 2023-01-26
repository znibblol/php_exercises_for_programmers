<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CountingTheNumberOfCharacters;
use Exception;

class CountingTheNumberOfCharactersTest extends TestCase
{
    /**
     * Test that the output is correct given the input.
     *
     * @return void
     */
    public function testCounting()
    {
        $counting = new CountingTheNumberOfCharacters();

        $this->assertEquals(4, $counting->count('Emil'));
    }

    /**
     * Test what happens if the input is empty
     *
     * @return void
     */
    public function testEmptyCounting()
    {
        $counting = new CountingTheNumberOfCharacters();

        $this->expectException(Exception::class);

        $counting->count('');
    }
}
