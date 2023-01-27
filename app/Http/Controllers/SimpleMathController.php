<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\SimpleMath;

class SimpleMathController extends Controller
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
        $view = view('simplemath');
        echo $view->render();
    }

    /**
     * Post request with the integeres
     *
     * @return int
     */
    public function postRequest()
    {
        $mather = new SimpleMath();

        $params = $this->request->all();
        $result = $mather->calculations($params['int1'], $params['int2']);
        return response()->json(str_replace('\n', '<br />', $result));
    }
}
