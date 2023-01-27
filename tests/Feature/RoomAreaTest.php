<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\RoomArea;
use Exception;

class RoomAreaTest extends TestCase
{
    /**
     * Test calculation is correct given valid inputs.
     *
     * @return void
     */
    public function testCreateQuote()
    {
        $room_area = new RoomArea();

        $this->assertEquals(
            "You entered dimentions of 5 meter by 7 meters.\nThe area is\n35 square meters\n376.74 square feet",
            $room_area->doMath(5, 7)
        );
    }
}
