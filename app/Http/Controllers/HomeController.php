<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(){
        return view('welcome');
    }

    public function searchResults(Request $request){
        $q = $request->search;

        $d1 = $this->getData($q);
        $d2 = $this->getImages($q);
        $data = array_merge($d1,$d2);
//        dd($data);
        return view('welcome',[
            'data' => $data
        ]);
    }

    public function getData($q){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-search3.p.rapidapi.com/api/v1/search/q=".$q."&num=50",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: google-search3.p.rapidapi.com",
                "x-rapidapi-key: 80b7fa619bmshf265d4efae1a5f3p1ab68ajsn1e58a88e7881"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response);
            $d1 = $data->results;
            return $d1;
        }
    }

    public function getImages($q){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-search3.p.rapidapi.com/api/v1/images/q=".$q,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: google-search3.p.rapidapi.com",
                "x-rapidapi-key: 80b7fa619bmshf265d4efae1a5f3p1ab68ajsn1e58a88e7881"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data = json_decode($response);
            $d = $data->image_results;
            return $d;
        }
    }
}
