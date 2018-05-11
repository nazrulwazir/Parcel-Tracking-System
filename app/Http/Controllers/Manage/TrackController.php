<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Cookie;

class TrackController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_cookie = json_decode(json_encode(Cookie::get('parcel'),FALSE));

        if($request->isMethod('post')){

            $request->validate([
                'tracking_num' => 'required',
                'parcel_type' => 'required',
            ]);

            $tracking_num = str_replace(' ', '', $request->tracking_num);
            return response()->json(['message'=>route('manage.track', [$request->parcel_type,$tracking_num]),'errors'=>'']);
        }

        return view('Manage.index',compact('parsed','tracking_num','list_parcel','list_cookie'));
    }

    public function track($parcel_type , $tracking_num){

        try {
            
            if($parcel_type == 'unknown'){
                return $this->check_unknown($tracking_num);
            }
            $parsed = $this->fetch_data($parcel_type,$tracking_num);
            $title = array_reverse($parsed['tracker']['checkpoints']);

            if($parsed['code'] == 200 && $parsed['error'] == false && $parsed['tracker']['delivered'] == true){

                $data = [
                            'info'         => $title[0]['process'],
                            'parcel_type' => $parcel_type,
                            'tracking_num' => $tracking_num,
                            'date'          => $title[0]['date'],
                        ];

                $this->set_cookie($data);
            }
            
            return view('Manage.result',compact('parsed','tracking_num','parcel_type','title'));

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
        if($parcel_type == 'cityLink'){
           return parcel_track()->cityLink()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'fedEx'){
           return parcel_track()->fedEx()->setTrackingNumber($tracking_num)->fetch();
        }
        if($parcel_type == 'lelExpress'){
           return parcel_track()->lelExpress()->setTrackingNumber($tracking_num)->fetch();
        }
    }

    public function set_cookie($data){
       return Cookie::queue(Cookie::forever('parcel['.$data['tracking_num'].']', json_encode($data)));
    }
   
}
