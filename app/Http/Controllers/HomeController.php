<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index (Request $request) {

        // $id = "2631184";
        // $response = Http::withHeaders([
        //     'Accept-Language' => '<accept-language>',
        //     'x-freepik-api-key' => 'FPSX62e1619372cc4ad7af326ed6dffdd0a2',
        // ])->get('https://api.freepik.com/v1/resources/42078526');
        // dd($response['data']);
        // $curl = curl_init();

        // curl_setopt_array($curl, [
        // CURLOPT_URL => "https://api.freepik.com/v1/resources/18791266/download",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 30,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "GET",
        // CURLOPT_HTTPHEADER => [
        //     "Accept-Language: <accept-language>",
        //     "x-freepik-api-key: FPSX7f69157a5b274e11819363df9141e2a7"
        // ],
        // ]);

        // $response = curl_exec($curl);
        // dd($response);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
            
        // }
        return view('member.index');
    }
}