<?php

namespace App\Models;

class MadLib
{
    /**
     * Generate a mad lib that includes the user input.
     * @param array $words
     * @return string
     */
    public function generateMadLib($words)
    {
        $words = array_map(function ($word) {
            $word = trim($word);
            $word_arr = preg_split('/[,? ?]/', trim($word));

            if (empty($word_arr[0])) {
                throw new \Exception('You must enter a word in each input.');
            }

            return $word_arr[0];
        }, $words);
        return "Do you {$words['verb']} your {$words['adjective']} {$words['noun']} {$words['adverb']}? That's hilarious {$words['verb2']} {$words['adjective2']} {$words['noun2']} at your {$words['noun']}!";
    }
}
