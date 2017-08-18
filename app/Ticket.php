<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [

        'user_name',
        'operating_system',
        'issue_title',
        'error_type',
        'page_url',
        'description',
        'status_id'
    ];

    public function status(){
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }


}
