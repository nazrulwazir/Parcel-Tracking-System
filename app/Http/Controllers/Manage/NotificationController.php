<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Notification;
use Snowfire\Beautymail\Beautymail;

class NotificationController extends TrackController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'sender_name' => 'required',
                'sender_email' => 'required',
                'receiver_name' => 'required',
                'receiver_email' => 'required',
                'g-recaptcha-response' => 'required|captcha',
        ]);

        $parsed = $this->fetch_data($request->parcel_type,$request->tracking_num);
        $title = array_reverse($parsed['tracker']['checkpoints']);

        $data = json_encode($title[0]);

        $save = Notification::create([
                    'sender_name'   => $request->sender_name,
                    'sender_email'  => $request->sender_email,
                    'receiver_name' => $request->receiver_name,
                    'receiver_email'=> $request->receiver_email,
                    'data'          => $data,
                    'url'           => $this->getUrl($request->parcel_type,$request->tracking_num),
                    'status'        => 0,
                ]);

        $this->send_email($save->id);

        return response()->json(['message'=>'Please check your email.','errors'=>'']);
    }

    /**
     * Get Url
     *
     */    
    public function getUrl($parcel_type , $tracking_num){
        return route('manage.track', [$parcel_type,$tracking_num]);
    }

    public function send_email($id){

        $beautymail = app(Beautymail::class);
        $data = Notification::findOrFail($id);
        $status = json_decode($data->data);

        $beautymail->send('Manage.email.notification', ['data' => $data , 'status' => $status], function($message) use ($data)
        {
            $message
                ->from(env('MAIL_USERNAME'))
                ->to($data->receiver_email, $data->receiver_email)
                ->cc($data->sender_email)
                ->subject('Shipment Status Tracking Result');
        });

    }
}
