<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\TipCalculator;

class TipCalculatorController extends Controller
{
    public $request;
    public $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * The request handler for the post request from the website
     * Handles request and responst
     *
     * @return Array in form of JSON
     */
    public function postCalculateTip()
    {
        $tip_calculator = new TipCalculator();
        $request = $this->request->all();
        return response()->json($tip_calculator->calculateTip($request['bill_amount'], $request['tip_percentage']));
    }

    /**
     * Renders the page from a view.
     */
    public function renderPage()
    {
        $view = view('tip_calculator');
        echo $view->render();
    }
}
