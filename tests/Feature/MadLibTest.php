<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\MadLib;
use Exception;

class MadLibTest extends TestCase
{
    /**
     * Test that the program gives the right input if the inputs are valid.
     *
     * @return void
     */
    public function testValidInputsGivesTheRightOutput()
    {
        $mad_lib = new MadLib();
        $words = [
            'noun' => 'dog',
            'verb' => 'walk',
            'adjective' => 'blue',
            'adverb' => 'quickly',
            'noun2' => 'coffee',
            'verb2' => 'throwing',
            'adjective2' => 'cold'
        ];

        $this->assertEquals(
            'Do you walk your blue dog quickly? That\'s hilarious throwing cold coffee at your dog!',
            $mad_lib->generateMadLib($words)
        );
    }

    /**
     * Test that the program trims spaces and gives the right input
     *
     * @return void
     */
    public function testTrimmingOfInputs()
    {
        $mad_lib = new MadLib();
        $words = [
            'noun' => ' dog',
            'verb' => 'walk ',
            'adjective' => 'blue',
            'adverb' => 'quickly',
            'noun2' => 'coffee',
            'verb2' => 'throwing',
            'adjective2' => 'cold'
        ];

        $this->assertEquals(
            'Do you walk your blue dog quickly? That\'s hilarious throwing cold coffee at your dog!',
            $mad_lib->generateMadLib($words)
        );
    }

    /**
     * Test if an input is empty, return an exception.
     *
     * @return void
     */
    public function testIfInputsAreEmptyThrowException()
    {
        $mad_lib = new MadLib();
        $words = [
            'noun' => ' dog',
            'verb' => 'walk ',
            'adjective' => '',
            'adverb' => 'quickly',
            'noun2' => 'coffee',
            'verb2' => 'throwing',
            'adjective2' => 'cold'
        ];

        $this->expectException(Exception::class);

        $mad_lib->generateMadLib($words);
    }

    /**
     * Test if a user inputs two words in one row. Use only first.
     *
     * @return void
     */
    public function testIfThereAreTwoWordsOrMoreInARow()
    {
        $mad_lib = new MadLib();
        $words = [
            'noun' => ' cat dog',
            'verb' => 'run walk ',
            'adjective' => 'red',
            'adverb' => 'quickly,slowly',
            'noun2' => 'coffee',
            'verb2' => 'throwing',
            'adjective2' => 'cold'
        ];

        $this->assertEquals(
            'Do you run your red cat quickly? That\'s hilarious throwing cold coffee at your cat!',
            $mad_lib->generateMadLib($words)
        );
    }
}
