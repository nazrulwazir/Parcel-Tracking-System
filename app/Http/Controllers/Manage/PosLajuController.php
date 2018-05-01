<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosLajuController extends Controller
{
    private $api_url;

    public function __construct()
    {
        $this->api_url = \URL::to('api/manage/pos-laju-api/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('post')){

            $request->validate([
                'tracking_num' => 'required',
            ]);

            $tracking_num = str_replace(' ', '', $request->tracking_num);
            $parsed = $this->fetch_data($tracking_num);

        }
        return view('Manage.index',compact('parsed','tracking_num'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetch_data($tracking_num){

        $url_api = $this->api_url.'/'.$tracking_num;
        $getdata = file_get_contents($url_api);

        return json_decode($getdata,true);
    }

   
}
