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
            
            if($parcel_type == 'unknown'){
                return $this->check_unknown($tracking_num);
            }
            $parsed = $this->fetch_data($parcel_type,$tracking_num);

            return view('Manage.result',compact('parsed','tracking_num','parcel_type'));

        } catch (\Exception $e) {
            
            return redirect()->route('manage.index')->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$e]));
        }
    }

    public function check_unknown($tracking_num){

        foreach (list_parcel() as $key => $value) {
            
            if($value['src'] == 1){
                $track = $this->fetch_data($value['value'] , $tracking_num);
                if($track['code'] == 200 && $track['error'] == false && $track['tracker']['delivered'] == true){
                    return redirect()->route('manage.track', [$value['value'],$tracking_num]);
                }
            }
        }

        return redirect()->route('manage.index')->withErrors(['msg' => 'Record Not Found']);
    }

    public function fetch_data($parcel_type , $tracking_num){

        if($parcel_type == 'poslaju'){
           return parcel_track()->postLaju()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'gdExpress'){
            return parcel_track()->gdExpress()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'abxExpress'){
            return parcel_track()->abxExpress()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'dhlExpress'){
           return parcel_track()->dhlExpress()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'skynet'){
           return parcel_track()->skynet()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'unknown'){
            return $this->check_unknown($tracking_num);
        }

    }
   
}
