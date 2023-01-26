<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\SayingHello;

class SayingHelloTest extends TestCase
{
    /**
     * Test that the output is correct given the input.
     *
     * @return void
     */
    public function testCorrectInput()
    {
        $saying_hello = new SayingHello();

        $name = 'Emil';

        $this->assertEquals('Hello, Emil, nice to meet you!', $saying_hello->greetings($name));
    }
}
