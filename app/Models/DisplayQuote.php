<?php

namespace App\Models;

class DisplayQuote
{
    /**
     * Create a quote and display it and it's author
     * @param string $quote
     * @param string $author
     * 
     * @return string
     */
    public function makeQuote($quote, $author)
    {
        return $author .  " says, \"" . $quote . "\"";
    }
}