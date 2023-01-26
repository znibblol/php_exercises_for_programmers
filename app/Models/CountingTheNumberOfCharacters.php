<?php

namespace App\Models;

class CountingTheNumberOfCharacters
{
    /**
     * Count the number of characters from the input string
     * @param string $input
     *
     * @return integer
     */
    public function count($input)
    {
        if (empty($input)) {
            throw new \Exception('You must enter something.');
        }
        $string_array = str_split($input);
        return sizeof($string_array);
    }
}
