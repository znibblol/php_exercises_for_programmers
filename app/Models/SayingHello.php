<?php

namespace App\Models;

class SayingHello
{
    /**
     * @param str $name
     *
     * @return str
     */
    public function greetings($name)
    {
        $greetings_phrase = "Hello, {$name}, nice to meet you!";
        return $greetings_phrase;
    }

    /**
     * @param str $name
     *
     * @return str
     */
    public function greetingsNoVariables($name)
    {
        return "Hello, {$name}, nice to meet you!";
    }
}
