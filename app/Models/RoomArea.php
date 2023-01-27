<?php

namespace App\Models;

class RoomArea
{
    /**
     * Calculate room area in square meters and square feet
     *
     * @param int $i1
     * @param int $i2
     *
     * @return string
     */
    public function doMath($i1, $i2)
    {
        $feet_conversion_from_mm = 304.8;

        $i1 = intval($i1);
        $i2 = intval($i2);

        $i1_mm = $i1 * 1000;
        $i2_mm = $i2 * 1000;
        $i1_feet = $i1_mm / $feet_conversion_from_mm;
        $i2_feet = $i2_mm / $feet_conversion_from_mm;


        $square_meters = round($i1 * $i2, 2);
        $square_feet = round($i1_feet * $i2_feet, 2);

        return "You entered dimentions of $i1 meter by $i2 meters.\nThe area is\n$square_meters square meters\n$square_feet square feet";
    }
}
