<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\CountingTheNumberOfCharacters;

class CountingTheNumberOfCharactersController extends Controller
{
    public $request;
    public $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Renders the page from a view.
     */
    public function renderPage()
    {
        $view = view('numofchars');
        echo $view->render();
    }

    /**
     * The request with the string lands here
     * 
     * @return int
     */
    public function postRequest()
    {
        $counter = new CountingTheNumberOfCharacters();

        $params = $this->request->all();
        return $counter->count($params['characters']);
    }
}
