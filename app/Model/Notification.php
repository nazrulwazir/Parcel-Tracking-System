<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Notification extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_name', 'sender_email', 'receiver_name','receiver_email','data','url','status'
    ];
    
    /**
	 *  Setup model event hooks
	 */
	public static function boot(){
	    parent::boot();
	    self::creating(function ($model) {
	        $model->uuid = (string) Uuid::generate(4);
	    });
	}

}
