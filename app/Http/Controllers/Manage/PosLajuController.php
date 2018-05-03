<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class PosLajuController extends Controller
{

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
                'parcel_type' => 'required',
            ]);

            $tracking_num = str_replace(' ', '', $request->tracking_num);

            return redirect()->route('manage.track', [$request->parcel_type,$tracking_num]);
        }

        return view('Manage.index',compact('parsed','tracking_num','list_parcel'));
    }

    public function track($parcel_type , $tracking_num){

        try {
            
            if($parcel_type == 'poslaju'){
            $parsed = parcel_track()->postLaju();
            }
            if($parcel_type == 'gdex'){
                $parsed = parcel_track()->gdExpress();
            }
            if($parcel_type == 'abxExpress'){
                $parsed = parcel_track()->abxExpress();
            }
            if($parcel_type == 'dhlExpress'){
                $parsed = parcel_track()->dhlExpress();
            }
            if($parcel_type == 'skynet'){
                $parsed = parcel_track()->skynet();
            }

            $parsed = $parsed->setTrackingNumber($tracking_num)->fetch();

            return view('Manage.result',compact('parsed','tracking_num','parcel_type'));

        } catch (\Exception $e) {
            
            return redirect()->route('manage.index')->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$e]));
        }
    }
   
}
