<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        try {
            $client = new Client();
            $res = $client->request('GET', 'http://www.marcha.cnm.org.br/webservice/noticias');

            $responseData = $res->getBody()->getContents();
            return view('index')->with('responseData', json_decode($responseData, true));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function search()
    {
        try {
            $client = new Client();
            $research = Input::get('search');
            $res = $client->request('GET', 'http://www.marcha.cnm.org.br/webservice/noticias?pesquisa=' . $research);
            $responseData = $res->getBody()->getContents();
            return view('index')->with('responseData', json_decode($responseData, true));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function paginator()
    {
        try {
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
