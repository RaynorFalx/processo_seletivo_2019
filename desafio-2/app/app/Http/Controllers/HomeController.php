<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index($page = 1, $perPage = 5)
    {
        try {
            $client = new Client();
            $res = $client->request('GET', 'http://www.marcha.cnm.org.br/webservice/noticias');
            $data = $res->getBody()->getContents();
            $arrData = json_decode($data, true);

            $arrNotices = new LengthAwarePaginator(
                $this->transformData($arrData["noticias"], ($page * $perPage) - $perPage, $perPage),
                $perPage,
                intval($page)
            );

            $responseData = $arrNotices->toArray();
            return view('index', compact('responseData'));
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

    public function paginator($page, $perPage = 5)
    {
        try {
            $page = null ? $page = 1 : $page;
            $client = new Client();
            $res = $client->request('GET', 'http://www.marcha.cnm.org.br/webservice/noticias');
            $data = $res->getBody()->getContents();
            $arrData = json_decode($data, true);

            $arrNotices = new LengthAwarePaginator(
                $this->transformData($arrData["noticias"], ($page * $perPage) - $perPage, $perPage),
                $perPage,
                intval($page)
            );

            $responseData = $arrNotices->toArray();
            return view('index', compact('responseData'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function transformData($res, $offset, $perPage)
    {
        $res = array_slice($res, $offset, $perPage, true);
        return $res;
    }


}
