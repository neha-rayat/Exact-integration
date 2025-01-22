<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Authrization;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Company;


class AuthController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function gettoken()
    {
        //echo env('CLIENTID');
        if(isset($_GET['code'])){
            $code = $_GET['code'];
            $arr['code'] = $code;
            $arr['client_id'] = env('CLIENTID');
            $arr['grant_type'] = 'authorization_code';
            $arr['client_secret'] = env('SECRET');
            $arr['redirect_uri'] = env('REDIRECT');
            $curl = curl_init();
            curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://start.exactonline.nl/api/oauth2/token',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => json_encode($arr),
                  CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                  )
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            \Log::info($response);
            $response = json_decode($response);

            $url = 'https://start.exactonline.nl/api/v1/current/Me';
            $method= 'GET';
            $info = $this->CommonCurl($url, $method, $response->access_token);
            return $this->sendResponse($response, 'data fetched successfully.');
        }

    }

    public function refreshtoken()
    {
       return $this->sendResponse($_GET, 'data fetched successfully.');

    }

    public function CommonCurl($url, $method, $token){
          $checkline = curl_init();
          curl_setopt_array($checkline, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer ".$token,
              'Content-Type: application/json',
              'Accept: application/json',
            ),
          ));


          $save = curl_exec($checkline);
          \Log::info("CommonCurl: ".$url);
          \Log::info($save);
          return json_decode($save);
      }
}
